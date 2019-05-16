import * as React from 'react';
import { Field, reduxForm, getFormSubmitErrors, FormErrors } from 'redux-form';
import {connect} from 'react-redux';
import * as bs from 'react-bootstrap';
import {getFieldError, CustomFormProps} from './FormInit';
import API from '../../aep';
import TextInput from './fields/layout/FormGroupText';
import SelectInput from './fields/layout/FormGroupSelect';

import Message from '../layout/Message';

export interface GroupEmailFromData {
    title?: string;
    email?: string;
    recipient?: string;
}

export interface GroupEmailFormProps extends CustomFormProps<GroupEmailFromData> {}

const UserFrom: React.StatelessComponent<GroupEmailFormProps> = ({ handleSubmit, 
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
            <Field 
                name="email" 
                component={TextInput} 
                serverError={getFieldError(submitErrors,'email')}
                label="Group Email"
                isFetching={isFetching}
                placeholder="Group Email" 
                type="text" />

             <Field serverError={getFieldError(submitErrors,'recipient')}  
                component={SelectInput} 
                name="recipient"
                options={[
                    {id: "1", name: 'TO'},
                    {id: "2", name: 'CC'},
                ]}
                isFetching={isFetching}
                label="Recipient As"
                labelKey="name"
                valueKey="id"
                placeholder="N/A"
             />   
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
    form: 'group_email',  // a unique identifier for this form,
    //validate: validate
    
})(UserFrom);

export default connect(
    state => ({
        // values: getFormValues('myForm')(state),
        // syncErrors: getFormSyncErrors('myForm')(state),
        submitErrors: getFormSubmitErrors('group_email')(state),
        // dirty: isDirty('myForm')(state),
        // pristine: isPristine('myForm')(state),
        // valid: isValid('myForm')(state),
        // invalid: isInvalid('myForm')(state)
      })
)(UForm);