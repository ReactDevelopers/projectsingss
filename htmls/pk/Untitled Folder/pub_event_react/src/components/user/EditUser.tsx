import * as React from 'react';
import {Props, mapDispatchToProps, mapStateToProps, ServerResponse} from '../../features/root-props';
import Template from '../layout/Template';
import  {connect } from 'react-redux';
import * as bs from 'react-bootstrap';
import UserForm, {UserFromData, UserFromProps} from '../form/UserForm';
import {SubmissionError, FormErrors } from 'redux-form';

import API from '../../aep';
import actions from 'redux-form/lib/actions';

class EditUser extends React.Component <Props> {

    private userId: string;

    constructor(props:Props) {
        super(props);
        this.onSubmit = this.onSubmit.bind(this);
        const params  = this.props.params();
        this.userId = params[params.length-1];
    }

    componentWillMount() {

        let endPoint = {...API.USER_DETAIL};
        endPoint.url += '/'+this.userId;
        this.props.callApi(endPoint)
            .then((res) => {

                this.props.dispatch(actions.initialize('user', res.data));
                console.log('reshhhhhhhhhhhhhhhhhhhhhhhhhhhhh');
                console.log(res);
            })
            .catch(() => {

                this.props.swal.error('User not found', () => {
                    this.props.history.push('/user');
                    this.props.swal.close();
                });
            })

    }
    shouldComponentUpdate(nextProps: Props) {

        const nextEvent = nextProps.rootState.server['user_detail'];
        const nextChange = nextEvent ? nextEvent.shouldUpdate : false;

        const event = this.props.rootState.server['user_detail'];
        const change = event ? event.shouldUpdate : false;
        if(nextChange !== change){

            return true;
        }
        return false;
    }

    onSubmit(value: UserFromData, dispatch: any, props: UserFromProps) {
        
        const IsError = Object.keys(props.syncErrors).length;
        console.log('submitting...');
        let endPoint = {...API.USER_ACTION};
        endPoint.method = 'PUT';
        endPoint.url += '/'+this.userId;

        const data = {
            recipient: value.recipient ? value.recipient : null,
            role_id: value.role_id ? value.role_id : null
        }
        
        if(!IsError) {
            
           return  this.props.callApi(endPoint, data)
            .then((response: ServerResponse) => {

               this.props.swal.success('User has been saved successfully.', () => {
                   this.props.history.push('/user');
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
            {title: 'User List', url: '/user'}, 
            {title: 'User Edit', url: '/user/'+this.userId},   
        ];
        const user_detail = this.props.rootState.server['user_detail'];
        const isFetching = user_detail && user_detail.isFetching ? user_detail.isFetching : false;
        
        return (
            <Template {...this.props} breadcrumb={breadcrumbs} >
                <div className="lineframe">
            		<div className="lineframe-inner">
                        <UserForm onSubmit={this.onSubmit} isFetching={isFetching}  />
            		</div>
                </div>      

            </Template>
        )
    }
}

export default connect(mapStateToProps, mapDispatchToProps)(EditUser)