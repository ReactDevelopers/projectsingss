import * as React from 'react';
//
import { AppState, AppProps, serverResponse } from '../../app-interface';
import Template from '../helpers/Template';
import DatePicker from 'react-datepicker';

import * as bs from 'react-bootstrap';
import Select from 'react-select';
import CsFormGroup from '../helpers/CsFormGroup';
import ColWithError from '../helpers/ColWithError';

import RunningCourse, { RunningCourseProps } from '../../models/RunningCourse';
import Api from '../../api/Api';
import SweetAlert from 'react-bootstrap-sweetalert';
import store from '../../store';
import appUrl from '../../helper';
import { push } from 'connected-react-router';
var _ = require('lodash');
import * as moment from "moment";
var FAS = require('react-fontawesome');

import DateConfirmation , { OldDateConfirmationProps } from '../helpers/OldDateConfirmation';
import { openOldDateConfirmation } from '../../actions/OldDateConfirmation';

export interface RunningCourseCreateState extends AppState {

  runningCourse: RunningCourseProps;
  dynamicRunningCourse: Array<DynamicRunningCourse>;
  showSweetAlert: boolean;
  courseOfCategory: Array<{ value: string, label: string, target_group: string }>;
}

// export enum CourseRunType {
//   'Normal',
//   'Consecutive'
// }

export interface CourseRunDate {

  start_date: moment.Moment | null;
  end_date: moment.Moment | null;

}

export interface SelectOptionProps {
  value: string,
  label: string,
}

export interface DynamicRunningCourse {

  course_run_type: string;
  dates: Array<CourseRunDate>;
  assessment_start_date: moment.Moment | null;
  assessment_end_date: moment.Moment | null;
  closing_date: moment.Moment | null;
  available_slots: number | null;
  closing_date_option: string;
}

export const DefaultDynamicRow = {

    course_run_type: 'Normal',
    dates: [{start_date: null, end_date: null}],
    assessment_start_date: null,
    assessment_end_date: null,
    closing_date: null,
    available_slots: null ,
    closing_date_option: ''  
}

export interface GetCourseByCategoryServerResponse extends serverResponse {

  data: Array<{ value: string, label: string, target_group: string }>;
}

export interface RCCProps extends AppProps{

  oldDateConfirmation : OldDateConfirmationProps;
}
export default class RunningCourseCreate extends React.Component<RCCProps, RunningCourseCreateState > {

    constructor(props: RCCProps) {

        super(props);
        this.handleTextChange = this.handleTextChange.bind(this);
        this.removeNewRow = this.removeNewRow.bind(this);
        this.addNewRow = this.addNewRow.bind(this);
        this.removeDateFromRow = this.removeDateFromRow.bind(this);
        this.addNewDateInRow = this.addNewDateInRow.bind(this);
        this.handleDynamicChangeDate = this.handleDynamicChangeDate.bind(this);
        this.onOk = this.onOk.bind(this);
        this.updateDynamicChangeDate = this.updateDynamicChangeDate.bind(this);
        this.updateDateDynamicNormalDate = this.updateDateDynamicNormalDate.bind(this);

    }

    componentWillMount() {

      this.setState({
        runningCourse: new RunningCourse(), 
        showSweetAlert: false,
        courseOfCategory: [],
        dynamicRunningCourse: [_.cloneDeep(DefaultDynamicRow)],
      });
    }
    
    handleDynamicChangeDate (date: moment.Moment | null, elementName: string, dateIndex: number, dynamicCIndex: number) {

      let now = moment();
      let param = {
        date: date,
        elementName: elementName,
        dynamicCIndex: dynamicCIndex,
        dateIndex: dateIndex,
      }

      if (date && now > date && elementName === 'start_date' ) {

         store.dispatch(openOldDateConfirmation(this.updateDynamicChangeDate,param));
      }
      else {

        this.updateDynamicChangeDate(param);
      }
    }

