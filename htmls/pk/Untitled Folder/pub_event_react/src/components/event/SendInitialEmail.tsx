import * as React from 'react';
import {Props, mapDispatchToProps, mapStateToProps, ServerResponse} from '../../features/root-props';
import Template from '../layout/Template';
import  {connect } from 'react-redux';
import * as bs from 'react-bootstrap';
import SendEventEmailForm, {SendEmailFormData, SendEmailFormProps} from '../form/SendEmailForm';
import {SubmissionError, FormErrors } from 'redux-form';
import API from '../../aep';
import actions from 'redux-form/lib/actions';
var Parser = require('html-react-parser');

interface SendInitialEmailState {
    shouldUpdate: boolean;
    preview: boolean;
}

class SendInitialEmail extends React.Component <Props, SendInitialEmailState> {

    private id: string; // It may event id or group id.
    private type: string;

    constructor(props:Props) {
        super(props);
        this.onSubmit = this.onSubmit.bind(this);
        this.id = "";
        this.type = 'year';
        this.state = {
            shouldUpdate: false,
            preview: false
        }
        this.togglePreview  = this.togglePreview.bind(this);
        this.previewBtnTitle  = this.previewBtnTitle.bind(this);
    }

    shouldComponentUpdate(nextProps: Props, nextState: SendInitialEmailState) {

        const nextEvent = nextProps.rootState.server['email_template_detail'];
        const nextChange = nextEvent ? nextEvent.shouldUpdate : false;

        const event = this.props.rootState.server['email_template_detail'];
        const change = event ? event.shouldUpdate : false;
        if(nextChange !== change){

            return true;
        }
        if(this.state.shouldUpdate !== nextState.shouldUpdate) {

            return true;
        }

        return false;
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
                this.props.history.push('/dashboard');
                this.props.swal.close();
            });
        })
    }

    /**
     * Send Email
     */
    onSubmit(value: SendEmailFormData, dispatch: any, props: SendEmailFormProps) {
             
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

                //throw new SubmissionError({...response.errors, _error: response.message ? response.message : '' });
            })

        }else {

            throw new SubmissionError({...props.syncErrors, _error: 'Invalid data'});
        }
    }

    /**
     * Preview Button Title
     */
    previewBtnTitle() {

        return this.state.preview? 'Back to Edit': 'Preview';
    }

    /**
     * Change layout  - preview/Edit mode
     */
    togglePreview() {
        console.log('sdsffdewfwefwe');
        this.setState({
            shouldUpdate: !this.state.shouldUpdate,
            preview: !this.state.preview
        });
    }
    render() {

        const breadcrumbs = [
            {title: 'Send Email', url: '/send-email/'+this.type+'/'+this.id}  
        ];

        const template: {[key: string]: any} = this.props.helper.deepFind(this.props.rootState.server,'email_template_detail.response.data');

        let isFetching =  this.props.helper.deepFind(this.props.rootState.server,'email_template_detail.isFetching');
        isFetching  = isFetching !== undefined ? isFetching :  false;

        return (
            <Template {...this.props} breadcrumb={breadcrumbs}>
                <div className="lineframe">
            		<div className="lineframe-inner">
                    <button className="btn btn-primary mg-top-btn pull-right" onClick={this.togglePreview}>{this.previewBtnTitle()}</button>
                    <div className="clearfix"></div>
                        {this.state.preview ? <div className="email_template_preview">
                            <table className="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>TO </td>
                                    <td>{template && template.to.map(v => v.email).join(', ')}</td>
                                </tr>
                                <tr>
                                    <td>CC </td>
                                    <td>{template && template.cc.map(v => v.email).join(', ')}</td>
                                </tr>
                                <tr>
                                    <td>Subject </td>
                                    <td>{template && template.subject}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>{template && Parser(template.body)}</td>    
                                </tr>
                            </tbody>
                            </table>                           
                        
                        </div> :

                            <SendEventEmailForm onSubmit={this.onSubmit} isFetching={isFetching} />
                        }
            		</div>
                </div>      

            </Template>
        )
    }
}

export default connect(mapStateToProps, mapDispatchToProps)(SendInitialEmail)