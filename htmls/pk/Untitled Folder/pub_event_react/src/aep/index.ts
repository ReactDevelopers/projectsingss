import AUTH_POINTS from './auth';
import EVENT_POINTS from './event';
import USER_POINTS from './user';
import EVENT_GROUP_POINTS from './EventGroup';
import EMAIL_TEMPLATE_POINTS from './emailTemplate';
import AUDIT_POINTS from './auditTrail';
import GROUP_EMAIL_POINTS from './groupEmail';

import {Headers} from 'cross-fetch';
import { StaticRouter } from 'react-router';
import { ServerResponse } from '../features/root-props';
export const REQUESTING_API = 'REQUESTING_API';
export const RECEIVED_API_RESPONSE = 'RECEIVED_API_RESPONSE';
export const RECEIVED_APT_EXCEPTION = 'RECEIVED_APT_EXCEPTION';
export const CALL_API = 'CALL_API';


export default {
    ...AUTH_POINTS,
    ...EVENT_POINTS,
    ...USER_POINTS,
    ...EVENT_GROUP_POINTS,
    ...EMAIL_TEMPLATE_POINTS,
    ...AUDIT_POINTS,
    ...GROUP_EMAIL_POINTS
}

export type RequestDataType = Blob | Int8Array | Int16Array | 
Int32Array | Uint8Array | Uint16Array | 
Uint32Array | Uint8ClampedArray | Float32Array | 
Float64Array | DataView | ArrayBuffer
 | FormData | string | null;

 export interface IndivisualApiType  {

    request: (ENDPOINT: ApiEndPointI) => object,
    success: (ENDPOINT: ApiEndPointI, data: ServerResponse) => object,
    fail: (ENDPOINT: ApiEndPointI, data: ServerResponse) => object,
 }
 
export interface ApiEndPointI {
    method: string;
    url: string;
    sectionName: string;
    mode: RequestMode;
    type?: IndivisualApiType;
    auth?: boolean;
    saveRequest?: boolean;
    extendResponse ?: (data: ServerResponse) => ServerResponse | void;
    headers?: Headers;
    file?: boolean;
    shouldResponseStore?: boolean;
    body?: Object;
    cache?: RequestCache;
    signal?: AbortSignal;
    shouldNotOverLap?: boolean;
    //callBack?: Function;
}