import * as React from 'react';
import {Props, mapDispatchToProps, mapStateToProps, ServerResponse} from '../../features/root-props';
import Template from '../layout/Template';
import  {connect } from 'react-redux';
import * as bs from 'react-bootstrap';
import GroupEmailForm, {GroupEmailFormProps, GroupEmailFromData} from '../form/GroupEmailForm';
import {SubmissionError, FormErrors } from 'redux-form';
import API from '../../aep';
import actions from 'redux-form/lib/actions';

class EditGroupEmail extends React.Component <Props> {
    
    private groupEmailId: string;

    constructor(props:Props) {
        super(props);
        this.onSubmit = this.onSubmit.bind(this);
        const params  = this.props.params();
        this.groupEmailId = params[params.length-1];
    }

    componentWillMount() {

        let endPoint = {...API.GROUP_EMAIL_DETAIL};
        endPoint.url += '/'+this.groupEmailId;

        this.props.callApi(endPoint)
            .then((res) => {

                this.props.dispatch(actions.initialize('group_email', res.data));
            })
            .catch(() => {

                this.props.swal.error('Group Email not found', () => {
                    this.props.history.push('/group-email');
                    this.props.swal.close();
                });
            })
    }
    
    /**
     * Send the form data to server.
     * @param value 
     * @param dispatch 
     * @param props 
     */
    onSubmit(value: GroupEmailFromData, dispatch: any, props: GroupEmailFormProps) {
        
        const IsError = Object.keys(props.syncErrors).length;
        
        var data =  {
            title: value.title,
            email: value.email,
            recipient: value.recipient
        };
        //console.log(data);
        if(!IsError) {
            
            let endPoint = {...API.GROUP_EMAIL_ACTION};
            endPoint.url += '/'+this.groupEmailId;
            endPoint.method = 'PUT';
            
            return  this.props.callApi(endPoint, data)
            .then((response: ServerResponse) => {

                this.props.swal.success('Group Email has been updated successfully.', () => {
                    this.props.swal.close();
                    this.props.history.push('/group-email');
                })

            }).catch((response: ServerResponse) => {

                throw new SubmissionError({...response.errors, _error: response.message ? response.message : '' });
            })

        }else {

            throw new SubmissionError({...props.syncErrors, _error: 'Invalid data'});
        }
    }

    render() {
        const breadcrumbs = [
            {title: 'Group Email List', url: '/group-email'},
            {title: 'Create Group Email', url: '/group-email/'+ this.groupEmailId}    
        ];
        
       let isFetching =  this.props.helper.deepFind(this.props.rootState.server,'group_email_detail.isFetching');
       isFetching  = isFetching !== undefined ? isFetching :  false;

        return (
            <Template {...this.props} breadcrumb={breadcrumbs} >
                <div className="lineframe">
            		<div className="lineframe-inner">
                        <GroupEmailForm onSubmit={this.onSubmit} isFetching={isFetching} />
            		</div>
                </div>      

            </Template>
        )
    }
}

export default connect(mapStateToProps, mapDispatchToProps)(EditGroupEmail)