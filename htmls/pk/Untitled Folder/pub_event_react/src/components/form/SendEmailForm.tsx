import * as React from 'react';
import { Field, reduxForm, getFormSubmitErrors, FormErrors } from 'redux-form';
import {connect} from 'react-redux';
import * as bs from 'react-bootstrap';
import {getFieldError, CustomFormProps} from './FormInit';
import TextInput from './fields/layout/FormGroupText';
import RichText from './fields/layout/FormGroupRichTextEditor';
import Select from './fields/layout/FormGroupSelect';
//import validate from './validations/loginValidation';
import Message from '../layout/Message';
import API from '../../aep';

export interface SendEmailFormData {
    to?: Array<string>;
    cc?: Array<string>;
    subject?: string;
    body?:  string;
}

export interface SendEmailFormProps extends CustomFormProps<SendEmailFormData> {}
// enum labelPossition  {
//     'Top',
//     'Left'
// }
const labelPossitionTop: 'Top' | 'Left' = 'Top';

const LoginForm: React.StatelessComponent<SendEmailFormProps> = ({ handleSubmit, 
    submitErrors, 
    submitting, 
    pristine, 
    isFetching,
    submitFailed,
    valid,
    error, 
        }) => (
        <div className="container">
            <bs.Form horizontal={true} onSubmit={handleSubmit}>
            <Field serverError={getFieldError(submitErrors,'to')}  
                component={Select} 
                name="to"
                isFetching={isFetching}
                isAsync={true}
                endPoint={API.RECIPIENT_LIST}
                labelKey="email"
                valueKey="email"
                label="TO"
                labelPossition={labelPossitionTop}
                multi={true}
                placeholder="TO"
             />
             <Field serverError={getFieldError(submitErrors,'cc')}  
                component={Select} 
                name="cc"
                labelPossition={labelPossitionTop}
                isAsync={true}
                endPoint={API.RECIPIENT_LIST}
                isFetching={isFetching}
                labelKey="email"
                valueKey="email"
                multi={true}
                label="CC"
                placeholder="CC"
             /> 
            <Field 
                name="subject" 
                component={TextInput} 
                serverError={getFieldError(submitErrors,'subject')} 
                placeholder="Email Subject" 
                label="Email Subject"
                labelPossition={labelPossitionTop}
                isFetching={isFetching}
                type="text" />
            <Field serverError={getFieldError(submitErrors,'password')} 
                name="body" 
                label="Email Body"                    
                component={RichText} 
                labelPossition={labelPossitionTop}
                isFetching={isFetching}
                placeholder="Email Body"  />
            
            <div className="form-group">
                <div className="row">
                <div className="col-sm-4 pull-right">
                <button type="submit" disabled={submitting} title="Send Email" className="btn btn-primary submit-btn send-email-btn pull-right">Send</button>
                </div>
                </div>
            </div>

            <Message isError={submitFailed} message={error} />                    
            
            </bs.Form>
        </div>
);


const Lform =  reduxForm({
    form: 'send_email',  // a unique identifier for this form,
    //validate: validate,
    destroyOnUnmount: false,
})(LoginForm);

export default connect(
    state => ({
        // values: getFormValues('myForm')(state),
        // syncErrors: getFormSyncErrors('myForm')(state),
        submitErrors: getFormSubmitErrors('send_email')(state),
        // dirty: isDirty('myForm')(state),
        // pristine: isPristine('myForm')(state),
        // valid: isValid('myForm')(state),
        // invalid: isInvalid('myForm')(state)
      })
)(Lform);