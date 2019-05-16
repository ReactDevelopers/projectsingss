import request from '@/utils/request'
import helper from 'vuejs-object-helper';

/**
 * To get institute list.,
 * @param {Object} data 
 */
export function list (data) {

    const formData = helper.objectToQueryString(data);
    return request({
        url: 'profession?'+formData,
        method: 'GET'
    })
}

/**
 * To get the profession Details
 * @param {Integer} profession ID
 */
export function get(id) {
    return request({
        url: 'profession/'+id,
        method: 'GET'
    })
}


/**
 * To update profession information
 * @param {String} id 
 * @param {Object} data 
 */
export function update(id, data) {
    
    data._method = 'PUT';
    const formData = helper.objectToFormData(data)
    return request({
        url: 'profession/'+id,
        method: 'POST',
        data: formData
    })
}

/**
 * To create profession information
 * @param {String} id 
 * @param {Object} data 
 */
export function create(data) {
    
    const formData = helper.objectToFormData(data)
    return request({
        url: 'profession',
        method: 'POST',
        data: formData
    })
}

/**
 * To delete certificat
 * @param {String} id 
 * @param {Object} data 
 */
export function deleteProfession(id, data) {
    
    const formData = helper.objectToFormData(data)
    return request({
        url: 'profession/'+id,
        method: 'DELETE',
        data: formData
    })
}

/**
 * To restore profession
 * @param {String} id 
 * @param {Object} data 
 */
export function restore(id) {
    
    return request({
        url: 'restore-profession/'+id,
        method: 'POST'
    })
}