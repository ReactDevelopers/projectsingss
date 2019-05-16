import * as React from 'react';
import {Props, mapDispatchToProps, mapStateToProps, ServerResponse} from '../../features/root-props';
import Template from '../layout/Template';
import  {connect } from 'react-redux';
import * as bs from 'react-bootstrap';
import EventForm, {EventFormData, EventFormProps} from '../form/EventForm';
import {SubmissionError, FormErrors } from 'redux-form';
import API from '../../aep';
import actions from 'redux-form/lib/actions';

class EditEvent extends React.Component <Props> {

    private eventId: string;

    constructor(props:Props) {
        super(props);
        this.onSubmit = this.onSubmit.bind(this);
        //const pathName = this.props.rootState.router.location ? this.props.rootState.router.location.pathname : '';
        const params  = this.props.params();
        this.eventId = params[params.length-1];
    }

    componentWillMount() {

        //this.props.
        let endPoint = {...API.EVENT_DETAIL};
        endPoint.url += '/'+this.eventId;
        this.props.callApi(endPoint)
        .then((res) => {
            
            res.data.group_id = res.data.group_id ?  {
                id: res.data.group_id,
                title: res.data.group_name
            } : null;
            this.props.dispatch(actions.initialize('event', res.data));
        })
            .catch(() => {

                this.props.swal.error('Event not found', () => {
                    this.props.history.push('/event');
                    this.props.swal.close();
                });
            })
    }

    shouldComponentUpdate(nextProps: Props) {

        const nextEvent = nextProps.rootState.server['event_detail'];
        const nextChange = nextEvent ? nextEvent.shouldUpdate : false;

        const event = this.props.rootState.server['event_detail'];
        const change = event ? event.shouldUpdate : false;
        if(nextChange !== change){

            return true;
        }
        return false;
    }

    onSubmit(value: EventFormData, dispatch: any, props: EventFormProps) {
        
        const IsError = Object.keys(props.syncErrors).length;
        console.log('submitting...');
        let endPoint = {...API.EVENT_ACTION};
        endPoint.method = 'PUT';
        endPoint.url += '/'+this.eventId;

        console.log(value);
        var data = {...value};
        //console.log(data);

        if(!IsError) {
            
            data.group_id = typeof data.group_id === 'object' ? (data.group_id ? data.group_id.id :null) : (data.group_id ? data.group_id : null);

           return  this.props.callApi(endPoint, data)
            .then((response: ServerResponse) => {

               this.props.swal.success('Event has been saved successfully.', () => {
                   this.props.history.push('/event');
                   this.props.swal.close();
               });

            }).catch((response: ServerResponse) => {

                throw new SubmissionError({...response.errors, _error: response.message ? response.message : '' });
            })

        }else {

            throw new SubmissionError({...props.syncErrors, _error: 'Invalid data'});
        }
    }
    componentWillUnmount() {
        
    }
    render() {
        const breadcrumbs = [
            {title: 'Event List', url: '/event'},
            {title: 'Edit Event', url: `/event/${this.eventId}`}
        ];

        const event = this.props.rootState.server['event_detail'];
        const isFetching = event && event.isFetching ? event.isFetching : false;

        return (
            <Template {...this.props} breadcrumb={breadcrumbs} >
                <div className="lineframe">
            		<div className="lineframe-inner">
                        <EventForm onSubmit={this.onSubmit} isFetching={isFetching} />
            		</div>
                </div>
            </Template>
        )
    }
}

export default connect(mapStateToProps, mapDispatchToProps)(EditEvent)