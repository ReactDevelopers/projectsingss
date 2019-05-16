import * as React from 'react';
import {Props, mapDispatchToProps, mapStateToProps, ServerResponse} from '../../features/root-props';
import Template from '../layout/Template';
import Table , {TableColumnProps, TableArchitecture} from '../../plugins/Table';
import  {connect } from 'react-redux';
import * as bs from 'react-bootstrap';
// import EventForm, {EventFormData, EventFormProps} from '../form/EventForm';
// import {SubmissionError, FormErrors } from 'redux-form';
import API from '../../aep';
import { DataAlignType, PaginationPostion } from 'react-bootstrap-table';
import { Button } from 'react-bootstrap';
var FAS = require('react-fontawesome');
import  SearchPanel from './SearchPanel';
import CreatBtn from '../layout/CreateBtn';
import moment from 'moment';
//let Parser = require('html-react-parser');
import Switch from "react-switch";

class PUBEvent extends React.Component <Props> {
    
    table: null | TableArchitecture;

    constructor(props: Props) {
        super(props);

        this.actionButton = this.actionButton.bind(this);
        this.indetifyPastUpcomingRow  = this.indetifyPastUpcomingRow.bind(this);
        this.changeInDisplayEvent  = this.changeInDisplayEvent.bind(this);
        this.displayInEmail  = this.displayInEmail.bind(this);
    }
     /**
     *  Listing the column name, which will display on the web page.
     */
    getColumns(): TableColumnProps[] {
      
        let dataAlign: DataAlignType = 'center';
        let dataAlignLeft: DataAlignType = 'left';
  
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
              columnTitle: 'Title',
              dataField: 'title',
              dataAlign:dataAlign,
              export: false,
              dataSort: true,              
              title: 'Title',
              width: "130px",  
              dataFormat: (cell: any, row: any, formatExtraData: any, rowIndex: number): string | React.ReactElement<any> => {
                return this.table ? this.table.displayLessMoreAction(cell, formatExtraData, 65) : cell;
             },            
            },
            {
                columnTitle: 'Description',
                dataField: 'description',
                dataAlign:dataAlign,
                export: false,
                dataSort: false,                
                dataFormat: (cell: any, row: any, formatExtraData: any, rowIndex: number): string | React.ReactElement<any> => {
                    return this.table ? this.table.displayLessMoreAction(cell, formatExtraData, 65) : cell;
                },
                title: 'Description',
                width: "250px",              
            },
            {
                columnTitle: 'Start Date',
                dataField: 'start_date',
                dataAlign:dataAlign,
                dataSort: true,
                dataFormat: (date: string) => { return this.props.helper.displayDate(date); },
                export: false,
                title: 'Start Date',
                width: "86px",              
            },
            {
                columnTitle: 'End Date',
                dataField: 'end_date',
                dataAlign:dataAlign,
                dataSort: true,
                dataFormat: (date: string) => { return this.props.helper.displayDate(date); },
                export: false,
                title: 'End Date',
                width: "86px",              
            },
            {
                columnTitle: 'Include in Scheduler',
                dataField: 'allow_in_scheduled_email',
                dataAlign: dataAlign,
                export: false,
                dataSort: false,              
                title: 'Include in Scheduler',
                width: "80px", 
                dataFormat: this.displayInEmail           
            },
            {
                columnTitle: 'Security Level',
                dataField: 'security_level',
                dataAlign:dataAlign,
                export: false,
                dataSort: true,              
                title: 'Security Level',
                width: "80px",              
            },
            {
                columnTitle: 'Venue',
                dataField: 'venue',
                dataAlign: dataAlign,
                export: false,
                dataSort: false,              
                title: 'Venue',
                width: "150px",              
            },
            {
                columnTitle: 'Event Group',
                dataField: 'group_name',
                dataAlign:dataAlign,
                export: false,
                dataSort: true,
                title: 'Event Group',
                dataFormat: (cell: any, row: any, formatExtraData: any, rowIndex: number): string | React.ReactElement<any> => {
                    return this.table ? this.table.displayLessMoreAction(cell, formatExtraData, 50) : cell;
                },
                width: "120px",              
            }           
                       
        ];

        const response = this.props.rootState.server['auth_user'];
        const data: {[key: string]: any} = response.response.data;

        const actionBtn: TableColumnProps = {

            columnTitle: 'Action',
            dataField: '',
            dataAlign:dataAlign,
            dataFormat: this.actionButton,
            export: false,
            title: 'Action',
            width: "120px",              
        };

        if(data.role_id === 1) {

            columns.push(actionBtn);
        }

        return columns;
    }
    
    shouldComponentUpdate(nextProps: Props) {

        const nextEvent = nextProps.rootState.server['events'];
        const nextChange = nextEvent ? nextEvent.shouldUpdate : false;
        const event = this.props.rootState.server['events'];
        const change = event ? event.shouldUpdate : false;
        if(nextChange !== change){

            return true;
        }
        return false;
    }
    changeInDisplayEvent(row: {[key: string]: any}){

        //console.log('sddddddd');
        //console.log(row);
        const allow_in_scheduled_email =  row.allow_in_scheduled_email === 'Y' ? 'N' : 'Y';
        let endPoint = {...API.EVENT_CHANGE_TO_DISPLAY_IN_EMAIL};
        endPoint.url += '/'+row.id;
        this.props.swal.wait('Updating...');

        this.props.callApi(endPoint, {allow_in_scheduled_email:allow_in_scheduled_email})
            .then((response: ServerResponse) => {

                // console.log('sdjhsjdgsjd');
                // console.log(response);
                this.props.swal.success('Event Scheduler setting has been changed.');
                this.props.callApi(API.EVENT);
            })
    }
    /**
     * Action button to display/hide the event in email list
     */
    displayInEmail(cell: undefined, row: {[key: string]: any}): string | React.ReactElement<HTMLElement> {
        
        const response = this.props.rootState.server['auth_user'];
        const data: {[key: string]: any} = response.response.data;
        if(data && data.role_id === 1) {

            return (
            
                <label htmlFor={`event_display_change_${row.id}`}>
                    <Switch
                        onChange={() => {this.changeInDisplayEvent(row)} }
                        checked={row.allow_in_scheduled_email  === 'Y' ? true : false }
                        onColor="#277dc4"
                        id={`event_display_change_${row.id}`}
                    />
                    </label>
            )
        } else {

            return (row.allow_in_scheduled_email  === 'Y' ? 'Yes' : 'No');
        }
    }
    /**
     * Rending the action button [delete, edit] in the list row
     * @type {[type]}
     */
    actionButton (cell: undefined, row: {[key: string]: any} ): string | React.ReactElement<HTMLElement> {
      
        return (
          <div>
            <Button bsStyle="info" title="Send Email"  onClick={(e) => { 
                this.props.history.push('/send-email/individual/'+row.id);

             }}>
              <FAS name="envelope-square"  />
            </Button>
            <Button onClick={(e) => { 
                this.props.history.push('/event/'+row.id);

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

        this.props.swal.confirm('Are you sure you wnat to delete the event ?', () => {
            this.props.swal.wait('Deleting...');
            let endPoint = {...API.EVENT_ACTION};
            endPoint.method = 'DELETE';
            endPoint.url += '/'+row.id;
            this.props.callApi(endPoint)
                .then(() => {

                    this.props.swal.success('Event has been Deleted Successfully.');
                    this.props.callApi(API.EVENT);

                }).catch((resposne: ServerResponse) => {

                    this.props.swal.error(resposne.message? resposne.message : 'Server Error.' );
                }) 
        })
    }

    /**
     * Indentify the event like is upcoming or past and add classes accordingly.
     */
    indetifyPastUpcomingRow(rowData: any, rowIndex: number) : string {
        
        var is_start_date_past = moment(rowData.start_date).isBefore(moment(), 'day');
        var is_end_date_past = moment(rowData.end_date).isBefore(moment(), 'day');

        return is_start_date_past && is_end_date_past ? 'past_event_row' : 'upcoming_event_row';
    }
    render() {
        
        const defaultPaginationPos: PaginationPostion = 'bottom';
        const breadcrumbs = [
            {title: 'Event List', url: '/event'},   
        ];
        
        const auth = this.props.helper.deepFind(this.props.rootState,'server.auth_user.response.data');

        const defaultFilters = {
            customFilters: {
                year: moment().format('YYYY')
            },
            sortName: 'start_date',
            sortOrder: 'asc',
        };

        return (
            <Template {...this.props} RightSideButton={auth && auth.role_id ===1 ? <CreatBtn url="/event/create"/>: undefined} breadcrumb={breadcrumbs}>
                <SearchPanel {...this.props}/>  
                
                <Table {...this.props} 
                trClassName={this.indetifyPastUpcomingRow} 
                columns={this.getColumns()} 
                exportFileName="event.xlsx"
                ref={(table) => { this.table = table }}
                endPoint={API.EVENT} 
                defaultData={defaultFilters}
                paginationPosition={defaultPaginationPos} />            		

            </Template>
        )
    }
}

export default connect(mapStateToProps, mapDispatchToProps)(PUBEvent)