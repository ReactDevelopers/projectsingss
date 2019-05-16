import * as React from 'react';
// serverResponse
import {  AppProps,  serverResponse } from '../../app-interface';
import Template from '../helpers/Template';
import Api from '../../api/Api';
import { Button } from 'react-bootstrap';
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

import { NavLink } from 'react-router-dom';

export interface RunningCourseTableProps extends AppProps { 

  deleteConfirmation: DeleteConfirmationProps;
  tableData: TableProps;
}

export default class RunningCourse extends React.Component<RunningCourseTableProps> {

    constructor(props: RunningCourseTableProps) {

        super(props);
       
        this.doDelete = this.doDelete.bind(this);       
        this.displayLink = this.displayLink.bind(this);       
        this.onDeleteConfirm = this.onDeleteConfirm.bind(this); 
        this.actionButton = this.actionButton.bind(this); 
        this.onEdit = this.onEdit.bind(this); 
        this.displayEndDate = this.displayEndDate.bind(this); 
        this.displayStartDate = this.displayStartDate.bind(this); 
        
    }
    
    /**
     * Rending the action button [delete, edit] in the list row
     * @type {[type]}
     */
    actionButton (cell: undefined, row: RunningCourseProps ): string | React.ReactElement<HTMLElement> {
      
      return (
        <div>
          <Button onClick={(e) => { this.onEdit(row); }} bsStyle="info" >
            <FAS name="pencil" />
          </Button>
          <Button bsStyle="warning" onClick={(e) => { this.onDeleteConfirm(e, row); }} >
            <FAS name="trash" />
          </Button>
          <Button bsStyle="info">
            <FAS name="address-book" />
          </Button>
        </div>
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

        defaultTableProps.fetch = 'running-course/list';

        let TemplateDefaultProps = {
          user: this.props.user,
          history: this.props.history,
          showLoaderBar: this.props.showLoaderBar,
          showOverlayLoader: this.props.showOverlayLoader,
          page: 'runningCourse'
        };

        return (

          <Template {...TemplateDefaultProps}>
            <Button bsStyle="info">
              <NavLink to={appUrl('running-course/create',false)}>
                <FAS name="plus" />
              </NavLink>
            </Button>  

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
            width: "180px" 
          },
          {
            columnTitle: true,
            dataField: 'category',
            dataAlign: dataAlign,
            dataSort: true,
            title: 'Category'
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
            dataField: 'duration',
            dataAlign: dataAlign,
            dataFormat: this.displayDuration,
            title: 'Course Duration',
            dataSort: true,            
          },

          {
            columnTitle: true,
            dataField: 'strat_date',
            dataAlign: dataAlign,
            dataFormat: this.displayStartDate,
            title: 'Start Date',
            // dataSort: true,          
          },
          {
            columnTitle: true,
            dataField: 'end_date',
            dataAlign: dataAlign,
            dataFormat: this.displayEndDate,
            title: 'End Date',  
           // dataSort: true,          
          }, 
           
          {
            columnTitle: true,
            dataField: 'assessment_end_date',
            dataAlign: dataAlign,
            dataFormat: this.displayDate,
            title: 'Test Start and End Date', 
            dataSort: true,           
          },
          {
            columnTitle: true,
            dataField: 'closing_date',
            dataAlign: dataAlign,
            dataFormat: this.displayDate,
            title: 'Close Slots', 
            dataSort: true,           
          },
          {
            columnTitle: true,
            dataField: 'available_slots',
            dataAlign: dataAlign,
            title: 'Available Slots', 
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