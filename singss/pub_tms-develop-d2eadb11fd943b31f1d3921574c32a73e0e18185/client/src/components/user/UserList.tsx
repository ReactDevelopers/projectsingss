import * as React from 'react';
// serverResponse
import {  AppProps, serverResponse } from '../../app-interface';
import Template from '../helpers/Template';
import Api from '../../api/Api';
import { Button } from 'react-bootstrap';
var FAS = require('react-fontawesome');

import {  DataAlignType } from 'react-bootstrap-table';
import { push } from 'connected-react-router';
import appUrl from '../../helper';
import store from '../../store';

import DeleteConfirmation, { DeleteConfirmationProps } from '../helpers/DeleteConfirmation';
import { deleteConfirmationShow } from  '../../actions/DeleteConfirmation'; 

// Table Template Components
import TableTemplate, { TableProps, TableColumnProps } from '../helpers/TableTemplate';
import { tableRefreah } from '../../actions/TableTemplate';

import { NavLink } from 'react-router-dom';

export interface UserRow {

  id: number;
  name: string;
  department_name: string;
  designation: string;
  pubnet_id: string;
  email: string;
}

export interface UserDataTableProps extends AppProps { 

  deleteConfirmation: DeleteConfirmationProps;
  tableData: TableProps;
}

export default class UserList extends React.Component<UserDataTableProps> {

    constructor(props: UserDataTableProps) {

        super(props);

        this.doDelete = this.doDelete.bind(this);       
        this.onDeleteConfirm = this.onDeleteConfirm.bind(this); 
        this.actionButton = this.actionButton.bind(this); 
        this.onEdit = this.onEdit.bind(this);      
        
    }

    actionButton (cell: undefined, row: UserRow ): string | React.ReactElement<HTMLElement> {

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

    onEdit(row: UserRow  ): void {
       
      store.dispatch(push(appUrl('/user/' + row.id + '/edit')));
    }

    onDeleteConfirm(e: React.SyntheticEvent<EventTarget>, row: UserRow ): void {
        
        let param = row;
        let name = row.name;
        let message = 'Are you sure you wnat to delete ' + name + '?';
        store.dispatch(deleteConfirmationShow(param, message));    
    }

    doDelete(param: UserRow): Promise<object> {

        let api = new Api();
        if ( param.id !== undefined ) {
          
          let body = {
            method: 'delete',
          };

          return api.getFetch('user/' + param.id, body )
            .then( (response: serverResponse ) => {             
               store.dispatch(tableRefreah());
               return response;
            });
        }
        return Promise.reject(param);
    }

    public render() {
       
        let alertdata =  { ...this.props.deleteConfirmation };
        let defaultTableProps = {...this.props.tableData};
        
        if (!defaultTableProps.sortName) {
          defaultTableProps.sortName = 'name';
        }

        defaultTableProps.fetch = 'user/list';

        let TemplateDefaultProps = {
          user: this.props.user,
          history: this.props.history,
          showLoaderBar: this.props.showLoaderBar,
          showOverlayLoader: this.props.showOverlayLoader,
          page: 'user_list',

        };
        
        return (

          <Template {...TemplateDefaultProps}>
            
            <Button bsStyle="info" className="drop-link">
              <NavLink to={appUrl('user-import',false)}>
                <FAS name="plus" />
              </NavLink>
            </Button>          
          
            <TableTemplate {...defaultTableProps} columns={this.getColumns()} /> 

            <DeleteConfirmation {...alertdata} onDelete={(param: UserRow ) => this.doDelete(param)} />
          
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
            dataSort: true,
            hidden: true,
            isKey: true,
            title: 'ID'
          },
          {
            columnTitle: true,
            dataField: 'name',
            dataAlign: dataAlign,
            title: 'Name',
            dataSort: true,
          },
          {
            columnTitle: true,
            dataField: 'email',
            dataAlign: dataAlign,
            title: 'Email', 
            dataSort: true,           
          },
          {
            columnTitle: true,
            dataField: 'pubnet_id',
            dataAlign: dataAlign,
            title: 'PUBNET Id',
            dataSort: true,       
          },
          {
            columnTitle: true,
            dataField: 'department',
            dataAlign: dataAlign,
            title: 'Department', 
            dataSort: true,           
          },
          {
            columnTitle: true,
            dataField: 'designation',
            dataAlign: dataAlign,
            title: 'Designation',
            dataSort: true,            
          },
          {
            columnTitle: true,
            dataField: '',
            dataFormat: this.actionButton,
            export: false,
            title: 'Action'           
          }
      ];
    }    
}