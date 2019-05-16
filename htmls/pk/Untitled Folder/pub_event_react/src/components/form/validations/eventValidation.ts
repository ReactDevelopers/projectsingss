import {EventFormData, EventFormProps} from '../EventForm';
import { FormErrors} from 'redux-form';

/**
 * Validate login Form
 * @param values 
 * @param props 
 */
const validate = (values: EventFormData, props: EventFormProps): FormErrors<EventFormData> => {
    const { title, description, event_date } = values;
    //console.log('Validating...')
    const errors: FormErrors<EventFormData> = {};

    if (!title) {
        errors.title = 'Required';
    }
    if (!description) {
        errors.description = 'Required';
    }
    // if (!event_date) {
    //     errors.event_date = 'Required';
    // }
    return errors;
};

export default validate;