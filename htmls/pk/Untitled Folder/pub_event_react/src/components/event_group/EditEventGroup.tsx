import * as React from 'react';
import {Props, mapDispatchToProps, mapStateToProps, ServerResponse} from '../../features/root-props';
import Template from '../layout/Template';
import  {connect } from 'react-redux';
import * as bs from 'react-bootstrap';
import EventGroupForm, {EventGroupFromData, EventGroupFormProps} from '../form/EventGroupForm';
import {SubmissionError, FormErrors } from 'redux-form';
import API from '../../aep';
import actions from 'redux-form/lib/actions';
import { Brand } from 'react-bootstrap/lib/Navbar';

class EditEventGroup extends React.Component <Props> {
    
    private eventGroupId: string;

    constructor(props:Props) {
        super(props);
        this.onSubmit = this.onSubmit.bind(this);
        const params  = this.props.params();
        this.eventGroupId = params[params.length-1];
    }
    componentWillMount() {

        let endPoint = {...API.EVENT_GROUP_DETAIL};
        endPoint.url += '/'+this.eventGroupId;
        this.props.callApi(endPoint)
            .then((res) => {

                this.props.dispatch(actions.initialize('event_group', res.data));
            })
            .catch(() => {

                this.props.swal.error('Event Group not found', () => {
                    this.props.history.push('/event_group');
                    this.props.swal.close();
                });
            })
    }
    shouldComponentUpdate(nextProps: Props) {

        const nextEvent = nextProps.rootState.server['event_group_detail'];
        const nextChange = nextEvent ? nextEvent.shouldUpdate : false;

        const event = this.props.rootState.server['event_group_detail'];
        const change = event ? event.shouldUpdate : false;
        if(nextChange !== change){

            return true;
        }
        return false;
    }

    onSubmit(value: EventGroupFromData, dispatch: any, props: EventGroupFormProps) {
        
        const IsError = Object.keys(props.syncErrors).length;
        console.log('submitting...');

        if(!IsError) {
            let endPoint = {...API.EVENT_GROUP_ACTION};
            endPoint.method = 'PUT';
            endPoint.url += '/'+this.eventGroupId;

           return  this.props.callApi(endPoint, value)
            .then((response: ServerResponse) => {

               
               this.props.swal.success('Event Group has been update successfully.', () => {

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
            {title: 'Edit Group', url: '/event_group/'+this.eventGroupId}  
        ];

        const event_group_detail = this.props.rootState.server['event_group_detail'];
        const isFetching = event_group_detail && event_group_detail.isFetching ? event_group_detail.isFetching : false;

        return (
            <Template {...this.props} breadcrumb={breadcrumbs}>
                <div className="lineframe">
            		<div className="lineframe-inner">
                        <EventGroupForm onSubmit={this.onSubmit} isFetching={isFetching}  />
            		</div>
                </div>      
            </Template>
        )
    }
}

export default connect(mapStateToProps, mapDispatchToProps)(EditEventGroup)