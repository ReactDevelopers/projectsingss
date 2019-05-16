import * as React from 'react';
import {Props, mapDispatchToProps, mapStateToProps, ServerResponse} from '../../features/root-props';
import Template from '../layout/Template';
import  {connect } from 'react-redux';
import * as bs from 'react-bootstrap';
import EmailTemplateForm, {EmailTemplateFormData, EmailTemplateProps} from '../form/EmailTemplateForm';
import {SubmissionError, FormErrors } from 'redux-form';
import API from '../../aep';
import actions from 'redux-form/lib/actions';
import moment from 'moment';

var Parser = require('html-react-parser');

interface EditEmailTemplateState {
    shouldUpdate: boolean;
    preview: boolean;
}
class EditEmailTemplate extends React.Component <Props, EditEmailTemplateState> {

    private emailTemplateType: string;

    constructor(props:Props) {
       
        super(props);
        this.onSubmit = this.onSubmit.bind(this);
        const params  = this.props.params();
        this.togglePreview = this.togglePreview.bind(this);
        this.previewBtnTitle = this.previewBtnTitle.bind(this);

        this.emailTemplateType = params[params.length-1];
        this.state = {
            shouldUpdate: false,
            preview: false
        }
    }

    componentWillMount() {

        let endPoint = {...API._EMAIL_TEMPLATE_DETAIL};
        endPoint.url += '/'+this.emailTemplateType;
        this.props.dispatch(actions.destroy('email_template'));
        
        this.props.callApi(endPoint)
            .then((res) => {

                this.props.dispatch(actions.initialize('email_template', res.data));
            })
            .catch(() => {

                this.props.swal.error('Email Template not found', () => {
                    this.props.history.push('/');
                    this.props.swal.close();
                });
            })

    }
    shouldComponentUpdate(nextProps: Props, nextState: EditEmailTemplateState) {

        const nextEvent = nextProps.rootState.server['_email_template_detail'];
        const nextChange = nextEvent ? nextEvent.shouldUpdate : false;

        const event = this.props.rootState.server['_email_template_detail'];
        const change = event ? event.shouldUpdate : false;
        if(nextChange !== change){

            return true;
        }
        if(this.state.shouldUpdate !== nextState.shouldUpdate) {

            return true;
        }

        return false;
    }

    onSubmit(value: EmailTemplateFormData, dispatch: any, props: EmailTemplateProps) {
        
        const IsError = Object.keys(props.syncErrors).length;
        console.log('submitting...');
        let endPoint = {...API.EMAIL_TEMPLATE_ACTION};
        endPoint.method = 'PUT';
        endPoint.url += '/'+this.emailTemplateType;
        // value.recipient =  value.recipient ? value.recipient : null;       
        // value.role_id =  value.role_id ? value.role_id : null;
        var data = {
            subject: value.subject ? value.subject : null,
            body: value.body ? value.body : null
        }

        if(!IsError) {
            
           return  this.props.callApi(endPoint, data)
            .then((response: ServerResponse) => {

               this.props.swal.success('Email Template has been saved successfully.', () => {
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

    togglePreview() {

        this.setState({
            shouldUpdate: !this.state.shouldUpdate,
            preview: !this.state.preview
        });
    }
    /**
     * This component is using to edit the tempalte for Group, Event and Initial Event
     */
    getTitle() {

        switch (this.emailTemplateType) {
            case "1":
                return "Event Email Template";
            case "2":
                return "Group Events Email Template";
            default:
               return "Initial Event Email Template"
        }
    }

    previewBtnTitle() {

        return this.state.preview? 'Back to Edit': 'Preview';
    }
    render() {

        const title = this.getTitle();        

        const breadcrumbs = [
            {title: title, url: '/email_template/'+this.emailTemplateType}
        ];

        const _email_template_detail = this.props.rootState.server['_email_template_detail'];
        const isFetching = _email_template_detail && _email_template_detail.isFetching ? _email_template_detail.isFetching : false;
        
        const template: string = this.props.helper.deepFind(_email_template_detail,'response.data.template');         

        return (
            <Template {...this.props} breadcrumb={breadcrumbs} >
                <div className="lineframe email-template-edit-form">
            		<div className="lineframe-inner">
                    <button className="btn btn-primary mg-top-btn pull-right" onClick={this.togglePreview}>{this.previewBtnTitle()}</button>
                    <div className="clearfix"></div>
                        {this.state.preview ? <div className="email_template_preview">
                            <table className="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>To </td>
                                    <td>name@domain.com, name@domain.com</td>
                                </tr>
                                <tr>
                                    <td>CC </td>
                                    <td>name@domain.com, name@domain.com</td>
                                </tr>
                                <tr>
                                    <td>Subject </td>
                                    <td>Upcoming Major National Events For {moment().format('YYYY')}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>{Parser(template)}</td>    
                                </tr>
                            </tbody>
                            </table>                           
                        
                        </div> :
                            <EmailTemplateForm onSubmit={this.onSubmit} isFetching={isFetching}  />
                        }
                        
            		</div>
                </div>
            </Template>
        )
    }
}

export default connect(mapStateToProps, mapDispatchToProps)(EditEmailTemplate)
