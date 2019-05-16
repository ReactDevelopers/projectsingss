import * as React from 'react';
//
import { AppState, AppProps, serverResponse, matchState } from '../../app-interface';
import Template from '../helpers/Template';
import * as bs from 'react-bootstrap';
import Select from 'react-select';
import CsFormGroup from '../helpers/CsFormGroup';
import ColWithError from '../helpers/ColWithError';

import Course, { CourseProps } from '../../models/Course';
import Api from '../../api/Api';
import SweetAlert from 'react-bootstrap-sweetalert';
import store from '../../store';
import appUrl from '../../helper';
import { push } from 'connected-react-router';

export interface CourseEditState extends AppState {

  course: CourseProps;
  showSweetAlert: boolean;
}

export interface CourseEditProps extends AppProps {

  match: matchState;
}

export default class CourseEdit extends React.Component<CourseEditProps, CourseEditState > {

    public courseId: number;

    constructor(props: CourseEditProps) {

        super(props);

        this.handleTextChange = this.handleTextChange.bind(this);
        this.courseId = this.props.match.params.id !== undefined ? this.props.match.params.id : 0;
        this.getData = this.getData.bind(this);
        this.onOk  = this.onOk.bind(this);

        this.getData(this.courseId);
    }

    /**
     * Assign the default state before mount the html.
     * @return {[type]} [description]
     */
    componentWillMount() {

      this.setState({course: new Course(), showSweetAlert: false});
    }

    /**
     * Updatng the category state on change
     * @type {Object}
     */
    handleChangeSelect(e: { value: number, label: string } | any, elementName: string): void {

      let course = this.state.course;
      let elementVal = e ? e.value : '';
      course[elementName] = elementVal;
      this.setState({course: course});
    }
    
    /**
     * Update the state if user change the text field value.
     * @type {void}
     */
    handleTextChange (event: React.FormEvent<bs.FormProps>): void {
      
      let elementName = event.currentTarget.name;
      elementName = elementName ? elementName : '';
      let elementVal = event.currentTarget.value;

      let course = this.state.course;
      course[elementName] = elementVal;
      this.setState({course: course});
    }

