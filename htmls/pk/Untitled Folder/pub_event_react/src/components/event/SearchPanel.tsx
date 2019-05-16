import * as React from 'react';
import {Props, mapDispatchToProps, mapStateToProps, ServerResponse} from '../../features/root-props';
import Template from '../layout/Template';
import Table , {TableColumnProps} from '../../plugins/Table';
import  {connect } from 'react-redux';
import * as bs from 'react-bootstrap';
// import EventForm, {EventFormData, EventFormProps} from '../form/EventForm';
// import {SubmissionError, FormErrors } from 'redux-form';
import API from '../../aep';
import { DataAlignType, PaginationPostion } from 'react-bootstrap-table';
import { Button } from 'react-bootstrap';
import DatePicker from 'react-datepicker';
import ReactSeelct from 'react-select';
import moment from 'moment';


class SearchPanel extends React.Component <Props> {
    
    constructor(props: Props) {

        super(props);  
        this.handleDateChange = this.handleDateChange.bind(this);
        this.handleTextChange = this.handleTextChange.bind(this);
        this.search = this.search.bind(this);
    }

    shouldComponentUpdate(nextProps: Props) {

        const nextEvent = nextProps.rootState.server['events'];
        const nextChange = nextEvent ? nextEvent.shouldUpdate : false;
        const event = this.props.rootState.server['events'];
        const change = event ? event.shouldUpdate : false;


        const nextEventYear = nextProps.rootState.server['event_years'];
        const nextEventYearChange = nextEventYear ? nextEventYear.shouldUpdate : false;
        const eventYear = this.props.rootState.server['event_years'];
        const eventYearchange = eventYear ? eventYear.shouldUpdate : false;

        if(nextChange !== change || nextEventYearChange !== eventYearchange) {

            return true;
        }
        return false;
    }

    componentWillMount() {

        this.props.callApi(API.EVENT_YEARS);
    }

    handleTextChange (event: React.FormEvent<bs.FormProps>): void {
        // console.log('pppppppppp');
        // console.log(this.props);
        let elementName = event.currentTarget.name;
        elementName = elementName ? elementName : '';
        let elementVal = event.currentTarget.value;
        this.search(elementName, elementVal);

    }

    handleDateChange(date: null | moment.Moment, elementName: string ) : void {

        this.search(elementName, date ? date.format('YYYY-MM-DD') : null);
    }

    search(key: string, value: any) {
        const {helper, rootState: { server}} = this.props;        
        const reqData = server['events'] ? server['events'].requestData : null;
        const customFilters = reqData && reqData.customFilters ? reqData.customFilters : null;
        // console.log("reqData");
        // console.log(reqData);
        // console.log(server);
        let filters  = {...customFilters, ...{[key]: value }};
        // console.log('filtersdsssssssssssss');
        // console.log(filters);
        this.props.callApi(API.EVENT, {customFilters: filters});
    }

    getYearRange(): Array<{[key: string ]:  any}> {


        //this.props.callApi(API.EVENT_YEARS).then(res =>)
        const eventYears = this.props.rootState.server['event_years'];
        let options: Array<{[key: string]: any}> = [];
        
        options.push({value: '', label: 'All'});
        const data = eventYears && eventYears.response && eventYears.response.data  ? eventYears.response.data.map(v=> {
            options.push({value: v, label: v});

        }) : [];        

        return options;
    }

    render() {
        const {helper, rootState: { server}} = this.props;
        
        const reqData = server['events'] ? server['events'].requestData : null;
        const customFilters = reqData && reqData.customFilters ? reqData.customFilters : null;

        return (
            <div className="lineframe running-course-list">
                <div className="lineframe-inner">
                    <div className="inner-form">
                        <bs.Row>
                            <bs.Col sm={2} className="p-b-15">
                                <bs.Row>
                                    <bs.ControlLabel className="col-md-12 col-sm-12">Event Title: </bs.ControlLabel>
                                    <bs.Col sm={12} className="full-width-child">
                                       <bs.FormControl  type="text" name="title" 
                                       className="form-control"
                                       placeholder="Event Title"
                                       value={customFilters ? customFilters.title : ''}
                                       onChange={this.handleTextChange}
                                       />
                                    </bs.Col>
                                </bs.Row>
                            </bs.Col>
                            <bs.Col sm={2} className="p-b-15">
                                <bs.Row>
                                    <bs.ControlLabel className="col-md-12 col-sm-12">Year: </bs.ControlLabel>
                                    <bs.Col sm={12} className="full-width-child">
                                       <ReactSeelct
                                        name="year"
                                        clearable={false}
                                        simpleValue={true}
                                        value={customFilters ? customFilters.year : ''}
                                        options={this.getYearRange()}
                                        onChange={(val) => {this.search('year', val)}}
                                        />
                                    </bs.Col>
                                </bs.Row>
                            </bs.Col>

                            <bs.Col sm={2} className="p-b-15">
                                <bs.Row>
                                    <bs.ControlLabel className="col-md-12 col-sm-12">Event Type: </bs.ControlLabel>
                                    <bs.Col sm={12} className="full-width-child">
                                       <ReactSeelct
                                        name="event_type"
                                        simpleValue={true}
                                        clearable={false}
                                        value={customFilters && customFilters.event_type ? customFilters.event_type : ''}
                                        options={[
                                            {value: '', label: 'All'},
                                            {value: 'past', label: 'Past'},
                                            {value: 'upcoming', label: 'Upcoming'},
                                            {value: 'ongoing', label: 'On-Going'}
                                        ]}
                                        onChange={(val) => {this.search('event_type', val)}}
                                        />
                                    </bs.Col>
                                </bs.Row>
                            </bs.Col>

                            <bs.Col sm={3} className="p-b-15">
                                <bs.Row>                                
                                    <bs.ControlLabel className="col-md-12 col-sm-12">Start Date: </bs.ControlLabel>
                                    <bs.Col sm={12} className="full-width-child">
                                       <DatePicker dateFormat={helper.dateFormat}
                                        key="start_date"
                                        maxDate={customFilters && customFilters.end_date ? moment(customFilters.end_date) : undefined}
                                        placeholderText={helper.dateFormat}                                        
                                        className="form-control"
                                        selected={customFilters && customFilters.start_date ? moment(customFilters.start_date) : null}
                                        isClearable={true}
                                        onChange={ (date: moment.Moment | null ) => {this.handleDateChange(date, 'start_date')}}
                                      />
                                    </bs.Col>
                                </bs.Row>
                            </bs.Col>

                            <bs.Col sm={3} className="p-b-15">
                                <bs.Row>                                
                                    <bs.ControlLabel className="col-md-12 col-sm-12">End Date: </bs.ControlLabel>
                                    <bs.Col sm={12} className="full-width-child">
                                     <DatePicker dateFormat={helper.dateFormat}
                                        key="test_start_date"
                                        minDate={customFilters && customFilters.start_date ? moment(customFilters.start_date) : undefined}
                                        selected={customFilters && customFilters.end_date ? moment(customFilters.end_date) : null}
                                        placeholderText={helper.dateFormat}                                        
                                        className="form-control"
                                        isClearable={true}
                                        onChange={ (date: moment.Moment | null ) => {this.handleDateChange(date, 'end_date')}}
                                      />
                                    </bs.Col>
                                </bs.Row>
                            </bs.Col>
                        </bs.Row>                      
                    </div>
                </div>
            </div> 
        )
    }
}
//export default SearchPanel;

export default connect(mapStateToProps, mapDispatchToProps)(SearchPanel)