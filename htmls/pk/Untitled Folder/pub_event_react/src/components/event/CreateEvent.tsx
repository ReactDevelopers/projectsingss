import * as React from 'react';
import {Props, mapDispatchToProps, mapStateToProps, ServerResponse} from '../../features/root-props';
import Template from '../layout/Template';
import  {connect } from 'react-redux';
import * as bs from 'react-bootstrap';
import EventForm, {EventFormData, EventFormProps} from '../form/EventForm';
import {SubmissionError, FormErrors } from 'redux-form';
import API from '../../aep';

class CreateEvent extends React.Component <Props> {

    constructor(props:Props) {
        super(props);
        this.onSubmit = this.onSubmit.bind(this);
    }

    onSubmit(value: EventFormData, dispatch: any, props: EventFormProps) {
        
        const IsError = Object.keys(props.syncErrors).length;
        console.log('submitting...');
        var data =  {...value};
        //console.log(data); 
        if(!IsError) {
           
            data.group_id = typeof data.group_id === 'object' ? (data.group_id.id ? data.group_id.id :null) : (data.group_id ? data.group_id : null);
           
            return  this.props.callApi(API.EVENT_ACTION, data)
            .then((response: ServerResponse) => {

            //    console.log( 'response.data');
            //    console.log( response.data);
                this.props.swal.success('Event has been created successfully.', () => {
                    this.props.swal.close();
                    this.props.history.push('/event');
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
            {title: 'Event List', url: '/event'},
            {title: 'Create Event', url: '/event/create'}    
        ];

        return (
            <Template {...this.props} breadcrumb={breadcrumbs} >
                <div className="lineframe">
            		<div className="lineframe-inner">
                        <EventForm onSubmit={this.onSubmit}/>
            		</div>
                </div>      

            </Template>
        )
    }
}

export default connect(mapStateToProps, mapDispatchToProps)(CreateEvent)