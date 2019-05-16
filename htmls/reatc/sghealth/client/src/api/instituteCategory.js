import request from '@/utils/request'
import helper from 'vuejs-object-helper';

/**
 * To get institute-category list.,
 * @param {Object} data 
 */
export function list (data) {

    const formData = helper.objectToQueryString(data);
    return request({
        url: 'institute-category?'+formData,
        method: 'GET',
        data: data
    })
}


/**
 * To get the institute-category Details
 * @param {Integer} institute-category ID
 */
export function get(id) {
    return request({
        url: 'institute-category/'+id,
        method: 'GET'
    })
}


/**
 * To update institute-category information
 * @param {String} id 
 * @param {Object} data 
 */
export function update(id, data) {
    
    data._method = 'PUT';
    const formData = helper.objectToFormData(data)
    return request({
        url: 'institute-category/'+id,
        method: 'POST',
        data: formData
    })
}

/**
 * To create institute-category information
 * @param {String} id 
 * @param {Object} data 
 */
export function create(data) {
    
    const formData = helper.objectToFormData(data)
    return request({
        url: 'institute-category',
        method: 'POST',
        data: formData
    })
}

/**
 * To delete certificat
 * @param {String} id 
 * @param {Object} data 
 */
export function deleteInstitute(id, data) {
    
    const formData = helper.objectToFormData(data)
    return request({
        url: 'institute-category/'+id,
        method: 'DELETE',
        data: formData
    })
}

/**
 * To restore institute-category
 * @param {String} id 
 * @param {Object} data 
 */
export function restore(id) {
    
    return request({
        url: 'restore-institute-category/'+id,
        method: 'POST'
    })
}