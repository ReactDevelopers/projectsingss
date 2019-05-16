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
var FAS = require('react-fontawesome');
//let Parser = require('html-react-parser');

class User extends React.Component <Props> {
    
    constructor(props: Props) {
        super(props);

        this.actionButton = this.actionButton.bind(this);
    }
     /**
      * //role_id
     *  Listing the column name, which will display on the web page.
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
              columnTitle: 'Name',
              dataField: 'name',
              dataAlign:dataAlign,
              export: false,
              dataSort: true,
              title: 'Name',
              width: "180px",              
            },
            {
                columnTitle: 'PUBNET ID',
                dataField: 'pubnet_id',
                dataAlign:dataAlign,
                export: false,
                title: 'PUBNET ID',
                width: "80px",  
                dataSort: true            
            },
            {
                columnTitle: 'Email',
                dataField: 'email',
                dataAlign:dataAlign,
                export: false,
                title: 'Email',
                width: "200px",  
                dataSort: true            
            },
            {
                columnTitle: 'Role',
                dataField: 'role_name',
                dataAlign:dataAlign,
                export: false,
                title: 'Role',
                width: "70px",
                dataSort: true              
            },
            {
                columnTitle: 'To/CC',
                dataField: 'recipient',
                dataAlign:dataAlign,
                export: false,
                title: 'To/CC',
                width: "70px", 
                dataSort: true             
            },
            {
                columnTitle: 'Action',
                dataField: '',
                dataAlign: dataAlign,
                dataFormat: this.actionButton,
                export: false,
                title: 'Action',
                width: "60px",              
              }
        ];
    }
    
    shouldComponentUpdate(nextProps: Props) {

        const nextEvent = nextProps.rootState.server['users'];
        const nextChange = nextEvent ? nextEvent.shouldUpdate : false;
        const event = this.props.rootState.server['users'];
        const change = event ? event.shouldUpdate : false;
        if(nextChange !== change){

            return true;
        }
        return false;
    }
    /**
     * Rending the action button [delete, edit] in the list row
     * @type {[type]}
     */
    actionButton (cell: undefined, row: {[key: string]: any} ): string | React.ReactElement<HTMLElement> {
      
        return (
          <div>
            <Button onClick={(e) => { 
                this.props.history.push('/user/'+row.id);

             }} bsStyle="info" title="Edit User" >
              <FAS name="pencil" />
            </Button>
           {/* <Button bsStyle="warning" title="Delete User" onClick={(e) => { this.deleteConfirm(e, row); }} >
              <FAS name="trash" />
            </Button>*/}
          </div>
         );
    }

    /**
     * To delete the Event
     * @param e 
     * @param row 
     */
    deleteConfirm(e: any, row: {[key: string]: any} ) {

        this.props.swal.confirm('Are you sure you wnat to delete the user ?', () => {
            this.props.swal.wait('Deleting...');
            let endPoint = {...API.USER_ACTION};
            endPoint.method = 'DELETE';
            endPoint.url += '/'+row.id;
            this.props.callApi(endPoint)
                .then(() => {

                    this.props.swal.success('User has been Deleted Successfully.');
                    this.props.callApi(API.USER);

                }).catch((resposne: ServerResponse) => {

                    this.props.swal.error(resposne.message? resposne.message : 'Server Error.' );
                }) 
        })
    }

    render() {
        
        const defaultPaginationPos: PaginationPostion = 'bottom';
        const breadcrumbs = [
            {title: 'User List', url: '/user'},   
        ];

        const defaultData = {
            sortName: 'name',
            sortOrder: 'asc'
        }

        return (
            <Template {...this.props}  breadcrumb={breadcrumbs}>
                <div className="lineframe">
            		<div className="lineframe-inner">
                        <Table 
                        {...this.props} 
                        columns={this.getColumns()} 
                        endPoint={API.USER} 
                        paginationPosition={defaultPaginationPos} 
                        defaultData={defaultData}
                        />
            		</div>
                </div>

            </Template>
        )
    }
}

export default connect(mapStateToProps, mapDispatchToProps)(User)