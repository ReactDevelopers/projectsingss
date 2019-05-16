import * as constants from '../constants/OldDateConfirmation';
import { defaultAlertData, OldDateConfirmationProps } from '../components/helpers/OldDateConfirmation';

export interface OpenOldDateConfirmation {

	type:constants.OLD_DATE_CONFIRMATION_OPEN;
	payload: OldDateConfirmationProps;
}

export function openOldDateConfirmation(callBack: Function, params: object): OpenOldDateConfirmation {
    
    return {
        type: constants.OLD_DATE_CONFIRMATION_OPEN,
        payload: {
            ...defaultAlertData,
            show: true,
            callBack: callBack,
            params: params
        },
    }
}




// REJECT

export interface RejectOldDateConfirmation {

	type:constants.OLD_DATE_CONFIRMATION_REJECTED;
	payload: OldDateConfirmationProps;
}

export function rejectOldDateConfirmation(): RejectOldDateConfirmation {
    
    return {
        type: constants.OLD_DATE_CONFIRMATION_REJECTED,
        payload: {
            ...defaultAlertData,
            show: false,
            callBack: null,
        },
    }
}

// Confirmed

export interface AcceptOldDateConfirmation {

	type:constants.OLD_DATE_CONFIRMATION_ACCEPTED;
	payload: OldDateConfirmationProps;
}

export function acceptOldDateConfirmation(): AcceptOldDateConfirmation {
    
    return {
        type: constants.OLD_DATE_CONFIRMATION_ACCEPTED,
        payload: {
            ...defaultAlertData,
            show: false,
            callBack: null,
        },
    }
}

export type OldDateConfirmAction = OpenOldDateConfirmation | RejectOldDateConfirmation | AcceptOldDateConfirmation;