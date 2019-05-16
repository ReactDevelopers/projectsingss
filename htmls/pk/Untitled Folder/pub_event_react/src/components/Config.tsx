import * as React from 'react';
import {Props, mapDispatchToProps, mapStateToProps, ServerResponse} from '../features/root-props';
import Template from './layout/Template';
import  {connect } from 'react-redux';
import * as bs from 'react-bootstrap';
import ConfigForm, {ConfigFormProps, ConfigFromData} from './form/ConfigForm';
import {SubmissionError, FormErrors } from 'redux-form';
import API from '../aep';
import actions from 'redux-form/lib/actions';
import moment from 'moment';

class EditConfig extends React.Component <Props> {


    constructor(props:Props) {
       
        super(props);
        this.onSubmit = this.onSubmit.bind(this);
        
    }

    componentWillMount() {

        let endPoint = {...API.GET_CONFIG};
        
        this.props.callApi(endPoint)
            .then((res) => {

                this.props.dispatch(actions.initialize('config_form', res.data));
            })
            .catch(() => {

                this.props.swal.error('Server Error.', () => {
                    this.props.history.push('/dashboard');
                    this.props.swal.close();
                });
            })

    }
    shouldComponentUpdate(nextProps: Props, nextState: EditConfigState) {

        const nextEvent = nextProps.rootState.server['config'];
        const nextChange = nextEvent ? nextEvent.shouldUpdate : false;

        const event = this.props.rootState.server['config'];
        const change = event ? event.shouldUpdate : false;
        if(nextChange !== change){

            return true;
        }
        
        return false;
    }

    onSubmit(value: ConfigFromData, dispatch: any, props: ConfigFormProps) {
        
        const IsError = Object.keys(props.syncErrors).length;
        console.log('submitting...');
        let endPoint = {...API.CONFIG_ACTION};      

        if(!IsError) {
            
           return  this.props.callApi(endPoint, value)
            .then((response: ServerResponse) => {

               this.props.swal.success('Configuration has been changed successfully.', () => {
                   this.props.history.push('/');
                   this.props.swal.close();
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
            {title: 'Config', url: '/config'}
        ];

        const config = this.props.rootState.server['config'];
        const isFetching = config && config.isFetching ? config.isFetching : false;        

        return (
            <Template {...this.props} breadcrumb={breadcrumbs} >
                <div className="lineframe email-template-edit-form">
            		<div className="lineframe-inner">
                        <ConfigForm onSubmit={this.onSubmit} isFetching={isFetching}  />
            		</div>
                </div>
            </Template>
        )
    }
}

export default connect(mapStateToProps, mapDispatchToProps)(EditConfig)