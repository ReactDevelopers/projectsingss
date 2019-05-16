import request from '@/utils/request'
import helper from 'vuejs-object-helper';


/**
 * To get event list.,
 * @param {Object} data 
 */
export function list (data) {

    const formData = helper.objectToQueryString(data);
    return request({
        url: 'event?'+formData,
        method: 'GET',
        data: formData
    })
}

/**
 * To get the event Details
 * @param {Integer} event ID
 */
export function get(id) {
    return request({
        url: 'event/'+id,
        method: 'GET'
    })
}


/**
 * To update event information
 * @param {String} id 
 * @param {Object} data 
 */
export function update(id, data) {
    
    data._method = 'PUT';
    const formData = helper.objectToFormData(data)
    return request({
        url: 'event/'+id,
        method: 'POST',
        data: formData
    })
}

/**
 * To create event information
 * @param {String} id 
 * @param {Object} data 
 */
export function create(data) {
    
    const formData = helper.objectToFormData(data)
    return request({
        url: 'event',
        method: 'POST',
        data: formData
    })
}

/**
 * To delete certificat
 * @param {String} id 
 * @param {Object} data 
 */
export function deleteEvent(id, data) {
    
    const formData = helper.objectToFormData(data)
    return request({
        url: 'event/'+id,
        method: 'DELETE',
        data: formData
    })
}

/**
 * To get members detail
 * @param {String} id 
 * @param {Object} data 
 */
export function getAllMembers(id, data,responseType) {
    
    const formData = helper.objectToQueryString(data)
    return request({
        url: 'event/'+id+'/member?'+formData,
        method: 'GET',
        responseType
    })
}


/**
 * To update status
 * @param {String} id 
 * @param {Object} data 
 */
export function changeStatus(id, data) {
    
    return request({
        url: 'event-member/'+id,
        method: 'POST',
        data: data
    })
}

/**
 * To announce winner
 * @param {String} id 
 * @param {Object} data 
 */
export function eventWinner(data) {
    
    return request({
        url: 'event-winner',
        method: 'POST',
        data:data
    })
}


