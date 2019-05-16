import { createAction } from 'typesafe-actions';
import END_POINTS, { 
    ApiEndPointI, 
    REQUESTING_API, 
    RECEIVED_API_RESPONSE, 
    RECEIVED_APT_EXCEPTION,
    CALL_API
}
from '../aep';


const DELETE_RESPONSE = 'DELETE_RESPONSE';
//const SAVE_REQUEST = 'SAVE_REQUEST';

import {ServerResponse, ListRequest} from '../features/root-props';

// console.log('endpoints');
// console.log(END_POINTS.AUTH_USER);

/**
 * This Action will dispatch everytime before call the api
 */
export const requestingToApi = createAction(REQUESTING_API, (END_POINT: ApiEndPointI, data?: any) => {

    return {
        type: REQUESTING_API,
        payload: {
            data: data,
            END_POINT: END_POINT
        }
    }
});

export const  receivedApiResponse = 

createAction(RECEIVED_API_RESPONSE, (END_POINT: ApiEndPointI, json: ServerResponse ) => {    
    
    if(typeof END_POINT.extendResponse === 'function') {

      let response = END_POINT.extendResponse(json);
      json = response ? response : json;
    }

    return {
        type: RECEIVED_API_RESPONSE,        
        payload: {
            END_POINT: END_POINT,
            data: json
        }
    }
})

export const  callApi = createAction(CALL_API, (END_POINT: ApiEndPointI, data?: object, forceUpdate?: boolean) => {

    return  {
        type: CALL_API,
        payload: {
            data: data,
            END_POINT: END_POINT,
            forceUpdate: forceUpdate !== undefined? forceUpdate : true,
        }
     }
})

// export const  saveRquest = createAction(SAVE_REQUEST, (END_POINT: ApiEndPointI, data?: ListRequest, forceUpdate?: boolean) => {

//     return  {
//         type: SAVE_REQUEST,
//         payload: {
//             data: data,
//             END_POINT: END_POINT
//         }
//      }
// })

export const receivedApiException = createAction(RECEIVED_APT_EXCEPTION, (END_POINT: ApiEndPointI, data: ServerResponse ) => {
    return  {
        type: RECEIVED_APT_EXCEPTION,
        payload: {
            data: data,
            END_POINT: END_POINT
        }
     }
})

export const deleteResponse = createAction(DELETE_RESPONSE, (END_POINT: ApiEndPointI) => {
    return  {
        type: DELETE_RESPONSE,
        payload: {
            data: null,
            END_POINT: END_POINT
        }
     }
})