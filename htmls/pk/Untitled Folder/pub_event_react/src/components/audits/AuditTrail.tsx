import * as React from 'react';
import {Props, mapDispatchToProps, mapStateToProps, ServerResponse} from '../../features/root-props';
import Template from '../layout/Template';
import Table , {TableColumnProps} from '../../plugins/Table';
import  {connect } from 'react-redux';
import * as bs from 'react-bootstrap';

import API from '../../aep';
import { DataAlignType, PaginationPostion } from 'react-bootstrap-table';
import { Button } from 'react-bootstrap';
const titleize = require('titleize');
//let Parser = require('html-react-parser');

class AuditTrails extends React.Component <Props> {
    
    constructor(props: Props) {
        super(props);

        this.displayRowinRed  = this.displayRowinRed.bind(this);
        this.displayChangeValues = this.displayChangeValues.bind(this);
    }
     /**
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
              columnTitle: 'User Name',
              dataField: 'user_name',
              dataAlign:dataAlign,
              export: false,
              title: 'User Name',  
              width:'100px'         
            },
            // {
            //     columnTitle: 'Event',
            //     dataField: 'event',
            //     dataAlign:dataAlign,
            //     export: false,
            //     title: 'event',
            //     width:'60px'
            // },
            {
                columnTitle: 'Change Log',
                dataField: 'old_values',
                dataAlign: 'left',
                dataFormat: this.displayChangeValues,
                export: false,
                title: 'Change Log',
                width:'360px'
            },
            // {
            //     columnTitle: 'New Value',
            //     dataField: 'new_values',
            //     dataFormat: this.displayChangeValues,
            //     dataAlign: 'left',
            //     export: false,
            //     title: 'New Value',
            //     width:'160xp'
            // },
            {
                columnTitle: 'IP',
                dataField: 'ip_address',
                dataAlign:dataAlign,
                export: false,
                title: 'IP',
                width:'80px'
            },
            // {
            //     columnTitle: 'User Agent',
            //     dataField: 'user_agent',
            //     dataAlign:dataAlign,
            //     export: false,
            //     title: 'User Agent',
            //     width:'px'
            // },
            {
                columnTitle: 'Action at',
                dataField: 'created_at',
                dataFormat: (date: string) => { return this.props.helper.displayDateTime(date); },
                dataAlign:dataAlign,
                export: false,
                dataSort: true,
                title: 'Action at',
                width:'130px'
            }             
        ];
    }
    
    shouldComponentUpdate(nextProps: Props) {

        const nextAuditAll = nextProps.rootState.server['audit_all'];
        const nextChange = nextAuditAll ? nextAuditAll.shouldUpdate : false;
        const auditAll = this.props.rootState.server['audit_all'];
        const change = auditAll ? auditAll.shouldUpdate : false;
        if(nextChange !== change){

            return true;
        }
        return false;
    }

    /**
     * TO Display the new and old values.
     * @param data TO 
     */
    displayChangeValues(data: {[key: string]: any}, row: {[key: string]: any}) {
        
        
        const newValues = row.new_values;
        const oldValues = row.old_values;
        const mapValue = row.event ==='deleted' ? oldValues : newValues;
        const Keys = Object.keys(mapValue);

        var changeLog: Array<string> = [];

        var heading: string  = row.user_name + ' has been ' + row.event + ' ' + this.findSectionName(row.auditable_type);


        Keys.map( (field_name: string) => {                    
            if(!field_name.endsWith('_id') && field_name !== 'recipient'){
                changeLog.push( titleize(field_name) +' : ' + (mapValue[field_name] ? this.printValue(mapValue[field_name]) : 'N/A'));
            }
        })

        return (
            <div>
                <h5><strong>{heading}</strong></h5>
                {changeLog.join(' | ')}
            </div>
        );
    }


    /**
     * 
     * Making the readable section name by the auditable_type
     * @param auditable_type 
     */
    findSectionName(auditable_type: string) : string {

        if(auditable_type === 'App\\User') {

            return 'Officer';
        }
        else if(auditable_type === 'App\\Models\\Event') {

            return 'Event';
        }
        else if(auditable_type === 'App\\Models\\EmailTemplate') {

            return 'Email Template';
        }
        else if(auditable_type === 'App\\Models\\EventGroup') {

            return 'Event Group';
        }
        else if(auditable_type === 'App\\Models\\Group') {

            return 'Email Group';
        }
        else if(auditable_type === 'App\\Models\\EmailGroup') {

            return 'Email Group';
        }
        else {

            return auditable_type;
        }
    }
    /**
     * Print the change value
     * @param value 
     */
    printValue(value: string) {

        var dateRegx = /[0-9]{4}\-(0?1|0?2|0?3|0?4|0?5|0?6|0?7|0?8|0?9|10|11|12)\-(([0-2]{1})?[0-9]{1}|30|31)$/;
        var dateTimeRegex = /[0-9]{4}\-(0?1|0?2|0?3|0?4|0?5|0?6|0?7|0?8|0?9|10|11|12)\-(([0-2]{1})?[0-9]{1}|30|31)\s([0-1]{1}[0-9]{1}|00|20|21|22|23)\:([0-4]{1}[0-9]{1}|00|50|51|52|53|54|55|56|57|58|59)\:([0-4]{1}[0-9]{1}|00|50|51|52|53|54|55|56|57|58|59)$/;
        if(dateRegx.test(value)) {

            return this.props.helper.displayDate(value);
        }
        else if(dateTimeRegex.test(value)) {

            return this.props.helper.displayDateTime(value);
        }
        else {

            return value;
        }
    }
    
  
    /**
     * Display the Table row color in Red to highlight the deleted properties.
     */
    displayRowinRed(rowData: any, rowIndex: number) : string {
        
        return rowData.event == 'deleted' ? 'row_in_red' : '';
    }

    render() {
        
        const defaultPaginationPos: PaginationPostion = 'bottom';
        const breadcrumbs = [
            {title: 'Audit List', url: '/audit-trail'},   
        ];

        const defaultData = {
            sortName: 'created_at',
            sortOrder: 'desc'
        }
        // Getting Auth User Detail
        const response = this.props.rootState.server['auth_user'];
        const data: {[key: string]: any} = response.response.data;

        return (
            <Template {...this.props} breadcrumb={breadcrumbs}>
                        
                <Table {...this.props} 
                    trClassName={this.displayRowinRed}
                    columns={this.getColumns()} 
                    endPoint={API.AUTID_TRAIL_ALL} 
                    defaultData={defaultData}
                    paginationPosition={defaultPaginationPos} />            		

            </Template>
        )
    }
}


export default connect(mapStateToProps, mapDispatchToProps)(AuditTrails)