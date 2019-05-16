import * as constants from '../constants';

export interface SessionExpire {

	type:constants.SESSION_EXPIRE;
	message:string;
}

export function seessionExpire(): SessionExpire {
    
    console.log("disptach session expire....");
    return {
        type: constants.SESSION_EXPIRE,
        message:"Session has been exipred.",
    }
}

export type SessionExpireAction = SessionExpire;