import * as React from 'react';
// serverResponse
import {  AppProps,  serverResponse } from '../../app-interface';
import Template from '../helpers/Template';
import Api from '../../api/Api';
import { Button } from 'react-bootstrap';
var FAS = require('react-fontawesome');

import { DataAlignType } from 'react-bootstrap-table';
import { push } from 'connected-react-router';
import appUrl from '../../helper';
import store from '../../store';
import { CourseProps } from '../../models/Course';

import DeleteConfirmation, { DeleteConfirmationProps } from '../helpers/DeleteConfirmation';
import { deleteConfirmationShow } from  '../../actions/DeleteConfirmation'; 

// Table Template Components
import TableTemplate, { TableProps, TableColumnProps } from '../helpers/TableTemplate';
import { tableRefreah } from '../../actions/TableTemplate';

import { NavLink } from 'react-router-dom';

export interface CourseDataTableProps extends AppProps { 

  deleteConfirmation: DeleteConfirmationProps;
  tableData: TableProps;
}

export default class CourseList extends React.Component<CourseDataTableProps> {

    constructor(props: CourseDataTableProps) {

        super(props);
       
        this.doDelete = this.doDelete.bind(this);       
        this.displayLink = this.displayLink.bind(this);       
        this.onDeleteConfirm = this.onDeleteConfirm.bind(this); 
        this.actionButton = this.actionButton.bind(this); 
        this.onEdit = this.onEdit.bind(this); 
        
    }
    
    /**
     * Rending the action button [delete, edit] in the list row
     * @type {[type]}
     */
    actionButton (cell: undefined, row: CourseProps ): string | React.ReactElement<HTMLElement> {
      
      return (
        <div>
          <Button onClick={(e) => { this.onEdit(row); }} bsStyle="info" >
            <FAS name="pencil" />
          </Button>
          <Button bsStyle="warning" onClick={(e) => { this.onDeleteConfirm(e, row); }} >
            <FAS name="trash" />
          </Button>
        </div>
       );
    }

    /**
     * Rending the url in anchar tag if availble
     * @type {[type]}
     */
    displayLink (cell: undefined, row: CourseProps ): string | React.ReactElement<HTMLElement> {

      return (
          row.website ? <a href={row.website} target="_blank"><FAS name="link" /></a> : ''
        );
    }

    /**
     * Display the duration column value according to day and hour
     * @type {[type]}
     */
    displayDuration(cell: undefined, row: CourseProps ): string | React.ReactElement<HTMLElement> {

      let days = row.duration_in_day;
      let hours = row.duration_in_hour;
      let durationText = days + ' Days ' + hours + ' Hours';

      return (
          durationText
        );
    }

    /**
     * Redirect to the edit course page
     * @type {[type]}
     */
    onEdit(row: CourseProps  ): void {
       
      store.dispatch(push(appUrl('/course/' + row.id + '/edit')));
    }

    /**
     * Dispalying the alert on click, when click on the delete button
     * @type {[type]}
     */
    onDeleteConfirm(e: React.SyntheticEvent<EventTarget>, row: CourseProps ): void {
        
        let param = row;
        let name = row.title;
        let message = 'Are you sure you wnat to delete ' + name + '?';
        store.dispatch(deleteConfirmationShow(param, message));    
    }
    /**
     * handling the request to delete the course
     * @type {[type]}
     */
    doDelete(param: CourseProps): Promise<object> {

        let api = new Api();
        if ( param.id !== undefined ) {
          
          let body = {
            method: 'delete',
          };

          return api.getFetch('course/' + param.id, body )
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
          defaultTableProps.sortName = 'title';
        }

        defaultTableProps.fetch = 'course/list';

        let TemplateDefaultProps = {
          user: this.props.user,
          history: this.props.history,
          showLoaderBar: this.props.showLoaderBar,
          showOverlayLoader: this.props.showOverlayLoader,
          page: 'course'
        };

        return (

          <Template {...TemplateDefaultProps}>
            
            <Button bsStyle="info">
              <NavLink to={appUrl('course/create',false)}>
                <FAS name="plus" />
              </NavLink>
            </Button>  

             <TableTemplate {...defaultTableProps} columns={this.getColumns()} /> 
             <DeleteConfirmation {...alertdata} onDelete={(param: CourseProps ) => this.doDelete(param)} />
          </Template>
        );
    }

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
            title: 'Action'           
          },
          {
            columnTitle: true,
            dataField: 'website',
            dataAlign: dataAlign,
            dataFormat: this.displayLink,
            title: 'Website',
            dataSort: true,
          },
          {
            columnTitle: true,
            dataField: 'category',
            dataAlign: dataAlign,
            title: 'Category', 
            dataSort: true,           
          },
          {
            columnTitle: true,
            dataField: 'title',
            dataAlign: dataAlign,
            title: 'Title', 
            dataSort: true,           
          },
          {
            columnTitle: true,
            dataField: 'target_group',
            dataAlign: dataAlign,
            title: 'Target Group', 
            dataSort: true,             
          },
          {
            columnTitle: true,
            dataField: 'duration',
            dataAlign: dataAlign,
            dataFormat: this.displayDuration,
            title: 'Duration',
             dataSort: true,           
          }          
      ];
    }
}