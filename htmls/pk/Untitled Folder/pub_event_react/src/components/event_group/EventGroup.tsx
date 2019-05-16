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
import CreatBtn from '../layout/CreateBtn';

class EventGroup extends React.Component <Props> {
    
    constructor(props: Props) {
        super(props);

        this.actionButton = this.actionButton.bind(this);
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
              columnTitle: 'Group Title',
              dataField: 'title',
              dataAlign:dataAlign,
              dataSort: true,
              export: false,
              title: 'Name',            
            },
            {
                columnTitle: 'Action',
                dataField: '',
                dataAlign: dataAlign,
                dataFormat: this.actionButton,
                export: false,
                title: 'Action',             
              }
        ];
    }
    
    shouldComponentUpdate(nextProps: Props) {

        const nextEvent = nextProps.rootState.server['event_groups'];
        const nextChange = nextEvent ? nextEvent.shouldUpdate : false;
        const event = this.props.rootState.server['event_groups'];
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
            <Button bsStyle="info" title="Send Email"  onClick={(e) => { 
                this.props.history.push('/send-email/group/'+row.id);

             }}>
              <FAS name="envelope-square"  />
            </Button>
            <Button onClick={(e) => { 
                this.props.history.push('/event_group/'+row.id);

             }} bsStyle="info" title="Edit Event Group" >
              <FAS name="pencil" />
            </Button>
            <Button bsStyle="warning" title="Delete Event Group" onClick={(e) => { this.deleteConfirm(e, row); }} >
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

        this.props.swal.confirm('Are you sure you wnat to delete the Group ?', () => {
            this.props.swal.wait('Deleting...');
            let endPoint = {...API.EVENT_GROUP_ACTION};
            endPoint.method = 'DELETE';
            endPoint.url += '/'+row.id;
            this.props.callApi(endPoint)
                .then(() => {

                    this.props.swal.success('Group has been Deleted Successfully.');
                    this.props.callApi(API.EVENT_GROUP);

                }).catch((resposne: ServerResponse) => {

                    this.props.swal.error(resposne.message? resposne.message : 'Server Error.' );
                }) 
        })
    }

    render() {
        
        const defaultPaginationPos: PaginationPostion = 'bottom';
        const breadcrumbs = [
            {title: 'Event Group List', url: '/event_group'}  
        ];

        const defaultData = {
            sortName: 'title',
            sortOrder: 'asc'
        }
        return (
            <Template {...this.props} 
                RightSideButton={<CreatBtn url="/event_group/create"/>} 
                breadcrumb={breadcrumbs}>
                <div className="lineframe">
            		<div className="lineframe-inner">
                        <Table {...this.props} 
                        columns={this.getColumns()} 
                        endPoint={API.EVENT_GROUP} 
                        defaultData={defaultData}
                        paginationPosition={defaultPaginationPos} 
                        />
            		</div>
                </div>

            </Template>
        )
    }
}

export default connect(mapStateToProps, mapDispatchToProps)(EventGroup)