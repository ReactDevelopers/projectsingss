export const USER_KEY = 'users';
export const USER_ACTION_KEY = 'user_action';
export const USER_DETAIL_KEY = 'user_detail';
export const ROLE_KEY = 'roles';

import {ApiEndPointI} from './index';
const  USER : ApiEndPointI = {

	method: 'GET',
	url: process.env.API_URL+'user',
	sectionName: USER_KEY,
    mode: 'cors',
	auth: true,
	saveRequest: true
}
const  USER_DETAIL : ApiEndPointI = {

	method: 'GET',
	url: process.env.API_URL+'user',
	sectionName: USER_DETAIL_KEY,
    mode: 'cors',
    auth: true,
}

const  USER_ACTION : ApiEndPointI = {

	method: 'POST',
	url: process.env.API_URL+'user',
	sectionName: USER_ACTION_KEY,
    mode: 'cors',
    auth: true,	
}

const  ROLES : ApiEndPointI = {

	method: 'GET',
	url: process.env.API_URL+'role',
	sectionName: ROLE_KEY,
    mode: 'cors',
    auth: true,	
}

const  RECIPIENT_LIST : ApiEndPointI = {

	method: 'GET',
	url: process.env.API_URL+'recipient-list',
	sectionName: 'recipient_list',
    mode: 'cors',
    auth: true,	
}

const  GET_CONFIG : ApiEndPointI = {

	method: 'GET',
	url: process.env.API_URL+'config',
	sectionName: 'config',
    mode: 'cors',
    auth: true,	
}
const  CONFIG_ACTION : ApiEndPointI = {

	method: 'PUT',
	url: process.env.API_URL+'config',
	sectionName: 'config_action',
    mode: 'cors',
    auth: true,	
}

export default {USER, USER_ACTION, USER_DETAIL, ROLES, RECIPIENT_LIST, GET_CONFIG, CONFIG_ACTION};