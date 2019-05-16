import request from '@/utils/request'
import helper from 'vuejs-object-helper';

/**
 * To get the service Details
 * @param {Integer} institute ID
 */
export function list(data) {
    const formData = helper.objectToQueryString(data);
    return request({
        url: 'service?'+formData,
        method: 'GET'
    })
}

/**
 * To get the service Details
 * @param {Integer} service ID
 */
export function get(id) {
    return request({
        url: 'service/'+id,
        method: 'GET'
    })
}


/**
 * To update service information
 * @param {String} id 
 * @param {Object} data 
 */
export function update(id, data) {
    
    data._method = 'PUT';
    const formData = helper.objectToFormData(data)
    return request({
        url: 'service/'+id,
        method: 'POST',
        data: formData
    })
}

/**
 * To create service information
 * @param {String} id 
 * @param {Object} data 
 */
export function create(data) {
    
    const formData = helper.objectToFormData(data)
    return request({
        url: 'service',
        method: 'POST',
        data: formData
    })
}

/**
 * To delete service
 * @param {String} id 
 * @param {Object} data 
 */
export function deleteService(id, data) {
    
    const formData = helper.objectToFormData(data)
    return request({
        url: 'service/'+id,
        method: 'DELETE',
        data: formData
    })
}

/**
 * To restore service
 * @param {String} id 
 * @param {Object} data 
 */
export function restoreService(id) {
    
    return request({
        url: 'restore-service/'+id,
        method: 'POST'
    })
}
