import { getType, getReturnOfExpression } from 'typesafe-actions';

import * as  fetchAction from '../actions/fetch-action';
import {ServerResponse, ServerResponseListData, ListRequest} from '../features/root-props';
//import { AuthI } from '../models/auth';
//import { combineReducers } from 'redux';
//import {AUTH_KEY} from '../aep/auth';
//import actions, { initialize } from 'redux-form/lib/actions';

const returnsOfActions = Object.values(fetchAction).map(getReturnOfExpression);
export type Action = typeof returnsOfActions[number];

export interface ServerDataI<Response = any,> {
    
    [key: string]: FetchDataI<ServerResponse<Response>>;
}

export interface FetchDataI<Response = any, FilterDataType =string> {

    isFetching: boolean;
    response: Response;
    lastUpdated: Number;
    shouldUpdate: Boolean;    
    requestData: ListRequest<FilterDataType>
}
export const InitialListRequest: ListRequest = {

    page: 0,
    sizePerPage: 25,
    searchdata: undefined,
    customFilters: null,
    sortName: undefined,
    sortOrder: undefined,
}

export const  InitialResponse  ={

    isFetching: false,
    response: null,
    lastUpdated: Date.now(),
    shouldUpdate: false,
    requestData: InitialListRequest
}


/**
 * Fetch Reducer
 */

export const reducer = (state: ServerDataI, action: Action) => {        

    const key = action.payload && action.payload.END_POINT ? action.payload.END_POINT.sectionName : '';
    switch (action.type) {
        case getType(fetchAction.requestingToApi):
        case getType(fetchAction.receivedApiResponse):
        case getType(fetchAction.receivedApiException):
        case getType(fetchAction.deleteResponse):
           
            return Object.assign({}, state, {
                [key] : serverData(state[key] , action)
            })
        // case getType(fetchAction.saveRquest):
           
        // return Object.assign({}, state, {
        //         [key] : saveListRequest(state[key] , action)
        //     })

      default:
        return state ? state :{};
    }
}

/**
 * Saving the Request data into the list.
 * @param state 
 * @param action 
 */
function saveListRequest(state: FetchDataI = InitialResponse, data: any) {
    // console.log('TTTTTTTTTTTTTTT');
    // console.log(state.requestData);
    // console.log(data);
   return {...state.requestData, ...(data ? data  : InitialListRequest) } ;    
}

/**
 * Store Server data in the individual data key
 */

function serverData (state: FetchDataI = InitialResponse, action: Action) : FetchDataI<any> {

    switch (action.type) {
       case getType(fetchAction.requestingToApi): 
            
            var shouldResponseStore = action.payload.END_POINT.shouldResponseStore;
            shouldResponseStore = shouldResponseStore !== undefined ? shouldResponseStore : true;
            
            if(shouldResponseStore) {
                return Object.assign({}, state, {
                    isFetching: true,
                    shouldUpdate: !state.shouldUpdate,
                    requestData: action.payload.END_POINT.saveRequest ? saveListRequest(state, action.payload.data ) :{}
                });
            }
            else {

                 return state;   
            }

        case getType(fetchAction.receivedApiResponse): 
            var shouldResponseStore = action.payload.END_POINT.shouldResponseStore;
            shouldResponseStore = shouldResponseStore !== undefined ? shouldResponseStore : true;
            
            if(shouldResponseStore) {

                return Object.assign({}, state, {
                    isFetching: false,
                    shouldUpdate: !state.shouldUpdate,
                    response: action.payload.data
                });
            }
            else {

                return state;
            }
        case getType(fetchAction.receivedApiException): 
            return Object.assign({}, state, {
                isFetching: false,
                shouldUpdate: !state.shouldUpdate
            });
        case getType(fetchAction.deleteResponse):  
            return Object.assign({}, state, {
                isFetching: false,
                shouldUpdate: !state.shouldUpdate,
                response : {
                    data: null,
                    message: null,
                    status: false
                }       
            })       
       default: 
            return state;
    }
}
  