    updateDynamicChangeDate (param: {
      date: moment.Moment | null, 
      elementName: string, 
      dateIndex: number, dynamicCIndex: number
    }){

      let dynamicRunningCourse = this.state.dynamicRunningCourse;
      let elementVal = param.date;
      dynamicRunningCourse[param.dynamicCIndex].dates[param.dateIndex][param.elementName] = elementVal;

      if (param.elementName === 'start_date' && dynamicRunningCourse[param.dynamicCIndex].closing_date_option === '2weeks_before') {
       
        dynamicRunningCourse[param.dynamicCIndex].closing_date = param.date ? param.date.clone().add('weeks', - 2) : null;
      }
      
      this.setState({dynamicRunningCourse: dynamicRunningCourse});

    }
    handleDynamicChangeNormalDate(date: moment.Moment | null, elementName: string, dynamicCIndex: number) {
        
        let now = moment();
        let params = {
          date: date,
          elementName: elementName,
          dynamicCIndex: dynamicCIndex
        }

       if (date && now > date && elementName =='closing_date') {

          store.dispatch(openOldDateConfirmation(this.updateDateDynamicNormalDate,params));
       } 
       else {

         this.updateDateDynamicNormalDate(params);
       }
    }

    updateDateDynamicNormalDate(params: 
      {date: moment.Moment | null, 
        elementName: string,
         dynamicCIndex: number
    }) {

        let dynamicRunningCourse = this.state.dynamicRunningCourse;
        let elementVal = params.date;
        dynamicRunningCourse[params.dynamicCIndex][params.elementName] = elementVal;
        this.setState({dynamicRunningCourse: dynamicRunningCourse});
    }

    handleDynamicChangeSelect(e: SelectOptionProps, elementName: string, index: number): void {

      let dynamicRunningCourse = this.state.dynamicRunningCourse;
      let elementVal = e ? e.value : '';

      dynamicRunningCourse[index][elementName] = elementVal;

      if (elementName === 'closing_date_option'  && dynamicRunningCourse[index].closing_date_option === '2weeks_before' ) {
        
        let startDate = dynamicRunningCourse[index].dates[0].start_date;
        let before2Weeks = startDate ? startDate.clone().add('weeks', - 2): null;
        dynamicRunningCourse[index].closing_date = before2Weeks;
      }

      this.setState({dynamicRunningCourse: dynamicRunningCourse});
    }

    handleChangeSelect(e: SelectOptionProps, elementName: string): void {

      let runningCourse = this.state.runningCourse;
      let elementVal = e ? e.value : '';
      runningCourse[elementName] = elementVal;

      if(elementName === 'category'){

        // fetch the course of selected category.
        this.fetchCourseOfCategory(elementVal);

      }else if(elementName === 'course_id' ){

          // updating the target_group value, when user changes the course.
          let courseIndex = _.findIndex(this.state.courseOfCategory,{value: elementVal});
          let course = this.state.courseOfCategory[courseIndex];
          
          runningCourse.target_group = course.target_group;
      }

      this.setState({runningCourse: runningCourse});

    }
    
    /**
     * Update the state if user change the text field value.
     * @type {void}
     */
    handleTextChange (event: React.FormEvent<bs.FormProps>): void {
      
      let elementName = event.currentTarget.name;
      elementName = elementName ? elementName : '';
      let elementVal = event.currentTarget.value;

      let course = this.state.runningCourse;
      course[elementName] = elementVal;
      this.setState({runningCourse: course});
    }

    /**
     * Update the state of element, which generates dynamically.
     * @type {[type]}
     */
    handleDynamicTextChange (event: React.FormEvent<bs.FormProps>, index: number): void {
        
        let elementName = event.currentTarget.name;
        elementName = elementName ? elementName : '';
        let elementVal = event.currentTarget.value;
        let dynamicRunningCourse = this.state.dynamicRunningCourse;
        dynamicRunningCourse[index][elementName] = elementVal;
        this.setState({dynamicRunningCourse: dynamicRunningCourse});
    }

