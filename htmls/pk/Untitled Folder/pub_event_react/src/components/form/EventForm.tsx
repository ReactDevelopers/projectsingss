import * as React from 'react';
import { Field, reduxForm, getFormSubmitErrors, FormErrors, ConfigProps, getFormValues, change } from 'redux-form';
import {connect} from 'react-redux';
import * as bs from 'react-bootstrap';
import {getFieldError, CustomFormProps} from './FormInit';
import TextInput from './fields/layout/FormGroupText';
import TextArea from './fields/layout/FormGroupTextArea';
import DatePicker from './fields/layout/FormGroupDatePicker';
import Select from './fields/layout/FormGroupSelect';
import validate from './validations/eventValidation';
import Message from '../layout/Message';
import SwitchInput from './fields/layout/FormGroupSwitch';
import API from '../../aep';
import moment, {Moment} from 'moment';
import { RootState } from 'Features/root-reducer';

export interface EventFormData {
    title?: string;
    description?: string;
    start_date?: string;
    end_date?: string;
    group_id?: number;
    venue? : string;
    security_level?: string;
    allow_in_scheduled_email? : string;
}

export interface EventFormProps extends CustomFormProps<EventFormData> {
    fieldData?: {[key: string] : any}
}

class  EventForm extends React.Component<EventFormProps> {

    constructor(props: EventFormProps) {
        super(props);
       // this.onChangeStartDate = this.onChangeStartDate.bind(true);
    }

    /**
     * When user selected the start date and end date value is not available
     *  then set the start date value also as end date value
     * @param e 
     * @param date 
     */
    onChangeStartDate(e:any , date: Moment| null) : void {
        
        const {fieldData} = this.props;
        if(date && (!fieldData || (fieldData && !fieldData.end_date )) ) {            
            this.props.dispatch ? this.props.dispatch(change('event', 'end_date', date)) : null;
        }
    }
    render () 
    {
        const {handleSubmit, 
            submitErrors, 
            submitting, 
            pristine, 
            submitFailed,
            isFetching,
            valid,
            fieldData,
            error}  = this.props;

        return (
            <bs.Form horizontal={true} onSubmit={handleSubmit}>
                <div className="container inner-form">
                <Field 
                    name="title" 
                    component={TextInput} 
                    serverError={getFieldError(submitErrors,'title')} 
                    placeholder="Title" 
                    label="Title"
                    isFetching={isFetching}
                    type="text" />
                <Field serverError={getFieldError(submitErrors,'description')} 
                    name="description"                     
                    component={TextArea}
                    isFetching={isFetching} 
                    label="Description"
                    placeholder="description"  />

                <Field serverError={getFieldError(submitErrors,'start_date')}  
                    component={DatePicker} 
                    name="start_date"
                    type="text"  
                    onChange={this.onChangeStartDate.bind(this)}              
                    maxDate={fieldData && fieldData.end_date ? moment(fieldData.end_date): undefined}
                    isFetching={isFetching}
                    label="Event Start Date"
                    placeholder="Event Start Date"
                /> 
                <Field serverError={getFieldError(submitErrors,'end_date')}  
                    component={DatePicker} 
                    name="end_date"
                    minDate={fieldData && fieldData.start_date ? moment(fieldData.start_date) : undefined}
                    type="text"              
                    // selected={fieldData && fieldData.start_date && !fieldData.end_date ? moment(fieldData.start_date) : null }
                    isFetching={isFetching}
                    label="Event End Date"
                    placeholder="Event End Date"
                /> 

                <Field serverError={getFieldError(submitErrors,'group_id')}  
                    component={Select} 
                    name="group_id"
                    // isAsync={true}
                    isFetching={isFetching}
                    endPoint={API.EVENT_GROUP}
                    labelKey="title"
                    valueKey="id"
                    label="Event Group"
                    placeholder="Event Group"
                /> 

                <Field serverError={getFieldError(submitErrors,'venue')} 
                    name="venue"                     
                    component={TextArea}
                    isFetching={isFetching} 
                    label="Venue"
                    placeholder="Venue"  />
                <Field 
                    name="security_level" 
                    component={TextInput} 
                    serverError={getFieldError(submitErrors,'security_level')} 
                    placeholder="Security Level" 
                    label="Security Level"
                    isFetching={isFetching}
                    type="text" />

                <Field 
                    name="allow_in_scheduled_email" 
                    id="allow_in_scheduled_email"
                    component={SwitchInput} 
                    serverError={getFieldError(submitErrors,'allow_in_scheduled_email')} 
                    placeholder="include in scheduler" 
                    label="include in scheduler                    "
                    isFetching={isFetching}
                    onColor="#277dc4"
                    trueValue="Y"
                    falseValue="N"
                    defaultChecked={true}
                    />

                <div className="form-group">
                    <div className="text-right col-sm-8 col-sm-offset-4">
                    <button type="submit" disabled={submitting} className="submit-btn btn btn-default">Create</button>
                    </div>
                </div>

                <Message isError={submitFailed} message={error} /> 
                </div>        
            </bs.Form>
        )
    }
}

// const EventForm: React.StatelessComponent<EventFormProps> = ({ handleSubmit, 
//     submitErrors, 
//     submitting, 
//     pristine, 
//     submitFailed,
//     isFetching,
//     valid,
//     fieldData,
//     error 
//         }) => (
        
        
        
// );


const EForm =  reduxForm({
    form: 'event',  // a unique identifier for this form,
    validate: validate,
    //destroyOnUnmount: true,
    //enableReinitialize: true,
   //keepDirtyOnReinitialize : true,
})(EventForm);

export default connect(
    (state: RootState) => {
        console.log('getFormValues(event)(state)');
        console.log(getFormValues('event')(state));
        return {
        fieldData: getFormValues('event')(state),
        // syncErrors: getFormSyncErrors('myForm')(state),
        submitErrors: getFormSubmitErrors('event')(state),
        //initialValues: fromData
        // dirty: isDirty('myForm')(state),
        // pristine: isPristine('myForm')(state),
        // valid: isValid('myForm')(state),
        // invalid: isInvalid('myForm')(state)
        }
      }
)(EForm);