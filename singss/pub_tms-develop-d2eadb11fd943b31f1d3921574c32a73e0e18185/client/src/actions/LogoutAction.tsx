import * as constants from '../constants';
import Auth from '../Auth';
import Api from '../api/Api';
import appUrl from '../helper';
import { push } from 'connected-react-router';

/**
 * This function request to server to logout the user..
 * @param  {[type]} any [description]
 * @return {[type]}     [description]
 */
export  const  doLogOut = (): any => {
    
    return  (dispatch: Function, getState: Function) => {
        
        let api = new Api();

        api.getFetch('logout', {})
        .then(function(response: object) {

            logoutSendResponse(dispatch);

        })
        .catch(function(response: object) {   

            logoutSendResponse(dispatch);
        });
    };
};

function logoutSendResponse(dispatch: Function): void {

    let auth = new Auth();
    auth.unsetToken();
    dispatch(logout('Logout Successfully.'));
    dispatch(push(appUrl('/')));
}

export interface Logout {

    type: constants.USER_LOGOUT;
    message: string;
}

export function logout(message: string): Logout {
    
    return {
        type: constants.USER_LOGOUT,
        message: message,
    };
}

export type LogoutAction = Logout;