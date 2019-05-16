export const EMAIL_TEMPLATE_ACTION_KEY = 'email_template_action';
export const EMAIL_TEMPLATE_DETAIL_KEY = 'email_template_detail';
export const _EMAIL_TEMPLATE_DETAIL_KEY = '_email_template_detail';
export const EMAIL_LOG_KEY = 'email_log';

import {ApiEndPointI} from './index';

/**
 * To Get the Email Template for a event or group
 */
const  EMAIL_TEMPLATE_DETAIL : ApiEndPointI = {

	method: 'GET',
	url: process.env.API_URL+'template',
	sectionName: EMAIL_TEMPLATE_DETAIL_KEY,
    mode: 'cors',
    auth: true,
}
/**
 * To get the email template
 */
const  _EMAIL_TEMPLATE_DETAIL : ApiEndPointI = {

	method: 'GET',
	url: process.env.API_URL+'email-template',
	sectionName: _EMAIL_TEMPLATE_DETAIL_KEY,
    mode: 'cors',
    auth: true,
}

const  EMAIL_TEMPLATE_ACTION : ApiEndPointI = {

	method: 'POST',
	url: process.env.API_URL+'email-template',
	sectionName: EMAIL_TEMPLATE_ACTION_KEY,
    mode: 'cors',
    auth: true,	
}
const  SEND_EMAIL_ACTION : ApiEndPointI = {

	method: 'POST',
	url: process.env.API_URL+'send/mail',
	sectionName: EMAIL_TEMPLATE_ACTION_KEY,
    mode: 'cors',
    auth: true,	
}

const  EMAIL_LOG : ApiEndPointI = {

	method: 'GET',
	url: process.env.API_URL+'email-log',
	sectionName: EMAIL_LOG_KEY,
    mode: 'cors',
	auth: true,	
	saveRequest: true,
}

// 

export default {EMAIL_TEMPLATE_ACTION, EMAIL_TEMPLATE_DETAIL, SEND_EMAIL_ACTION, _EMAIL_TEMPLATE_DETAIL, EMAIL_LOG};