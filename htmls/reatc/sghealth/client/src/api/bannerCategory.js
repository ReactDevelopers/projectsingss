import request from '@/utils/request'
import helper from 'vuejs-object-helper';
/**
 * To get the banner-category Details
 * @param {Integer} banner-category ID
 */
export function get(id) {
    return request({
        url: 'banner-category/'+id,
        method: 'GET'
    })
}
/**
 * To update banner-category information
 * @param {String} id 
 * @param {Object} data 
 */
export function update(id, data) {
    
    data._method = 'PUT';
    const formData = helper.objectToFormData(data)
    return request({
        url: 'banner-category/'+id,
        method: 'POST',
        data: formData
    })
}
/**
 * To create new Banner-category
 * @param {Object} data 
 */
export function create(data) {

    const formData = helper.objectToFormData(data)
    return request({
        url: 'banner-category',
        method: 'POST',
        data: formData
    })
}
/**
 * To get banner-category list.,
 * @param {Object} data 
 */
export function list (data) {

    return request({
        url: 'banner-category',
        method: 'GET',
        data: data
    })
}
