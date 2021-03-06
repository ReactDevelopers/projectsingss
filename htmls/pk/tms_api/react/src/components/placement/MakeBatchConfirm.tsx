import * as React from 'react';
import { ListRequest,  ServerResponse,Props } from "../../features/root-props";
import {actions as RootAction} from '../../features/root-action';
import {TableProps} from '../../plugins/Table'
import * as bs from 'react-bootstrap';
import API from '../../aep';

export interface MakeBatchConfirmProps  {
    requestData: ListRequest;
    rootProps: TableProps;
}

 /**
* Prepare the Conflict Message
* @param res 
*/
export function prepareConflictMessage(res: ServerResponse<any, {[key:string]: Array<{[key:string]: any}> }>, props: Props ) {
   
   const {helper } = props;

   var msg = '';
   const conflict_p_id = Object.keys( res.errors);
  
   if( res.error_code  === 'CSO') {

       msg = '<ul class="conflict_errors">';        

       conflict_p_id.map((course_run_id) => { 
          msg += '<li><span> Course Run class full or deleted ( Course Run id: <b>'+ course_run_id + '</b>) </span>';
           
           msg += '<ul>';
           res.errors[course_run_id].map((err) =>  {
               msg += '<li>'+err+'</li>';
           })   
           msg += '</ul>';        
       })

       msg += '</ul>';

   }
   else {
    
     msg = '<ul class="conflict_errors">';
     conflict_p_id.map((v) => {
         
         const {
             course_code, 
             course_run_id, 
             end_date, 
             placement_id, 
             start_date, 
             assessment_end_date,
             participants,
             personnel_number,
             assessment_start_date} = res.errors[v][0];
             
         msg += '<li><span>Conflict in ( ';
         msg += '  Participants <b>'+ participants.name + '(<i>'+personnel_number+'</i>)</b>';
         msg += ' , course_code <b>'+ course_code + '</b>';
         msg += ' , course run ID <b>'+ course_run_id + '</b>';
         msg += ' , Start Date <b>'+ helper.displayDate(start_date) + '</b>';
         msg += ' , End Date <b>'+ helper.displayDate(end_date) + '</b>';
         msg += ' , Test Start Date <b>'+ helper.displayDate(assessment_start_date) + '</b>';
         msg += ' , Test End Date <b>'+ helper.displayDate(assessment_end_date) + '</b>';         
         msg += ') due to the following placement(s): </span>'
         msg += '<ul>';

         res.errors[v].map((error) => {

             msg += '<li>';
             msg += '   course_code '+ error.conflict_in_course_code;
             msg += ' , course run ID '+ error.conflict_in_course_run_id;
             msg += ' , Start Date '+ helper.displayDate(error.conflic_in_start_date);
             msg += ' , End Date '+ helper.displayDate(error.conflic_in_end_date);
             msg += ' , Test Start Date '+ helper.displayDate(error.conflic_in_assessment_start_date);
             msg += ' , Test End Date '+ helper.displayDate(error.conflic_in_assessment_end_date);
             if(error.type !== 'my') {
                 msg += '<b><i> This is subordinate\'s placement, Subordinate Officer is '+error.subordinates.name+' ('+error.subordinates.personnel_number+')</i></b>';
             }
         })

         msg += '</ul></li>';         
     })

     msg += '</ul>';
   }

   console.log('MSSSSSSSSSSSSSSSSSSSSSSSSSSS');
   console.log(msg);

   return msg;
}

export default class MakeBatchConfirm extends React.Component<MakeBatchConfirmProps> {
    
    private CourseRunId: string;
    private whereFrom: any;

