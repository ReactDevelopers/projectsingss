import request from '@/utils/request'
import helper from 'vuejs-object-helper';
/**
 * To get the banner Details
 * @param {Integer} banner ID
 */
export function get(id) {
    return request({
        url: 'banner/'+id,
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
        url: 'banner/'+id,
        method: 'POST',
        data: formData
    })
}
/**
 * To create new Banner
 * @param {Object} data 
 */
export function create(data) {
    
    const formData = helper.objectToFormData(data)
    return request({
        url: 'banner',
        method: 'POST',
        data: formData
    })
}
/**
 * To get banner list.,
 * @param {Object} data 
 */
export function list (data) {

    const formData = helper.objectToQueryString(data);
    return request({
        url: 'banner',
        method: 'GET',
        data: formData
    })
}
