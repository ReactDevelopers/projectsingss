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
import SelectInput from './fields/layout/FormGroupSelect';
import Message from '../layout/Message';

export interface UserFromData {
    role_id?: string | null;
    recipient?: string | null;
    name?: string | null;
    pubnet_id?: null;
}

export interface UserFromProps extends CustomFormProps<UserFromData> {}

const UserFrom: React.StatelessComponent<UserFromProps> = ({ handleSubmit, 
    submitErrors, 
    submitting, 
    pristine, 
    submitFailed,
    isFetching,
    valid,
    error, 
        }) => (
        <bs.Form horizontal={true} onSubmit={handleSubmit}>
        <div className="container inner-form">
            <Field 
                name="name" 
                component={TextInput} 
                serverError={getFieldError(submitErrors,'name')} 
                disabled={true}
                isFetching={isFetching}
                label="Name"
                placeholder="Name" 
                type="text" />
            <Field 
                name="pubnet_id" 
                label="PUBNET ID"
                isFetching={isFetching}
                component={TextInput} 
                serverError={getFieldError(submitErrors,'pubnet_id')} 
                disabled={true}
                placeholder="PUBNET ID" 
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
             <Field serverError={getFieldError(submitErrors,'role_id')}  
                component={SelectInput} 
                name="role_id"
                labelKey="name"
                // appendOption={[{id:'', name: 'All'}]}
                isFetching={isFetching}
                label="Role"
                valueKey="id"
                endPoint={API.ROLES}
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
    form: 'user',  // a unique identifier for this form,
    //validate: validate
    
})(UserFrom);

export default connect(
    state => ({
        // values: getFormValues('myForm')(state),
        // syncErrors: getFormSyncErrors('myForm')(state),
        submitErrors: getFormSubmitErrors('event')(state),
        // dirty: isDirty('myForm')(state),
        // pristine: isPristine('myForm')(state),
        // valid: isValid('myForm')(state),
        // invalid: isInvalid('myForm')(state)
      })
)(UForm);