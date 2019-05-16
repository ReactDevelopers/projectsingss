import * as constants from '../constants/DeleteSweetAlert';
import { DeleteConfirmationProps, defaultAlertData, requestStatus } from '../components/helpers/DeleteConfirmation';

export interface DeleteConfirmationCancel {

	type:constants.DELETE_SWEET_ALERT_CANCEL;
	payload: DeleteConfirmationProps;
}

export function deleteConfirmationCancel(): DeleteConfirmationCancel {
    
    return {
        type: constants.DELETE_SWEET_ALERT_CANCEL,
        payload: defaultAlertData,
    }
}

export interface DeleteConfirmationBeforeDelete {

    type:constants.DELETE_SWEET_ALERT_CONFIRM_BEFORE_DELETED;
    payload: DeleteConfirmationProps;
}

export function deleteConfirmationBeforeDelete(): DeleteConfirmationBeforeDelete {
    
    return {
        
        type: constants.DELETE_SWEET_ALERT_CONFIRM_BEFORE_DELETED,
        payload: {
            ...defaultAlertData, 
            confirmBtnText:'Please wait...', 
            showCancel:false,
            requestStatus:requestStatus.process,
            show:true,
            param: {}
        },
    }
}

export interface DeleteConfirmationShow {

	type:constants.DELETE_SWEET_ALERT_SHOW;
	payload: DeleteConfirmationProps;
}

export function deleteConfirmationShow(param: Object,message?: string,title?: string): DeleteConfirmationShow {
       
    let props = {
        show: true,
        param: param
    }

    if(message !== undefined){

        props['message'] = message;
    }

    if(title !== undefined){

        props['title'] = title;
    }
        
    return {        
        type: constants.DELETE_SWEET_ALERT_SHOW,
        payload: {
        	...defaultAlertData, 
            ...props
        },
    }
}


export interface DeleteConfirmationDeletedSuccess {

	type:constants.DELETE_SWEET_ALERT_CONFIRM_WHEN_DELETED_SUCCESS;
	payload: DeleteConfirmationProps;
}

export function deleteConfirmationDeletedSuccess(message: string): DeleteConfirmationDeletedSuccess {
    
    return {

        type: constants.DELETE_SWEET_ALERT_CONFIRM_WHEN_DELETED_SUCCESS,
        payload: { 
			...defaultAlertData, 
			message:message, 
			requestStatus: requestStatus.completed,
			danger: false,
			success: true,
			confirmBtnText:'OK',
			showCancel:false,
			show:true
        },
    }
}

export interface DeleteConfirmationDeletedFail {

    type:constants.DELETE_SWEET_ALERT_CONFIRM_WHEN_DELETED_FAIL;
    payload: DeleteConfirmationProps;
}

export function deleteConfirmationDeletedFail(message: string): DeleteConfirmationDeletedFail {
    
    return {

        type: constants.DELETE_SWEET_ALERT_CONFIRM_WHEN_DELETED_FAIL,
        payload: { 
            ...defaultAlertData, 
            message:message, 
            requestStatus: requestStatus.completed,
            danger: true,
            success: false,
            confirmBtnText:'OK',
            showCancel:false,
            show:true
        },
    }
}



export type DeleteConfirmAction =  DeleteConfirmationDeletedSuccess | DeleteConfirmationBeforeDelete 
| DeleteConfirmationCancel | DeleteConfirmationShow | DeleteConfirmationDeletedFail;