    /**
     * Here, we are handing create form submit request.
     * @type {[type]}
     */
    handleSubmit (e: React.SyntheticEvent<EventTarget>): void {
      
      e.preventDefault();
      this.setState({isRequesting: true});
      let body = {

        method: 'POST', 
        body: this.getJson()
      }

      let api = new Api();
      api.getFetch('running-course',body )
        .then((response: serverResponse) => {

          this.setState({
            isRequesting: false, 
            showSweetAlert: true,
            ...response
          });

        }).catch( (response: serverResponse) => {

          this.setState({
            isRequesting: false,
            showSweetAlert: true, 
            ...response
          });

        });     
    }

    onOk(): void {

      this.setState({ showSweetAlert: false });
      if (this.state.status) {

        store.dispatch(push(appUrl('/running-course')));
      }
    }

    fetchCourseOfCategory(categoryName: string): void {

      let api = new Api();
      let body = {
        method: 'POST',
        body: {category: categoryName}
      };
      api.getFetch('course-of-category', body)
        .then((response: GetCourseByCategoryServerResponse) => {
            
            this.setState({courseOfCategory: response.data });
        })
    }

   
    public render() {

      const course = this.state.runningCourse;

      const { isRequesting, dynamicRunningCourse ,courseOfCategory } = this.state;
      let errors = this.state ? this.state.errors : [];

      let templateDefaultProps = {
        user: this.props.user,
        history: this.props.history,
        showLoaderBar: this.props.showLoaderBar,
        showOverlayLoader: this.props.showOverlayLoader,
        page: 'runningCourseCreate'
      };

      let selectProps = {

        name: 'category',
        value: course.category ? course.category : '',
        options: course.categoiesSelect(),
        onChange: (e: SelectOptionProps ) => {this.handleChangeSelect( e, 'category')}
      };

      let courseProps = {

        name: 'course_id',
        value: course.course_id ? course.course_id : '',
        options: courseOfCategory,
        onChange : (e: SelectOptionProps ) => {this.handleChangeSelect( e, 'course_id')}
      };

      let textProps = {

        type: 'text',
        onChange: this.handleTextChange
      };

      
      let targetGroupElements = {
        ...textProps,
        name: 'target_group',
        disabled: true,
        placeholder: 'Target Group',
        value: course.target_group ? course.target_group : ''
      };
     

      let vendorElements = {
        ...textProps,
        name: 'vendor',
        componentClass: 'textarea',
        placeholder: 'Vendor',
        value: course.vendor ? course.vendor : '',
        onChange: this.handleTextChange
      };

      return (

          <Template {...templateDefaultProps} >
          <bs.Form horizontal={true} onSubmit={e => this.handleSubmit( e )} >       
            <CsFormGroup elementName="course.category" errors={errors}>
                <bs.Col sm={2}>Category: </bs.Col>
                <ColWithError elementName="course.category" errors={errors}  sm={10}>
                    <Select {...selectProps}  />
                </ColWithError>               
            </CsFormGroup>

            <CsFormGroup elementName="course.course_id" errors={errors}>
                <bs.Col  sm={2}>Course Title: </bs.Col>
                <ColWithError elementName="course.course_id" errors={errors}  sm={10}>
                    <Select {...courseProps}  />
                </ColWithError>
            </CsFormGroup>

            <CsFormGroup elementName="course.target_group" errors={errors}>
                <bs.Col sm={2}>Target Group: </bs.Col>
                <ColWithError sm={10} elementName="course.target_group" errors={errors}>
                    <bs.FormControl {...targetGroupElements} />
                </ColWithError>
            </CsFormGroup>

            <CsFormGroup elementName="course.vendor" errors={errors}>
                <bs.Col sm={2}>Vendor: </bs.Col>
                <ColWithError sm={10} elementName="course.vendor" errors={errors} >
                    <bs.FormControl {...vendorElements} />
                </ColWithError>
            </CsFormGroup>

            <table className="table">
            <thead>
              <tr>
                <th>Select Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Test Start Date</th>
                <th>Test End Date</th>
                <th>Closing Date</th>
                <th>Available Slots</th>
              </tr>
              </thead>
              <tbody>
              {(() => {

                let courseTypeProps = {

                  name: 'course_run_type',
                  options: [
                    {
                      value: 'Normal',
                      label: 'Normal'
                    },
                    {
                      value: 'Consecutive',
                      label: 'Consecutive'
                    }
                  ]                 
                }

                let courseClosingOption = {

                  name: 'closing_date_option',
                  options: [
                    {
                      value: '',
                      label: 'Select'
                    },
                    {
                      value: '2weeks_before',
                      label: '2 Weeks Before'
                    },
                    {
                      value: 'manual',
                      label: 'Manual Input'
                    }
                  ]
                }
               return  dynamicRunningCourse.map( (value: DynamicRunningCourse, index: number ) => {

                    return <tr key={`dynamicRowForCourse${index}`}>
                        <td>
                          <CsFormGroup elementName={`running_courses.${index}.course_run_type`}errors={errors}>
                          <ColWithError elementName={`running_courses.${index}.course_run_type`} errors={errors}  sm={12}>
                          <Select key={`drc_cpurse_type${index}`} {...courseTypeProps} 
                          value= {value.course_run_type} 
                          onChange={
                            (e: SelectOptionProps) => {
                              this.handleDynamicChangeSelect(e,'course_run_type',index)
                             }
                            } />
                          </ColWithError>
                          </CsFormGroup>
                        </td>
                        <td>
                            {(() => {

                              return value.dates.map( (date: CourseRunDate, dateIndex: number) => {
                                 return  (
                                   <CsFormGroup elementName={`running_courses.${index}.dates.${dateIndex}.start_date`} errors={errors}>
                                   <ColWithError elementName={`running_courses.${index}.dates.${dateIndex}.start_date`} errors={errors}  sm={8}>
                                   <DatePicker dateFormat="DD/MM/YYYY" key={`start_date_${index}${dateIndex}`}
                                          selected={date.start_date }
                                          className="form-control"
                                          isClearable={true}
                                          id={`start_date_${index}${dateIndex}`}
                                          onChange={ (date: moment.Moment | null ) => {this.handleDynamicChangeDate(date, 'start_date', dateIndex, index)}}
                                        />
                                    </ColWithError>    
                                    </CsFormGroup>    
                                   );
                              });

                            })()}  
                        </td>
                        <td>                          
                          {(() => {
                            let allowMultiDates = value.course_run_type == 'Consecutive';

                              return value.dates.map( (date: CourseRunDate, dateIndex: number) => {
                               return (
                                 <CsFormGroup elementName={`running_courses.${index}.dates.${dateIndex}.end_date`} errors={errors}>
                                 <ColWithError elementName={`running_courses.${index}.dates.${dateIndex}.end_date`} errors={errors}  sm={8}>
                                  <DatePicker dateFormat="DD/MM/YYYY" key={`end_date_${index}${dateIndex}`}
                                      id={`end_date_${index}${dateIndex}`}
                                      selected={date.end_date}
                                      className="form-control"
                                      isClearable={true}
                                      onChange={ (date: moment.Moment | null ) => {this.handleDynamicChangeDate(date, 'end_date', dateIndex, index)}}
                                  />
                                  </ColWithError>
                                  <bs.Col sm={4}>
                                  {(() => {
                                   
                                    if(allowMultiDates && dateIndex ===0) {
                                      return <bs.Button onClick={e => this.addNewDateInRow(e, index)}><FAS name="plus" /></bs.Button>
                                    } else if(dateIndex > 0) {
                                      return <bs.Button onClick={e => this.removeDateFromRow(e, index, dateIndex)}><FAS name="minus" /></bs.Button>
                                    }else{
                                      
                                      return '';
                                    }

                                  })()}
                                  </bs.Col>
                                  </CsFormGroup>
                                  ); 
                              });

                          })()}
                        </td>
                        <td>
                        <CsFormGroup elementName={`running_courses.${index}.assessment_start_date`} errors={errors} >
                            <ColWithError sm={12} elementName={`running_courses.${index}.assessment_start_date`}  errors={errors}>
                            <DatePicker dateFormat="DD/MM/YYYY" key={`dynamicRowForCourseTestStartDate${index}`}
                                selected={value.assessment_start_date }
                                className="form-control"
                                isClearable={true}
                                onChange={ (date: moment.Moment | null ) => {this.handleDynamicChangeNormalDate(date, 'assessment_start_date', index)}}
                            /> 
                            </ColWithError>
                         </CsFormGroup>                            
                        </td>
                        <td>
                        <CsFormGroup elementName={`running_courses.${index}.assessment_end_date`} errors={errors}>
                          <ColWithError sm={12} elementName={`running_courses.${index}.assessment_end_date`}  errors={errors}>
                             <DatePicker dateFormat="DD/MM/YYYY" key={`dynamicRowForCourseTestStartDate${index}`}
                              selected={value.assessment_end_date }
                              className="form-control"
                              isClearable={true}
                              onChange={ (date: moment.Moment | null ) => {this.handleDynamicChangeNormalDate(date, 'assessment_end_date', index)}}
                            />
                          </ColWithError>   
                        </CsFormGroup>
                        </td>
                        <td>
                        <CsFormGroup elementName={`running_courses.${index}.closing_date`} errors={errors} displayerror={true}>
                          <Select {...courseClosingOption} 
                          key={`drc_closing_date_option${index}`}
                          value= {value.closing_date_option} 
                          onChange={
                            (e: SelectOptionProps) => {
                              this.handleDynamicChangeSelect(e,'closing_date_option',index)
                            }} 
                           />

                          {(() => {

                            if (value.closing_date_option === 'manual') {
                            return <DatePicker dateFormat="DD/MM/YYYY" key={`dynamicRowForCourseCloseDate${index}`}
                              selected={value.closing_date}
                              className="form-control"
                              isClearable={true}
                              onChange={ (date: moment.Moment | null ) => {this.handleDynamicChangeNormalDate(date, 'closing_date', index)}}
                            />
                            } else {

                              return '';
                            } 
                          })()}
                          </CsFormGroup>                       
                        </td>
                        <td>
                          <CsFormGroup elementName={`running_courses.${index}.available_slots`} errors={errors}>
                          <ColWithError sm={10} elementName={`running_courses.${index}.available_slots`} errors={errors}>
                              <bs.FormControl 
                              name="available_slots" 
                              value={ value.available_slots ? value.available_slots: ''}
                              type="number"
                              min={1}
                              onChange={(event: React.FormEvent<bs.FormProps>) => {this.handleDynamicTextChange(event, index)} }
                              />
                          </ColWithError>

                          <bs.Col sm={2}>
                          {(() => {
                            if(index === 0) {
                              return <bs.Button bsStyle="info" onClick={this.addNewRow}>
                                <FAS name="plus" />
                              </bs.Button>;
                            } else {

                              return <bs.Button bsStyle="danger" onClick={e => this.removeNewRow(e, index)}>
                                <FAS name="minus" />
                              </bs.Button>;
                            }
                          })()}

                          </bs.Col>
                          </CsFormGroup>
                        </td>
                    </tr>
                });

              })()}
           </tbody>
           </table>

           <bs.FormGroup>
                <bs.Col smOffset={2} sm={10}>
                    <bs.Button type="submit" disabled={isRequesting}>
                      {isRequesting ? 'Please wait...' : 'Create'}
                    </bs.Button>
                </bs.Col>
            </bs.FormGroup>
           <DateConfirmation {...this.props.oldDateConfirmation} />
          </bs.Form>     
          {(() => {

            if (typeof this.state.message !== 'undefined' && this.state.message )  {

              let alertOpts = {
                show: this.state.showSweetAlert,
                title: '',
                onConfirm: this.onOk,
                info: true,
                danger:false
              }

              if(this.state.status){

                alertOpts.info = true;
                alertOpts.danger = false;

              }else{

                alertOpts.danger = true;
                alertOpts.info = false;
              }  

              return <SweetAlert {...alertOpts}>{this.state.message}</SweetAlert>;

            } else {

                return null;
            }
        })()}

         </Template>
      );
    }

