import { AppAction } from '../actions';
import { OldDateConfirmationProps } from '../components/helpers/OldDateConfirmation';
import * as constants from '../constants/OldDateConfirmation';

export default function appConfirmDeleteReducer(state: OldDateConfirmationProps , action: AppAction ): OldDateConfirmationProps {

	switch (action.type) {

		case constants.OLD_DATE_CONFIRMATION_ACCEPTED:
		case constants.OLD_DATE_CONFIRMATION_OPEN:
		case constants.OLD_DATE_CONFIRMATION_REJECTED:
		 return {...action.payload }

		default:
        return {... state };
	}
}