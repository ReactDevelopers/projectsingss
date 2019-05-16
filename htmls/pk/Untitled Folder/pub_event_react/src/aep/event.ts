export const EVENT_KEY = 'events';
export const EVENT_ACTION_KEY = 'event_action';
export const EVENT_DETAIL_KEY = 'event_detail';

import {ApiEndPointI} from './index';
import * as eventAction from '../actions/event-action';
const  EVENT : ApiEndPointI = {

	method: 'GET',
	url: process.env.API_URL+'event',
	sectionName: EVENT_KEY,
    mode: 'cors',
	auth: true,
	saveRequest: true,
	type:{
		 request: eventAction.eventReq, 
		 success: eventAction.eventSuccess,
		 fail: eventAction.eventError
	}	
}
const  EVENT_DETAIL : ApiEndPointI = {

	method: 'GET',
	url: process.env.API_URL+'event',
	sectionName: EVENT_DETAIL_KEY,
    mode: 'cors',
    auth: true,
	type:{
		 request: eventAction.eventDetailReq, 
		 success: eventAction.eventDetailSuccess,
		 fail: eventAction.eventDetailError
	}	
}

const  EVENT_ACTION : ApiEndPointI = {

	method: 'POST',
	url: process.env.API_URL+'event',
	sectionName: EVENT_ACTION_KEY,
    mode: 'cors',
    auth: true,
	type:{
		 request: eventAction.eventActionReq, 
		 success: eventAction.eventActionSuccess,
		 fail: eventAction.eventActionError
	}	
}

const  EVENT_YEARS : ApiEndPointI = {

	method: 'GET',
	url: process.env.API_URL+'event-years',
	sectionName: 'event_years',
    mode: 'cors',
    auth: true,	
}
const  EVENT_CHANGE_TO_DISPLAY_IN_EMAIL : ApiEndPointI = {

	method: 'PUT',
	url: process.env.API_URL+'event-allow',
	sectionName: 'event_change_display',
    mode: 'cors',
	auth: true,	
	shouldResponseStore: false,
}

export default {EVENT, EVENT_ACTION, EVENT_DETAIL, EVENT_YEARS, EVENT_CHANGE_TO_DISPLAY_IN_EMAIL};