    // showConfimationPupOnOldDate(date: moment.Moment, CallBack: Function){

    //   this.setState({
    //     showSweetAlert: true,
    //     message: ''
    //   });
    // }
    
    /**
     * Creating the new row for the running course details
     */
    addNewRow(){
      //DefaultDynamicRow
      const dynamicRunningCourse = this.state.dynamicRunningCourse;
      dynamicRunningCourse.push(_.cloneDeep(DefaultDynamicRow));

      this.setState({dynamicRunningCourse: dynamicRunningCourse});
    }
    /**
     * Removing row of runninf course
     * @param  {any} e:     any           [Remove button evnet]
     * @param  {number} index: number        index of array, which sholud remove.
     * @return {void}        
     */
    removeNewRow(e: any, index: number) {

      let dynamicRunningCourse = this.state.dynamicRunningCourse;
      delete dynamicRunningCourse[index];
      dynamicRunningCourse = {...dynamicRunningCourse };

      dynamicRunningCourse = _.values(dynamicRunningCourse);

      this.setState({dynamicRunningCourse: dynamicRunningCourse});
    }

    /**
     * Add the new date picker for start and end date
     * @param {any} e:     any   add button event
     * @param {number} index: number [index of array in which need to add new date.]
     */
    addNewDateInRow(e: any, index: number){

      let dynamicRunningCourse = this.state.dynamicRunningCourse;
      dynamicRunningCourse[index].dates.push({start_date: null, end_date: null});
      this.setState({dynamicRunningCourse: dynamicRunningCourse});
    }

