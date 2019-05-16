import request from '@/utils/request'
import helper from 'vuejs-object-helper';
/**
 * To get the institute Details
 * @param {Integer} institute ID
 */
export function get(id) {
    return request({
        url: 'institute/'+id,
        method: 'GET'
    })
}

/**
 * To update institute information
 * @param {String} id 
 * @param {Object} data 
 */
export function update(id, data) {
    
    data._method = 'PUT';
    const formData = helper.objectToFormData(data)
    return request({
        url: 'institute/'+id,
        method: 'POST',
        data: formData
    })
}
/**
 * To create new institute
 * @param {Object} data 
 */
export function create(data) {
    
    return request({
        url: 'institute',
        method: 'POST',
        data: data
    })
}

/**
 * To get institute list.,
 * @param {Object} data 
 */
export function list (data) {

    const formData = helper.objectToQueryString(data);
    return request({
        url: 'institute?'+formData,
        method: 'GET'
    })
}
/**
 * To get institute list.,
 * @param {Object} data 
 */
export function employeeList (id, data) {

    const formData = helper.objectToQueryString(data);
    return request({
        url: 'institute/'+id+'/employees?'+formData,
        method: 'GET'
    })
}

/**
 * To delete instiute
 * @param {String} id 
 * @param {Object} data 
 */
export function deleteInstitute(id, data) {
    
    const formData = helper.objectToFormData(data)
    return request({
        url: 'institute/'+id,
        method: 'DELETE',
        data: formData
    })
}

/**
 * To restore instiute
 * @param {String} id 
 * @param {Object} data 
 */
export function restoreInstitute(id) {
    
    return request({
        url: 'restore-institute/'+id,
        method: 'POST'
    })
}