import * as React from 'react';
import { Field, reduxForm, getFormSubmitErrors, FormErrors } from 'redux-form';
import {connect} from 'react-redux';
import * as bs from 'react-bootstrap';
import {getFieldError, CustomFormProps} from './FormInit';
import API from '../../aep';
import TextInput from './fields/layout/FormGroupText';
// import TextArea from './fields/layout/FormGroupTextArea';
// import DatePicker from './fields/layout/FormGroupDatePicker';
//import validate from './validations/eventValidation';
import Message from '../layout/Message';

export interface EventGroupFromData {
    title?: string;
}

export interface EventGroupFormProps extends CustomFormProps<EventGroupFromData> {}

const UserFrom: React.StatelessComponent<EventGroupFormProps> = ({ handleSubmit, 
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
                name="title" 
                component={TextInput} 
                serverError={getFieldError(submitErrors,'title')}
                label="Group Title"
                isFetching={isFetching}
                placeholder="Group Title" 
                type="text" />           
             
                
             <div className="form-group">
                <div className="text-right col-sm-8 col-sm-offset-4">
                <button type="submit" disabled={submitting} className="submit-btn btn btn-default">Create</button>
                </div>
            </div>
            <Message isError={submitFailed} message={error} /> 
            </div>
        </bs.Form>
        
);


const UForm =  reduxForm({
    form: 'event_group',  // a unique identifier for this form,
    //validate: validate
    
})(UserFrom);

export default connect(
    state => ({
        // values: getFormValues('myForm')(state),
        // syncErrors: getFormSyncErrors('myForm')(state),
        submitErrors: getFormSubmitErrors('event_group')(state),
        // dirty: isDirty('myForm')(state),
        // pristine: isPristine('myForm')(state),
        // valid: isValid('myForm')(state),
        // invalid: isInvalid('myForm')(state)
      })
)(UForm);