    /**
     * Handling the form submit request.
     * @type {[type]}
     */
    handleSubmit (e: React.SyntheticEvent<EventTarget>): void {
      
      e.preventDefault();

      this.setState({isRequesting: true});

      let api = new Api();
      let body = { method: 'PUT', body: this.state.course };

      api.getFetch('course/' + this.courseId, body)
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

    /**
     * Handling the alert ok button click event
     */
    onOk(): void {

      this.setState({ showSweetAlert: false });
      if (this.state.status) {

        store.dispatch(push(appUrl('/course')));
      }
    }

    /**
     * Rending the html
     * @return {[type]} [description]
     */
    public render() {

      const course = this.state.course;

      const { isRequesting } = this.state;
      let errors = this.state ? this.state.errors : [];

      let templateDefaultProps = {
        user: this.props.user,
        history: this.props.history,
        showLoaderBar: this.props.showLoaderBar,
        showOverlayLoader: this.props.showOverlayLoader,
        page: 'course_edit'
      };

      let selectProps = {

        name: 'category',
        value: course.category ? course.category : '',
        options: course.categoiesSelect(),
      };

      let textProps = {

        type: 'text',
        onChange: this.handleTextChange
      };

      let titleElements = {
        ...textProps,
        name: 'title',
        placeholder: 'Category Title',
        value: course.title ? course.title : ''
      };

      let targetGroupElements = {
        ...textProps,
        name: 'target_group',
        placeholder: 'Target Group',
        value: course.target_group ? course.target_group : ''
      };

      let descriptionElements = {
        ...textProps,
        name: 'description',
        componentClass: 'textarea',
        placeholder: 'Description',
        value: course.description ? course.description : ''
      };

      let durationInDayElements = {
        ...textProps,
        name: 'duration_in_day',
        type: 'number',
        placeholder: 'Days',
        value: course.duration_in_day ? course.duration_in_day : ''
      };

      let durationInHourElements = {
        ...textProps,
        name: 'duration_in_hour',
        type: 'number',
        placeholder: 'hours',
        value: course.duration_in_hour ? course.duration_in_hour : ''
      };

      let websiteElements = {
        ...textProps,
        name: 'website',
        placeholder: 'Website',
        value: course.website ? course.website : ''
      };

      let remarkElements = {
        ...textProps,
        name: 'remark',
        componentClass: 'textarea',
        placeholder: 'Remark',
        value: course.remark ? course.remark : ''
      };

      return (

          <Template {...templateDefaultProps} >
          <bs.Form horizontal={true} onSubmit={e => this.handleSubmit( e )} >       
            <CsFormGroup elementName="category" errors={errors}>
                <bs.Col sm={2}>Name: </bs.Col>
                <ColWithError elementName="category" errors={errors}  sm={10}>
                    <Select {...selectProps} onChange={e => this.handleChangeSelect( e, 'category')} />
                </ColWithError>               
            </CsFormGroup>

            <CsFormGroup elementName="title" errors={errors}>
                <bs.Col  sm={2}>Title: </bs.Col>
                <ColWithError sm={10} elementName="title" errors={errors}>
                    <bs.FormControl {...titleElements} />
                </ColWithError>
            </CsFormGroup>

            <CsFormGroup elementName="target_group" errors={errors}>
                <bs.Col sm={2}>Target Group: </bs.Col>
                <ColWithError sm={10} elementName="target_group" errors={errors}>
                    <bs.FormControl {...targetGroupElements} />
                </ColWithError>
            </CsFormGroup>

            <CsFormGroup elementName="description" errors={errors}>
                <bs.Col sm={2}>Description: </bs.Col>
                <ColWithError sm={10} elementName="description" errors={errors}>
                    <bs.FormControl {...descriptionElements} />
                </ColWithError>
            </CsFormGroup>

            <CsFormGroup elementName="duration" errors={errors}>
                <bs.Col sm={2}>Course Duration : </bs.Col>
                <bs.Col sm={10}>
                  <bs.Row>
                    <bs.Col sm={6}>
                    <CsFormGroup elementName="duration_in_day" errors={errors}>
                        <ColWithError sm={8} elementName="duration_in_day" errors={errors} >
                          <bs.FormControl {...durationInDayElements} />
                        </ColWithError>
                        <bs.Col sm={4}>Day(s)</bs.Col>
                    </CsFormGroup>
                    </bs.Col>
                    <bs.Col sm={6}>
                    <CsFormGroup elementName="duration_in_hour" errors={errors}>
                         <ColWithError sm={8} elementName="duration_in_hour" errors={errors} > 
                          <bs.FormControl {...durationInHourElements} />
                         </ColWithError>
                        <bs.Col sm={4}>Hour(s)</bs.Col>
                    </CsFormGroup>
                    </bs.Col>
                  </bs.Row>
                </bs.Col>
            </CsFormGroup>

            <CsFormGroup elementName="website" errors={errors}>
                <bs.Col sm={2}>Website: </bs.Col>
                <ColWithError sm={10} elementName="website" errors={errors} >
                    <bs.FormControl {...websiteElements} />
                </ColWithError>
            </CsFormGroup>

            <CsFormGroup elementName="remark" errors={errors}>
                <bs.Col sm={2}>Remark: </bs.Col>
                <ColWithError sm={10} elementName="remark" errors={errors} >
                    <bs.FormControl {...remarkElements} />
                </ColWithError>
            </CsFormGroup>

           <bs.FormGroup>
                <bs.Col smOffset={2} sm={10}>
                    <bs.Button type="submit" disabled={isRequesting}>
                      {isRequesting ? 'Please wait...' : 'Update'}
                    </bs.Button>
                </bs.Col>
            </bs.FormGroup>
          </bs.Form>     
          {(() => {

            if (typeof this.state.message !== 'undefined' && this.state.message )  {

                return <SweetAlert show={this.state.showSweetAlert} title={<span>Alert !</span>} onConfirm={this.onOk}>
                {this.state.message}
                </SweetAlert>;

            } else {

                return null;
            }
        })()}
         </Template>
      );
    }

   /**
    * getting the Course information from the server and store into the {course} state
    * @param  {number} courseId: number        [description]
    * @return {void}  
    */
    private getData(courseId: number): void {

        let api = new Api();
        let data = api.getFetch('course/' + courseId + '/edit', {method: 'POST'});
        data.then( (response: CourseDetailRepose) => {

            let course = this.state.course;

            course.id = response.data.course.id;
            course.category = response.data.course.category;
            course.title = response.data.course.title;
            course.target_group = response.data.course.target_group;
            course.description = response.data.course.description;
            course.duration_in_day = response.data.course.duration_in_day;
            course.duration_in_hour = response.data.course.duration_in_hour;
            course.website = response.data.course.website;
            course.remark = response.data.course.remark;
            this.setState({course: course});
        });
    }
}

export interface CourseDetailRepose extends serverResponse {

  data: {course: CourseProps };
}