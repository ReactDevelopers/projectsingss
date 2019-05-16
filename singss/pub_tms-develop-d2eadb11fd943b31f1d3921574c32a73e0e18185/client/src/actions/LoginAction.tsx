import * as constants from '../constants';
import Api from '../api/Api';
import Auth from '../Auth';
import {push} from 'connected-react-router';
import appUrl from '../helper';
import user from '../models/user';

export interface LoginRequest {

	type:constants.LOGIN_REQUEST
}


interface loginSuccessResponse{

  message: string;
  status:boolean;
  error_code:string;
  errors: Array<Object>;
  data:{
    user:user,
    token:string,
  }
}
interface loginFailResponse{

  message: string;
  status:boolean;
  error_code:string;
  errors: Array<Object>;
}

export  const  doLogin = (username:string,password:string): any => {
  return  (dispatch:Function, getState:Function) => {

        dispatch(requestingToServer());

        let api = new Api();
      	let auth = new Auth();
        let device_id = auth.guid();

        let  option ={};

        let body:object = {username:username,password:password,device_id:device_id};

        option['body'] = body;

      	api.getFetch('login-action',option)
      			.then(function(response:loginSuccessResponse){

            console.log(response);
            if(response.status){  

              let user = response.data.user;
              console.log("user");
              console.log(user);
        			dispatch(loginSuccess(user,response.message,response.data.token));
              auth.setToken(response.data.token,device_id);
              dispatch(push(appUrl('/dashboard')));


            }else{

                dispatch(loginFail(response.message,true,response.errors));
            }

    		}).catch(function(response:loginFailResponse){
          console.log("response");
          console.log(response);
    			dispatch(loginFail(response.message,true,response.errors));          

    		});

  }
}


export interface LoginSuccess {

	type:constants.LOGIN_SUCCESS;
	user:user;
	message:string;
	token:string;
}

export function loginSuccess(user:user,message:string,token:string): LoginSuccess {
    
    return {
        type: constants.LOGIN_SUCCESS,
        user:user,
        message:message,
        token:token
    }
}

export interface LoginFail {

	type:constants.LOGIN_FAIL;
	isError:boolean;
	message:string;
	errors:Array<Object>;
}

export function loginFail(message:string,isError:boolean,errors:Array<Object>): LoginFail {
    
    return {
        type: constants.LOGIN_FAIL,
        isError:isError,
        message:message,
        errors:errors
    }
}

// Global Action for the Server Request


export interface RequestingToServer {

	type:constants.REQUESTING_TO_SERVER
}

export function requestingToServer(): RequestingToServer{

	return {

		type:constants.REQUESTING_TO_SERVER
	}
}

export interface GetUserProfile {

  type:constants.USER_PROFILE;
  user:user;
}

export function getUserProfileAction(user:user): GetUserProfile{

  return {

    type:constants.USER_PROFILE,
    user:user
  }
}

export type LoginAction = LoginRequest | LoginSuccess | LoginFail | RequestingToServer | GetUserProfile;