import * as React from 'react';
// serverResponse
import {  AppProps,  serverResponse } from '../../app-interface';
import Template from '../helpers/Template';
import Api from '../../api/Api';
// import { Button } from 'react-bootstrap';
var FAS = require('react-fontawesome');

import { DataAlignType } from 'react-bootstrap-table';
import { push } from 'connected-react-router';
import appUrl, { displayDate } from '../../helper';
import store from '../../store';
import { RunningCourseProps } from '../../models/RunningCourse';

import DeleteConfirmation, { DeleteConfirmationProps } from '../helpers/DeleteConfirmation';
import { deleteConfirmationShow } from  '../../actions/DeleteConfirmation'; 

// Table Template Components
import TableTemplate, { TableProps, TableColumnProps } from '../helpers/TableTemplate';
import { tableRefreah } from '../../actions/TableTemplate';

// import { NavLink } from 'react-router-dom';
import * as bs from 'react-bootstrap';

export interface RunningCourseBookingTableProps extends AppProps { 

  deleteConfirmation: DeleteConfirmationProps;
  tableData: TableProps;
}

export default class RunningCourseBookingList extends React.Component<RunningCourseBookingTableProps> {

    constructor(props: RunningCourseBookingTableProps) {

        super(props);
       
        this.doDelete = this.doDelete.bind(this);       
        this.displayLink = this.displayLink.bind(this);       
        this.onDeleteConfirm = this.onDeleteConfirm.bind(this); 
        this.actionButton = this.actionButton.bind(this); 
        this.onEdit = this.onEdit.bind(this); 
        this.displayEndDate = this.displayEndDate.bind(this); 
        this.displayStartDate = this.displayStartDate.bind(this); 
        this.testResultAction = this.testResultAction.bind(this); 
        
    }
    
    /**
     * Rending the action button [delete, edit] in the list row
     * @type {[type]}
     */
    actionButton (cell: undefined, row: RunningCourseProps ): string | React.ReactElement<HTMLElement> {
       
      let options = [
        'Successfully Registered',
        'Successfully Registered (All)',
        'Attended',
        'Attended (All)',
        'Cancelled',
        'Cancelled (All)',
        'Absent',
        'Send Reminder Email',
        'Send Reminder Email (All)',
      ];

      return (
        <div>
           <bs.DropdownButton
                title="Select"
                id="dropdown-size-large"
             >
             <bs.MenuItem eventKey="" >Select</bs.MenuItem>

             {(() => {
               return options.map((value: string, index:number ) =>{

                  return <bs.MenuItem eventKey={value} key={`action${index}`} >{value}</bs.MenuItem>
               })
             })()}

             </bs.DropdownButton>
        </div>
       );
    }

    testResultAction (cell: undefined, row: RunningCourseProps ): string | React.ReactElement<HTMLElement> {
      let options = [
        'Pass',
        'Fail',
        'NA',
      ];
      return (
         <bs.DropdownButton
              title="Select"
              id="dropdown-size-large"
           >
           <bs.MenuItem eventKey="" >Select</bs.MenuItem>

           {(() => {
             return options.map((value: string, index:number ) =>{

                return <bs.MenuItem eventKey={value} key={`action_test${index}`} >{value}</bs.MenuItem>
             })
           })()}
          </bs.DropdownButton>
       );
    }

    /**
     * Rending the url in anchar tag if availble
     * @type {[type]}
     */
    displayLink (cell: undefined, row: RunningCourseProps ): string | React.ReactElement<HTMLElement> {

      return (
          row.website ? <a href={row.website} target="_blank"><FAS name="link" /></a> : ''
        );
    }

    /**
     * Display the duration column value according to day and hour
     * @type {[type]}
     */
    displayDuration(cell: undefined, row: RunningCourseProps ): string | React.ReactElement<HTMLElement> {

      let days = row.duration_in_day ? row.duration_in_day : 0;
      let hours = row.duration_in_hour ? row.duration_in_hour : 0;
      let durationText = days + ' Days ' + hours + ' Hours';

      return (
          durationText
        );
    }

    displayStartDate(cell: undefined, row: RunningCourseProps) : string | React.ReactElement<HTMLElement> {

      return getStartDate('start_date',row);
    }

    displayEndDate(cell: undefined, row: RunningCourseProps) : string | React.ReactElement<HTMLElement> {

      return getStartDate('end_date',row);
    }

    displayDate(cell: string, row: RunningCourseProps) : string | React.ReactElement<HTMLElement> {

      return displayDate(cell);
    }

