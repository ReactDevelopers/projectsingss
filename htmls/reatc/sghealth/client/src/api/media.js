import request from '@/utils/request'
import helper from 'vuejs-object-helper';
/**
 * To get the media Details
 * @param {Integer} media ID
 */
export function get(id) {
    return request({
        url: 'media/'+id,
        method: 'GET'
    })
}

/**
 * To update media information
 * @param {String} id 
 * @param {Object} data 
 */
export function update(id, data) {
    
    data._method = 'PUT';
    const formData = helper.objectToFormData(data)
    return request({
        url: 'media/'+id,
        method: 'POST',
        data: formData
    })
}
/**
 * To create new media
 * @param {Object} data 
 */
export function create(data) {
    
    const formData = helper.objectToFormData(data)
    return request({
        url: 'media',
        method: 'POST',
        data: formData
    })
}

/**
 * To get media list.,
 * @param {Object} data 
 */
export function list (data) {

    const formData = helper.objectToQueryString(data);
    return request({
        url: 'media?'+formData,
        method: 'GET'
    })
}