import request from '@/utils/request'
import helper from 'vuejs-object-helper';

/**
 * To get post list.,
 * @param {Object} data 
 */
export function list (data) {

    const formData = helper.objectToQueryString(data);
    return request({
        url: 'post?'+formData,
        method: 'GET',
        data: formData
    })
}

/**
 * To get the post Details
 * @param {Integer} post ID
 */
export function get(id) {
    return request({
        url: 'post/'+id,
        method: 'GET'
    })
}

/**
 * To update post information
 * @param {String} id 
 * @param {Object} data 
 */
export function update(id, data) {
    
    return request({
        url: 'post/'+id,
        method: 'PUT',
        data: data
    })
}

/**
 * To Create post
 * @param {Object} data 
 */
export function create(data) {
    return request({
        url: '/post',
        method: 'POST',
        data: data
    })
}

/**
 * To delete Content
 * @param {String} id 
 * @param {Object} data 
 */
export function deleteContent(id, data) {
    
    const formData = helper.objectToFormData(data)
    return request({
        url: 'post/'+id,
        method: 'DELETE',
        data: formData
    })
}

/**
 * To restore Content
 * @param {String} id 
 * @param {Object} data 
 */
export function restoreContent(id) {
    
    return request({
        url: 'restore-post/'+id,
        method: 'POST'
    })
}