    /**
     * remove the row of start and end date picker
     * @param  {event} e:         any           button event
     * @param  {number} index:     number        index of array from which need to remove the date row.   
     * @param  {number} dateIndex: number        index of start and end date object array, which should delete. 
     * @return {void }            Just updating the state
     */
    removeDateFromRow(e: any, index: number, dateIndex: number) {

      let dynamicRunningCourse = this.state.dynamicRunningCourse;
      let dates = dynamicRunningCourse[index].dates;
      // removing the index of date
      delete dates[dateIndex];
      // removeing the empty index
      dates = {...dates};
      
      // reindexing the array
      dates = _.values(dates);
      
      dynamicRunningCourse[index].dates = dates;
      
      this.setState({dynamicRunningCourse: dynamicRunningCourse});
    }
   
    private getJson() {

        let course = _.cloneDeep(this.state.runningCourse);
        let runningCourse = _.cloneDeep(this.state.dynamicRunningCourse);
        course.category = course.category ? course.category: null; 
        course.title = course.title ? course.title: null; 
        course.course_id = course.course_id ? course.course_id: null; 
        course.target_group = course.target_group ? course.target_group: null; 
        course.vendor = course.vendor ? course.vendor: null; 

        runningCourse.map(function(value: object, index: number){

            value['assessment_end_date'] = value['assessment_end_date'] ? value['assessment_end_date'].format('YYYY-MM-DD') : null;
            value['assessment_start_date'] = value['assessment_start_date'] ? value['assessment_start_date'].format('YYYY-MM-DD') : null;
            value['closing_date'] = value['closing_date'] ? value['closing_date'].format('YYYY-MM-DD') : null;

            value['dates'].map(function( date: object, dateIndex: number){
                date['start_date'] = date['start_date'] ? date['start_date'].format('YYYY-MM-DD') : null;
                date['end_date'] = date['end_date'] ? date['end_date'].format('YYYY-MM-DD') : null;                
            });

        });

        return {
          course: course,
          running_courses: runningCourse,
        }
    }

}
