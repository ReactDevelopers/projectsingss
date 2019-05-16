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
import moment from 'moment';
const Parser = require('html-react-parser');

class EmailLog extends React.Component <Props> {
    
    table: null | TableArchitecture;

    constructor(props: Props) {
        super(props);   
        this.displayJsonInNextLine = this.displayJsonInNextLine.bind(this);
        this.displayFailureInRed = this.displayFailureInRed.bind(this);    
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
                columnTitle: 'Subject',
                dataField: 'subject',
                dataAlign:dataAlign,
                export: false,
                dataSort: true,              
                title: 'Subject',
                width: "160px"            
            },
            {
                columnTitle: 'To',
                dataField: 'recipient_to',
                dataAlign:dataAlign,
                export: false,
                dataSort: false, 
                dataFormat: this.displayJsonInNextLine,             
                title: 'To',
                width: "250px"            
            },
            {
                columnTitle: 'To',
                dataField: 'recipient_cc',
                dataAlign:dataAlign,
                dataFormat: this.displayJsonInNextLine, 
                export: false,
                dataSort: false,              
                title: 'CC',
                width: "250px"            
            },
            {
                columnTitle: 'Status',
                dataField: 'status',
                dataAlign:dataAlign,
                export: false,
                dataSort: false,              
                title: 'Status',
                width: "60px"            
            },
            {
                columnTitle: 'Created At',
                dataField: 'created_at',
                dataAlign:dataAlign,
                export: false,
                dataSort: true,              
                title: 'Created At',
                dataFormat: (date: string) => { return this.props.helper.displayDateTime(date); },
                width: "100px"            
            }
                     
                       
        ];       

        return columns;
    }
    
    shouldComponentUpdate(nextProps: Props) {

        const nextEvent = nextProps.rootState.server['email_log'];
        const nextChange = nextEvent ? nextEvent.shouldUpdate : false;
        const event = this.props.rootState.server['email_log'];
        const change = event ? event.shouldUpdate : false;
        if(nextChange !== change){

            return true;
        }
        return false;
    }
    /**
     * TO display the TO and CC Email in next line
     * @param cell 
     * @param row 
     * @param formatExtraData 
     * @param rowIndex 
     */
    displayJsonInNextLine(cell: any, row: any, formatExtraData: any, rowIndex: number): string | React.ReactElement<HTMLElement> {

        var emails = JSON.parse(cell);
        return emails.join(', ');
    }
    /**
     * To Display the fail case in red color.
     * @param rowData 
     * @param rowIndex 
     */
    displayFailureInRed(rowData: any, rowIndex: number) : string {

        return rowData.status == 'failure' ? 'row_in_red' : '';
    }
    
    render() {
        
        const defaultPaginationPos: PaginationPostion = 'bottom';
        const breadcrumbs = [
            {title: 'Email Log', url: '/email-log'},   
        ];

        const defaultFilters = {
            sortName: 'created_at',
            sortOrder: 'desc',
        };

        return (
            <Template {...this.props} breadcrumb={breadcrumbs}>
                
                <Table {...this.props} 
                columns={this.getColumns()} 
                endPoint={API.EMAIL_LOG} 
                trClassName={this.displayFailureInRed}
                defaultData={defaultFilters}
                paginationPosition={defaultPaginationPos} />            		

            </Template>
        )
    }
}

export default connect(mapStateToProps, mapDispatchToProps)(EmailLog)