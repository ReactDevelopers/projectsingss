import request from '@/utils/request'
import helper from 'vuejs-object-helper';

/**
 * To Create the work schedule. * 
 */
export function create(data) {
	return request({
	  url: 'roster',
	  method: 'POST',
	  data
	})
}

/**
 * To Create auto work schedule. * 
 */
export function createAutoSchedule(data) {
	return request({
	  url: 'roster/auto-schedule',
	  method: 'POST',
	  data
	})
}

/**
 * To Create auto work schedule. * 
 */
export function createDayComment(data) {
	return request({
	  url: 'roster/day-comment',
	  method: 'POST',
	  data
	})
}

export function list(data, responseType) {

	const formData = helper.objectToQueryString(data);
	return request({
	  url: 'roster?'+formData,
		method: 'GET',
		responseType
	})
}

export function autoScheduleList(data) {

	const formData = helper.objectToQueryString(data);
	return request({
	  url: 'roster/auto-schedule?'+formData,
	  method: 'GET'
	})
}

export function dayCommentList(data) {

	const formData = helper.objectToQueryString(data);
	return request({
	  url: 'roster/day-comment?'+formData,
	  method: 'GET'
	})
}

export function destroy(id) {

	return request({
	  url: 'roster/'+id,
	  method: 'DELETE'
	})
}
export function destroyAutoSchedule(id) {

	return request({
	  url: 'roster/auto-schedule/'+id,
	  method: 'DELETE'
	})
}