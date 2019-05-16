import request from '@/utils/request'
import helper from 'vuejs-object-helper';
/**
 * To get the banner Details
 * @param {Integer} banner ID
 */
export function get(id) {
    return request({
        url: 'contact-us/'+id,
        method: 'GET'
    })
}
/**
 * To update banner information
 * @param {String} id 
 * @param {Object} data 
 */
export function update(id, data) {
    
    data._method = 'PUT';
    const formData = helper.objectToFormData(data)
    return request({
        url: 'contact-us/'+id,
        method: 'POST',
        data: formData
    })
}
/**
 * To get contact-us list.,
 * @param {Object} data 
 */
export function list (data) {

    const formData = helper.objectToQueryString(data);
    return request({
        url: 'contact-us?'+formData,
        method: 'GET',
        data: formData
    })
}