    /**
     * Redirect to the edit course page
     * @type {[type]}
     */
    onEdit(row: RunningCourseProps  ): void {
       
      store.dispatch(push(appUrl('/running-course/' + row.id + '/edit')));
    }

    /**
     * Dispalying the alert on click, when click on the delete button
     * @type {[type]}
     */
    onDeleteConfirm(e: React.SyntheticEvent<EventTarget>, row: RunningCourseProps ): void {
        
        let param = row;
        let name = row.title;
        let message = 'Are you sure you wnat to delete ' + name + '?';
        store.dispatch(deleteConfirmationShow(param, message));    
    }
    /**
     * handling the request to delete the course
     * @type {[type]}
     */
    doDelete(param: RunningCourseProps): Promise<object> {

        let api = new Api();
        if ( param.id !== undefined ) {
          
          let body = {
            method: 'delete',
          };

          return api.getFetch('running-course/' + param.id, body )
            .then( (response: serverResponse ) => {             
               
               store.dispatch(tableRefreah());
               return response;
            });
        }
        return Promise.reject(param);
    }

    public render() {
       
        let alertdata =  { ...this.props.deleteConfirmation };
        let defaultTableProps = this.props.tableData;
        
        if (!defaultTableProps.sortName) {
         defaultTableProps.sortName ='title';
        }

        defaultTableProps.fetch = 'running-course-booking/list';

        let TemplateDefaultProps = {
          user: this.props.user,
          history: this.props.history,
          showLoaderBar: this.props.showLoaderBar,
          showOverlayLoader: this.props.showOverlayLoader,
          page: 'runningCourseBooking'
        };

        return (

          <Template {...TemplateDefaultProps}>
           
             <TableTemplate {...defaultTableProps} columns={this.getColumns()} /> 
             <DeleteConfirmation {...alertdata} onDelete={(param: RunningCourseProps ) => this.doDelete(param)} />
          </Template>
        );
    }

    /**
     * Listing the column name, which will display on the web page.
     */
    getColumns(): TableColumnProps[] {
      
      let dataAlign: DataAlignType = 'center';

      return [
          {
            columnTitle: true,
            dataField: 'id',
            dataAlign: dataAlign,
            hidden: true,
            isKey: true,
            title: 'ID'

          },
          {
            columnTitle: true,
            dataField: '',
            dataFormat: this.actionButton,
            export: false,
            title: 'Action',
            width: "100px",
            columnClassName: 'remove_overflow' 
          },
          {
            columnTitle: true,
            dataField: 'status',
            dataAlign: dataAlign,
            dataSort: true,
            title: 'Status'
          },
          {
            columnTitle: true,
            dataField: 'title',
            dataAlign: dataAlign,
            dataSort: true,
            title: 'Course Title',            
          },
          {
            columnTitle: true,
            dataField: 'officer_name',
            dataAlign: dataAlign,
          //  dataFormat: this.displayDuration,
            title: 'Officer',
            dataSort: true,            
          },

          {
            columnTitle: true,
            dataField: 'strat_date',
            dataAlign: dataAlign,
            dataFormat: this.displayStartDate,
            title: 'Start Date',
            dataSort: true,          
          },
          {
            columnTitle: true,
            dataField: 'end_date',
            dataAlign: dataAlign,
            dataFormat: this.displayEndDate,
            title: 'End Date',  
            dataSort: true,          
          }, 
          {
            columnTitle: true,
            dataField: '',
            dataAlign: dataAlign,
            dataFormat: this.testResultAction,
            title: 'Test Result', 
            columnClassName: 'remove_overflow' 
            //dataSort: true,           
          }, 
          {
            columnTitle: true,
            dataField: 'assessment_result',
            dataAlign: dataAlign,
           // dataFormat: this.displayDate,
            title: 'Test Status', 
            dataSort: true,           
          },
          
          {
            columnTitle: true,
            dataField: 'department_name',
            dataAlign: dataAlign,
            title: 'Dept', 
            dataSort: true,           
          },
          {
            columnTitle: true,
            dataField: 'supervisor_name',
            dataAlign: dataAlign,
            title: 'Supervisor', 
            dataSort: true,           
          },
          {
            columnTitle: true,
            dataField: 'officer_type',
            dataAlign: dataAlign,
            title: 'Officer Type', 
            dataSort: true,           
          }         
      ];
    }
}

export function getStartDate(columnName: string, row: {dates?: Array<object> }) {

    let dates = row.dates !== undefined ? row.dates : [];
    let output: string | React.ReactElement<HTMLElement> = '';

    dates.map(function(value, index) {

      output += displayDate(value[columnName])+ '<br>';
    });

    return output;
}