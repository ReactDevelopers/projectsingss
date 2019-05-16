import request from '@/utils/request'
import helper from 'vuejs-object-helper';
/**
 * To get the license Details
 * @param {Integer} license ID
 */
export function get(id) {
    return request({
        url: 'license/'+id,
        method: 'GET'
    })
}

/**
 * To update license information
 * @param {String} id 
 * @param {Object} data 
 */
export function update(id, data) {
    
    data._method = 'PUT';
    const formData = helper.objectToFormData(data)
    return request({
        url: 'license/'+id,
        method: 'POST',
        data: formData
    })
}
/**
 * To create new license
 * @param {Object} data 
 */
export function create(data) {
    
    return request({
        url: 'license',
        method: 'POST',
        data: data
    })
}

/**
 * To get license list.,
 * @param {Object} data 
 */
export function list (data) {
    
    const formData = helper.objectToQueryString(data);
    return request({
        url: 'license?'+formData,
        method: 'GET'
    })
}

/**
 * To delete instiute
 * @param {String} id 
 * @param {Object} data 
 */
export function deleteLicense(id, data) {
    
    const formData = helper.objectToFormData(data)
    return request({
        url: 'license/'+id,
        method: 'DELETE',
        data: formData
    })
}

/**
 * To restore instiute
 * @param {String} id 
 * @param {Object} data 
 */
export function restoreLicense(id) {
    
    return request({
        url: 'restore-license/'+id,
        method: 'POST'
    })
}