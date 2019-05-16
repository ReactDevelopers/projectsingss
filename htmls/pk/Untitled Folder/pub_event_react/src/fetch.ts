import fetch, {Headers } from 'cross-fetch';
import 'cross-fetch/polyfill';

import {actions} from './features/root-action';
import API, {ApiEndPointI, RequestDataType} from './aep';
import {RootState} from './features/root-reducer';
import { Dispatch } from 'redux';
import {ServerResponse} from './features/root-props';
import {AuthI} from './models/Auth';
import store from './store';

const lastRequest: {[key: string]: {endpont: ApiEndPointI, data?: object}} = {};

export function fetchApi(END_POINT: ApiEndPointI , data: object | undefined, dispatch: Dispatch<Object>, state: RootState, forceUpdate: boolean) {
   ​
   const sectionData = state.server[END_POINT.sectionName] ? state.server[END_POINT.sectionName] : null;

    /**
     * If forceupdate is false, then checking , the data is already present in store
     * So Skip the Server Requesting and return the Promise instance.
     */
    // console.log('$$$$$$$$$$$$$$$$$$$');
    // console.log(forceUpdate);
    // console.log(sectionData);
    // console.log(END_POINT);
    if(!forceUpdate && sectionData && sectionData.response && sectionData.response.data) {
        
        // When data is in under data key, it is possible when a get request with pagination
        if(sectionData.response.data.data && sectionData.response.data.data.length) {
            return Promise.resolve(sectionData.response);
        }
        
        // When data direct in the data key.
        else if(!sectionData.response.data.data && sectionData.response.data) {
            return Promise.resolve(sectionData.response);
        }
    }

    /**
     * If the Request is overlapping then stop it and return the existing data
     * It wil work if you set the true value of the key {shouldNotOverLap} in the EndPoint.
     */
    if(sectionData && sectionData.isFetching && END_POINT.shouldNotOverLap) {
        
        lastRequest[END_POINT.sectionName] = {
            endpont: END_POINT,
            data: data
        }
        return Promise.resolve(sectionData.response);
    }

    data = { ...sectionData ? sectionData.requestData : {} , ...data };
      // First dispatch: the app state is updated to inform
      // that the API call is starting.   
     // data && data.  
    console.log('EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE');
    console.log(END_POINT);  
    console.log(data);
  
      dispatch(actions.fetch.requestingToApi(END_POINT, data));
  ​
      // The function called by the thunk middleware can return a value,
      // that is passed on as the return value of the dispatch method.
  ​
      // In this case, we return a promise to wait for.
      // This is not required by thunk middleware, but it is convenient for us.
        
        
        let API_URL = END_POINT.url;
        const sectionName = END_POINT.sectionName;
        const isFile = END_POINT.file !== undefined ? END_POINT.file : false;
        const types = END_POINT.type;
        const isAuthRequire = END_POINT.auth ? END_POINT.auth : false;
        

        let headers = END_POINT.headers ? END_POINT.headers : new Headers()

        if(isAuthRequire && state.server['auth_user'] && state.server['auth_user'].response) {
            const auth_user: AuthI = state.server['auth_user'].response.data;            
            headers.append('authorization', 'Bearer ' + auth_user.token);
        }

        if(!isFile)
        headers.append('Content-Type', 'application/json');
        
        let RequestBody: RequestDataType = '';
        
        // If Request does not contain the file data then convert the body into JSON
        if( isFile === false)            
            RequestBody = JSON.stringify(data);

        // Empty the Request Body id Method is GET
        if(END_POINT.method === 'GET'){
            
            RequestBody = '';
            if(data && Object.keys(data).length)
                API_URL += '?'+ queryString(data);
        }
        

        //const RequestBody: RequestDataType = body;

        const request: RequestInit = {

            headers: headers,
            method: END_POINT.method,
            mode: END_POINT.mode,
            cache: END_POINT.cache,
            body: RequestBody,
            signal: END_POINT.signal,
           // credentials: 'include'
        }

     
        // request.body = Object.assign({}, request.body, data);

      END_POINT.type ? dispatch(END_POINT.type.request(END_POINT)) : null;

      return fetch(API_URL, request)
        .then(responseVerification)
        .then((response: ServerResponse) => {

            console.log('Received...............');
            // Dispatch the Success Action Globally for all API.
            dispatch(actions.fetch.receivedApiResponse(END_POINT, response));
            
            if(lastRequest[END_POINT.sectionName]) {
                //return fetchApi();
                var LastendPointData = lastRequest[END_POINT.sectionName];
                dispatch(actions.fetch.callApi(LastendPointData.endpont, LastendPointData.data));

                delete lastRequest[END_POINT.sectionName];
            }
            
            // Dispatch the Success Action of indivisual Api.
            
            END_POINT.type ? dispatch(END_POINT.type.success(END_POINT, response)) : null;
            return response;            

        })
        .catch( (response: ServerResponse) => {
            
            // Dispatch the Error Action Globally for all API.
            dispatch(actions.fetch.receivedApiException(END_POINT, response));
            
            // Dispatch the Error Action of indivisual Api.
            END_POINT.type ? dispatch(END_POINT.type.fail(END_POINT, response)) : null;

            return Promise.reject(response);
        })   
  }


  /**
   * Covert the object into query string
   * @param obj [Object]
   * @param prefix [String]
   */
export  function queryString(obj: Object, prefix?: string): string {
    var str = [],
      p;
    for (p in obj) {
      if (obj.hasOwnProperty(p)) {
        var k = prefix ? prefix + "[" + p + "]" : p,
          v = obj[p];
        str.push((v !== null && typeof v === "object") ?
          queryString(v, k) :
          encodeURIComponent(k) + "=" + encodeURIComponent(v? v : ''));
      }
    }
    return str.join("&");
  }

  /**
   *  Verify the Server Response 
   * @param response 
   */
  function responseVerification(response: Response) {
    
    // console.log('rrrrrrrrrrrrrrrrrrrrr');
    // console.log(response);

    if(response.headers.get('content-type') !== 'application/json' && response.status >= 200 && response.status < 300) {

        return response.blob();
    }

    if (response.status && response.status >= 200 && response.status < 300) {                   
       

        return  response.json().then((response: ServerResponse) => {
            
            return response.status ? Promise.resolve(response) : Promise.reject(response);                
        });
    }

    else if(response.status === 401 ){
        
        // LogOut the User        
        return response.json().then((data: ServerResponse) => {

            store.dispatch(actions.auth.logoutSuccess(API.AUTH_USER, data));
            return Promise.reject(data);
        });
    }
     else {      

        return response.json().then((data: ServerResponse) => {

            return Promise.reject(data);
        });
    }
}