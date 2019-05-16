import * as React from 'react';
import {Props, mapDispatchToProps, mapStateToProps, ServerResponse} from '../../features/root-props';
import Template from '../layout/Template';
import Table , {TableColumnProps, TableArchitecture} from '../../plugins/Table';
import  {connect } from 'react-redux';
import * as bs from 'react-bootstrap';
import API from '../../aep';
import { DataAlignType, PaginationPostion } from 'react-bootstrap-table';
import { Button } from 'react-bootstrap';
var FAS = require('react-fontawesome');
import CreatBtn from '../layout/CreateBtn';
import moment from 'moment';

class GroupEmail extends React.Component <Props> {
    
    table: null | TableArchitecture;

    constructor(props: Props) {
        super(props);

        this.actionButton = this.actionButton.bind(this);
    }
     /**
     *  Listing the column name, which will display on the web page.
     */
    getColumns(): TableColumnProps[] {
      
        let dataAlign: DataAlignType = 'center';
  
        let columns = [
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
              dataField: 'title',
              dataAlign:dataAlign,
              export: false,
              dataSort: true,              
              title: 'Group Title',
              width: "160px",            
            },
            {
                columnTitle: 'Email',
                dataField: 'email',
                dataAlign:dataAlign,
                export: false,
                dataSort: true, 
                title: 'Email',
                width: "300px",              
            },
            {
                columnTitle: 'Recipient As',
                dataField: 'recipient',
                dataAlign:dataAlign,
                export: false,
                dataSort: false, 
                title: 'Recipient As',
                width: "100px",              
            },
            {

                columnTitle: 'Action',
                dataField: '',
                dataAlign:dataAlign,
                dataFormat: this.actionButton,
                export: false,
                title: 'Action',
                width: "120px",              
            }          
                       
        ];       

        return columns;
    }
    
    shouldComponentUpdate(nextProps: Props) {

        const nextEvent = nextProps.rootState.server['group_email'];
        const nextChange = nextEvent ? nextEvent.shouldUpdate : false;
        const event = this.props.rootState.server['group_email'];
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
                this.props.history.push('/group-email/'+row.id);

             }} bsStyle="info" title="Edit Event" >
              <FAS name="pencil" />
            </Button>
            <Button bsStyle="warning" title="Delete Event" onClick={(e) => { this.deleteConfirm(e, row); }} >
              <FAS name="trash" />
            </Button>
          </div>
         );
    }

    /**
     * To delete the Event
     * @param e 
     * @param row 
     */
    deleteConfirm(e: any, row: {[key: string]: any} ) {

        this.props.swal.confirm('Are you sure you wnat to delete the group email ?', () => {
            this.props.swal.wait('Deleting...');
            let endPoint = {...API.GROUP_EMAIL_ACTION};
            endPoint.method = 'DELETE';
            endPoint.url += '/'+row.id;
            this.props.callApi(endPoint)
                .then(() => {

                    this.props.swal.success('Group Email has been deleted successfully.');
                    this.props.callApi(API.GROUP_EMAIL);

                }).catch((resposne: ServerResponse) => {

                    this.props.swal.error(resposne.message? resposne.message : 'Server Error.' );
                }) 
        })
    }

    
    render() {
        
        const defaultPaginationPos: PaginationPostion = 'bottom';
        const breadcrumbs = [
            {title: 'Group Email List', url: '/group-email'},   
        ];
        
        const auth = this.props.helper.deepFind(this.props.rootState,'server.auth_user.response.data');

        const defaultFilters = {
            sortName: 'name',
            sortOrder: 'asc',
        };

        return (
            <Template {...this.props} RightSideButton={auth && auth.role_id ===1 ? <CreatBtn url="/group-email/create"/>: undefined} breadcrumb={breadcrumbs}>
                        
                <Table {...this.props} 
                columns={this.getColumns()} 
                ref={(table) => { this.table = table }}
                endPoint={API.GROUP_EMAIL} 
                defaultData={defaultFilters}
                paginationPosition={defaultPaginationPos} />           		

            </Template>
        )
    }
}

export default connect(mapStateToProps, mapDispatchToProps)(GroupEmail)