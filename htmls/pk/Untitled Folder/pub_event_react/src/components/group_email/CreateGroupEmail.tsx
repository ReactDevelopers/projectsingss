import * as React from 'react';
import {Props, mapDispatchToProps, mapStateToProps, ServerResponse} from '../../features/root-props';
import Template from '../layout/Template';
import  {connect } from 'react-redux';
import * as bs from 'react-bootstrap';
import GroupEmailForm, {GroupEmailFormProps, GroupEmailFromData} from '../form/GroupEmailForm';
import {SubmissionError, FormErrors } from 'redux-form';
import API from '../../aep';

class CreateGroupEmail extends React.Component <Props> {

    constructor(props:Props) {
        super(props);
        this.onSubmit = this.onSubmit.bind(this);
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
        
        if(!IsError) {
           
           
            return  this.props.callApi(API.GROUP_EMAIL_ACTION, data)
            .then((response: ServerResponse) => {

                this.props.swal.success('Group Email has been created successfully.', () => {
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
            {title: 'Create Group Email', url: '/group-email/create'}    
        ];

        return (
            <Template {...this.props} breadcrumb={breadcrumbs} >
                <div className="lineframe">
            		<div className="lineframe-inner">
                        <GroupEmailForm onSubmit={this.onSubmit}/>
            		</div>
                </div>      

            </Template>
        )
    }
}

export default connect(mapStateToProps, mapDispatchToProps)(CreateGroupEmail)