import request from '@/utils/request'
import helper from 'vuejs-object-helper';

/**
 * To get notification-template list.,
 * @param {Object} data 
 */
export function list(data) {

    const formData = helper.objectToQueryString(data);
    return request({
        url: 'notification-template?'+formData,
        method: 'GET'
    })
}

/**
 * TO get the notification-template details by id
 * @param (int) id
 */
export function get(id){
    return request({
        url: 'notification-template/'+id,
        method: 'GET'
    })
}

/**
 * To update notification-template information
 * @param {String} id 
 * @param {Object} data 
 */
export function update(id, data) {
    
    data._method = 'PUT';
    const formData = helper.objectToFormData(data)
    return request({
        url: 'notification-template/'+id,
        method: 'POST',
        data: formData
    })
}

/**
 * To add notification-template information
 * @param {Object} data 
 */
export function create(data) {
    
    const formData = helper.objectToFormData(data)
    return request({
        url: 'notification-template',
        method: 'POST',
        data: formData
    })
}