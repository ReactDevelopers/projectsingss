import * as React from 'react';
import {Props, mapDispatchToProps, mapStateToProps, ServerResponse} from '../../features/root-props';
import Template from '../layout/Template';
import  {connect } from 'react-redux';
import * as bs from 'react-bootstrap';
import EventGroupForm, {EventGroupFromData, EventGroupFormProps} from '../form/EventGroupForm';
import {SubmissionError, FormErrors } from 'redux-form';
import API from '../../aep';

class CreateEventGroup extends React.Component <Props> {

    constructor(props:Props) {
        super(props);
        this.onSubmit = this.onSubmit.bind(this);
    }

    onSubmit(value: EventGroupFromData, dispatch: any, props: EventGroupFormProps) {
        
        const IsError = Object.keys(props.syncErrors).length;
        console.log('submitting...');

        if(!IsError) {

           return  this.props.callApi(API.EVENT_GROUP_ACTION, value)
            .then((response: ServerResponse) => {

                this.props.swal.success('Event Group has been created successfully.', () => {

                    this.props.swal.close();
                    this.props.history.push('/event_group');
               });

            }).catch((response: ServerResponse) => {

                throw new SubmissionError({...response.errors, _error: response.message ? response.message : '' });
            })

        }else {

            throw new SubmissionError({...props.syncErrors, _error: 'Invalid data'});
        }
    }
    render() {
        const breadcrumbs = [
            {title: 'Event Group List', url: '/event_group'},
            {title: 'Create New  Group', url: '/event_group/create'}  
        ];

        return (
            <Template {...this.props} breadcrumb={breadcrumbs}>
                <div className="lineframe">
            		<div className="lineframe-inner">
                        <EventGroupForm onSubmit={this.onSubmit} />
            		</div>
                </div>      

            </Template>
        )
    }
}

export default connect(mapStateToProps, mapDispatchToProps)(CreateEventGroup)