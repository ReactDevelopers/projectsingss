import * as React from 'react';
import { Field, reduxForm, getFormSubmitErrors, FormErrors, FieldArray } from 'redux-form';
import {connect} from 'react-redux';
import * as bs from 'react-bootstrap';
import {getFieldError, CustomFormProps} from './FormInit';
import API from '../../aep';
import TextInput from './fields/layout/FormGroupText';
// import TextArea from './fields/layout/FormGroupTextArea';
// import DatePicker from './fields/layout/FormGroupDatePicker';
//import validate from './validations/eventValidation';
import Message from '../layout/Message';

export interface ConfigFromData {
    email_threshold_tenure?: number;
}


export interface ConfigFormProps extends CustomFormProps<ConfigFromData> {}

const ConfigForm: React.StatelessComponent<ConfigFormProps> = ({ handleSubmit, 
    submitErrors, 
    submitting, 
    pristine, 
    isFetching,
    submitFailed,
    valid,
    error, 
        }) => (
        
        <bs.Form horizontal={true} onSubmit={handleSubmit}>
            <div className="container inner-form">
            <Field 
                name="email_threshold_tenure" 
                component={TextInput} 
                serverError={getFieldError(submitErrors,'email_threshold_tenure')}
                label="Email Threshold Tenure"
                isFetching={isFetching}
                placeholder="Email Threshold Tenure" 
                type="text" 
                />                 
             <div className="form-group">
                <div className="text-right col-sm-8 col-sm-offset-4">
                <button type="submit" disabled={submitting} className="submit-btn btn btn-default">Save</button>
                </div>
            </div>
            <Message isError={submitFailed} message={error} /> 
            </div>
        </bs.Form>
        
);


const UForm =  reduxForm({
    form: 'config_form',  // a unique identifier for this form,
    //validate: validate
    
})(ConfigForm);

export default connect(
    state => ({
        // values: getFormValues('myForm')(state),
        // syncErrors: getFormSyncErrors('myForm')(state),
        submitErrors: getFormSubmitErrors('config_form')(state),
        // dirty: isDirty('myForm')(state),
        // pristine: isPristine('myForm')(state),
        // valid: isValid('myForm')(state),
        // invalid: isInvalid('myForm')(state)
      })
)(UForm);