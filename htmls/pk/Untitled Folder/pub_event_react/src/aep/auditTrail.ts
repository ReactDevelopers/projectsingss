export const AUTID_TRAIL_KEY = 'audit_all';
export const AUTID_TRAIL_USER_KEY = 'audit_user';
export const AUTID_TRAIL_EVENT_KEY = 'audit_event';
export const AUTID_TRAIL_EVENT_GROUP_KEY = 'audit_event_group';
export const AUTID_TRAIL_EMAIL_TEMPLATE_KEY = 'audit_email_template';
export const AUTID_TRAIL_ACTIONS_KEY = 'audit_email_template';  // For geting the single record audit

import {ApiEndPointI} from './index';

const  AUTID_TRAIL_ALL : ApiEndPointI = {

	method: 'GET',
	url: process.env.API_URL+'audit-trail',
	sectionName: AUTID_TRAIL_KEY,
    mode: 'cors',
	auth: true,
	saveRequest: true
}

const  AUTID_TRAIL_USER : ApiEndPointI = {
    
	method: 'GET',
	url: process.env.API_URL+'audit-trail/user',
	sectionName: AUTID_TRAIL_USER_KEY,
    mode: 'cors',
	auth: true,
	saveRequest: true
}
const  AUTID_TRAIL_EVENT : ApiEndPointI = {
    
	method: 'GET',
	url: process.env.API_URL+'audit-trail/event',
	sectionName: AUTID_TRAIL_EVENT_KEY,
    mode: 'cors',
	auth: true,
	saveRequest: true
}

const  AUTID_TRAIL_EVENT_GROUP : ApiEndPointI = {
    
	method: 'GET',
	url: process.env.API_URL+'audit-trail/group',
	sectionName: AUTID_TRAIL_EVENT_GROUP_KEY,
    mode: 'cors',
	auth: true,
	saveRequest: true
}

const  AUTID_TRAIL_EMAIL_TEMPLATE : ApiEndPointI = {
    
	method: 'GET',
	url: process.env.API_URL+'audit-trail/email-template',
	sectionName: AUTID_TRAIL_EMAIL_TEMPLATE_KEY,
    mode: 'cors',
	auth: true,
	saveRequest: true
}
const  AUTID_TRAIL_ACTIONS : ApiEndPointI = {
    
	method: 'GET',
	url: process.env.API_URL+'audit-trail',
	sectionName: AUTID_TRAIL_ACTIONS_KEY,
    mode: 'cors',
	auth: true,
	saveRequest: true
}

export default {
    AUTID_TRAIL_ALL,
    AUTID_TRAIL_USER,
    AUTID_TRAIL_EVENT,
    AUTID_TRAIL_EVENT_GROUP,
    AUTID_TRAIL_EMAIL_TEMPLATE,
    AUTID_TRAIL_ACTIONS
};