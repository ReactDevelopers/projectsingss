import { AppAction } from '../actions';
import { DeleteConfirmationProps } from '../components/helpers/DeleteConfirmation';
import * as constants from '../constants/DeleteSweetAlert';
// import { defaultAlertData } from '../components/helpers/DeleteConfirmation';

export default function appConfirmDeleteReducer(state: DeleteConfirmationProps , action: AppAction ): DeleteConfirmationProps {

	switch (action.type) {

		case constants.DELETE_SWEET_ALERT_CANCEL:
		case constants.DELETE_SWEET_ALERT_SHOW:
		case constants.DELETE_SWEET_ALERT_CONFIRM_BEFORE_DELETED:
		case constants.DELETE_SWEET_ALERT_CONFIRM_WHEN_DELETED_SUCCESS:
		case constants.DELETE_SWEET_ALERT_CONFIRM_WHEN_DELETED_FAIL:
		 return {...action.payload }

		default:
        return {... state };
	}
}