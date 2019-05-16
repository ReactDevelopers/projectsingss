export const EVENT_GROUP_KEY = 'event_groups';
export const EVENT_GROUP_ACTION_KEY = 'event_group_action';
export const EVENT_GROUP_DETAIL_KEY = 'event_group_detail';

import {ApiEndPointI} from './index';
const  EVENT_GROUP : ApiEndPointI = {

	method: 'GET',
	url: process.env.API_URL+'group',
	sectionName: EVENT_GROUP_KEY,
    mode: 'cors',
	auth: true,
	saveRequest: true
}
const  EVENT_GROUP_DETAIL : ApiEndPointI = {

	method: 'GET',
	url: process.env.API_URL+'group',
	sectionName: EVENT_GROUP_DETAIL_KEY,
    mode: 'cors',
    auth: true,
}

const  EVENT_GROUP_ACTION : ApiEndPointI = {

	method: 'POST',
	url: process.env.API_URL+'group',
	sectionName: EVENT_GROUP_ACTION_KEY,
    mode: 'cors',
    auth: true,	
}



export default {EVENT_GROUP, EVENT_GROUP_ACTION, EVENT_GROUP_DETAIL};