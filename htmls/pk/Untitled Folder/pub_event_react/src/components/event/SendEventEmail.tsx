import * as React from 'react';
import {Props, mapDispatchToProps, mapStateToProps, ServerResponse} from '../../features/root-props';
import Template from '../layout/Template';
import  {connect } from 'react-redux';
import * as bs from 'react-bootstrap';
import SendEventEmailForm, {SendEmailFormData, SendEmailFormProps} from '../form/SendEmailForm';
import {SubmissionError, FormErrors } from 'redux-form';
import API from '../../aep';
import actions from 'redux-form/lib/actions';

class SendEventEmail extends React.Component <Props> {

    private id: string; // It may event id or group id.
    private type: string;
    constructor(props:Props) {
        super(props);
        this.onSubmit = this.onSubmit.bind(this);
        const params  = this.props.params();
        this.id = params[params.length-1];
        this.type = params[params.length-2];
    }

    componentWillMount() {
        
        this.props.dispatch(actions.destroy('send_email'));
        let endPoint = {...API.EMAIL_TEMPLATE_DETAIL};
        //endPoint.url += '/'+this.id;
        this.props.callApi(endPoint, {id: this.id, type: this.type})
        .then((res) => {

            this.props.dispatch(actions.initialize('send_email', res.data));
        })
            .catch(() => {

                this.props.swal.error('Event not found', () => {
                    this.props.history.push('/event');
                    this.props.swal.close();
                });
            })
    }

    onSubmit(value: SendEmailFormData, dispatch: any, props: SendEmailFormProps) {
        
        // this.props.dispatch(actions.initialize('send_email',{
        //     to: [{email:'SAIFUL_SAINI@PUB.GOV.SG'},{email:'NGAIM_HAI_GUAN@PUB.GOV.SG'}]
        // }));

        const IsError = Object.keys(props.syncErrors).length;
        console.log('submitting...');
        console.log(value)
        var data = {...value};

        if(!IsError) {
            
            if(data.to) {

                data.to = data.to.map((v: any) => { return typeof v === 'object' ? v.email : v;  });
            }
            if(data.cc) {

                data.cc = data.cc.map((v: any) => { return typeof v === 'object' ? v.email : v;  });
            }

           return  this.props.callApi(API.SEND_EMAIL_ACTION, data)
            .then((response: ServerResponse) => {

            //    console.log( 'response.data');
            //    console.log( response.data);
                this.props.swal.success('Mail has been sent.', () => {

                    this.props.swal.close();
                    this.props.history.push('/dashboard');
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
            {title: this.type === 'group' ?'Event Group List' : 'Event List', url: this.type === 'group' ? '/event_group' : '/event'},
            {title: 'Send Email', url: '/send-email/'+this.type+'/'+this.id}  
        ];

        return (
            <Template {...this.props} breadcrumb={breadcrumbs}>
                <div className="lineframe">
            		<div className="lineframe-inner">
                        <SendEventEmailForm onSubmit={this.onSubmit} />
            		</div>
                </div>      

            </Template>
        )
    }
}

export default connect(mapStateToProps, mapDispatchToProps)(SendEventEmail)