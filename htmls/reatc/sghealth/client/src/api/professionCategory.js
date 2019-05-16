import request from '@/utils/request'
import helper from 'vuejs-object-helper';


/**
 * To get certificate list.,
 * @param {Object} data 
 */
export function list (data) {

    const formData = helper.objectToQueryString(data);
    return request({
        url: 'profession-category?'+formData,
        method: 'GET',
        data: formData
    })
}

/**
 * To get the certificate Details
 * @param {Integer} certificate ID
 */
export function get(id) {
    return request({
        url: 'profession-category/'+id,
        method: 'GET'
    })
}


/**
 * To update certificate information
 * @param {String} id 
 * @param {Object} data 
 */
export function update(id, data) {
    
    data._method = 'PUT';
    const formData = helper.objectToFormData(data)
    return request({
        url: 'profession-category/'+id,
        method: 'POST',
        data: formData
    })
}

/**
 * To create certificate information
 * @param {String} id 
 * @param {Object} data 
 */
export function create(data) {
    
    const formData = helper.objectToFormData(data)
    return request({
        url: 'profession-category',
        method: 'POST',
        data: formData
    })
}

/**
 * To delete certificat
 * @param {String} id 
 * @param {Object} data 
 */
export function deleteProfessionCategory(id, data) {
    
    const formData = helper.objectToFormData(data)
    return request({
        url: 'profession-category/'+id,
        method: 'DELETE',
        data: formData
    })
}

/**
 * To restore certificate
 * @param {String} id 
 * @param {Object} data 
 */
export function restore(id) {
    
    return request({
        url: 'restore-profession-category/'+id,
        method: 'POST'
    })
}