    constructor(props: MakeBatchConfirmProps) {

        super(props);
        const params  = this.props.rootProps.params();
        this.CourseRunId =  params[params.length-1];
        this.whereFrom =  params[params.length-2];
    }
    /**
     * Action for change Status.
     */
    changeStatus() {

        const {requestData: {selected }, rootProps: {helper, callApi, swal, endPoint, dispatch} } = this.props;

        let statusEndPoint = { ... API.PLACEMENT_ACTION};
        statusEndPoint.method = 'PUT';
        statusEndPoint.url += '/make-status-confirmed';
        swal.close(); 
        swal.wait('Updating Status...'); 
        callApi(statusEndPoint, {placement_id: selected})
            .then((res: ServerResponse)=> {

                dispatch(RootAction.fetch.storeSelectRows(endPoint, []));
                
                if(res.data.length ) {
                    
                    swal.success('Placement status has been changed as confirmed.');
                    callApi(endPoint);
                }
                else {
                    swal.error('All selected placement\'s status are already Confirmed.');
                }

                
            })
    }
    /**
     * Take confirmation if get Conflict
     * @param conflictMessage 
     */
    getConflict(conflictMessage: string, isEmailPreview: boolean, error_code?: string) {
        
        const { rootProps: {helper, swal} } = this.props;
        
        window.scroll({top: 0});

        if(error_code === 'CSO') {

          swal.error(conflictMessage);
        }
        else {

          swal.confirm('System got the conflict in the following record(s).'+conflictMessage, () => {
              
              isEmailPreview ? this.redirectToEmailPreview() : this.changeStatus();

          },{
              confirmBtnText :'Skip Conflict & Update Rest',
              cancelBtnText: 'Cancel',
              customClass: 'conflict-sweet-alert'
          })
        }
    }

    /**
     * Redirect to User on Email Preview Page
     */
    redirectToEmailPreview() {

        const {requestData: {selected }, rootProps: {helper, swal, history,dispatch, endPoint} } = this.props;

        dispatch(RootAction.fetch.storeSelectRows(endPoint, []));

        swal.close();
        var queryStrObject:{[key: string]: any} = {fromPage:'CourseRunDetail'};
        queryStrObject.placement_id = selected.join(',');
        queryStrObject.courseRunId = this.CourseRunId;
        if(this.whereFrom === 'maintain-course-run') {
          queryStrObject.whereFrom = 'maintain-list';
        }
        const queryStr = helper.queryString(queryStrObject);
        history.push('/placement/batch/change-status/confirmed?'+ queryStr);
    }

    /**
     * Before change the Status
     */
    confirmChangeStatus(isEmailPreview: boolean) {
        
        const {requestData: {selected }, rootProps: {helper, swal, history,dispatch, endPoint} } = this.props;

        if(selected.length ===0) {

            swal.error('Please select at least one placement.');
            return;
        }

        swal.confirm('Are you sure to change the status of selected placement?', () => {
            //swal.success('Status has been Changed.');
            swal.wait('Wait Checking Conflicts');

            this.props.rootProps.callApi(API.PLACEMENT_CONFLICT, {placement_id: selected})
            .then((res: ServerResponse) => {
                
                if(isEmailPreview) {

                    this.redirectToEmailPreview();

                } else {

                    this.changeStatus();
                }

            })
            .catch((res: ServerResponse<any, {[key:string]: Array<{[key:string]: string}> }>) => {
                
                swal.close(); 
                var msg = prepareConflictMessage(res, this.props.rootProps);
                const conflict_p_id = Object.keys( res.errors);

                if(selected.length === conflict_p_id.length){
                    // Got Conflict in All Placement
                    window.scroll({top: 0});
                    swal.error(msg, undefined, {
                        customClass: 'conflict-sweet-alert'
                    });
                }
                else {
                                        
                   this.getConflict(msg, isEmailPreview, res.error_code);
                }
                
            })
        })
    }

    
    render() {

        const {requestData} = this.props;

        return (
            <>
                <bs.Button className="btn btn-primary export-btn" 
                    onClick={() => {this.confirmChangeStatus(false)}}>
                    Confirmed
                </bs.Button>
                <bs.Button className="btn btn-primary export-btn" 
                    onClick={() => {this.confirmChangeStatus(true)}}>
                    Confirmed & Email
                </bs.Button>
            </>
        );
    }
}