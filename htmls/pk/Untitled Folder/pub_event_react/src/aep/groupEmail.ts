export const GROUP_EMAIL_KEY = 'group_email';
export const GROUP_EMAIL_DETAIL_KEY = 'group_email_detail';
export const GROUP_EMAIL_ACTION_KEY = 'group_email_action';

import { ApiEndPointI } from './index';

const  GROUP_EMAIL: ApiEndPointI = {

    method: 'GET',
	url: process.env.API_URL+'email-group',
	sectionName: GROUP_EMAIL_KEY,
    mode: 'cors',
	auth: true,
	saveRequest: true
}

const  GROUP_EMAIL_DETAIL: ApiEndPointI = {
    
	method: 'GET',
	url: process.env.API_URL+'email-group',
	sectionName: GROUP_EMAIL_DETAIL_KEY,
    mode: 'cors',
	auth: true
}

const  GROUP_EMAIL_ACTION: ApiEndPointI = {
    
	method: 'POST',
	url: process.env.API_URL+'email-group',
	sectionName: GROUP_EMAIL_ACTION_KEY,
    mode: 'cors',
	auth: true
}

export default {GROUP_EMAIL, GROUP_EMAIL_ACTION, GROUP_EMAIL_DETAIL}