import request from '@/utils/request'
import helper from 'vuejs-object-helper';
/**
 * To get the faq Details
 * @param {Integer} faq ID
 */
export function get(id) {
    return request({
        url: 'faq/'+id,
        method: 'GET'
    })
}

/**
 * To update faq information
 * @param {String} id 
 * @param {Object} data 
 */
export function update(id, data) {
    
    data._method = 'PUT';
    const formData = helper.objectToFormData(data)
    return request({
        url: 'faq/'+id,
        method: 'POST',
        data: formData
    })
}
/**
 * To create new faq
 * @param {Object} data 
 */
export function create(data) {
    
    return request({
        url: 'faq',
        method: 'POST',
        data: data
    })
}

/**
 * To get faq list.,
 * @param {Object} data 
 */
export function list (data) {

    const formData = helper.objectToQueryString(data);
    return request({
        url: 'faq?'+formData,
        method: 'GET'
    })
}