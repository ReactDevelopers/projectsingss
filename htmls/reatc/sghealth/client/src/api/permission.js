import request from '@/utils/request'
import helper from 'vuejs-object-helper';
/**
 * To get the permission Details
 * @param {Integer} permission ID
 */
export function get(id) {
    return request({
        url: 'permission/'+id,
        method: 'GET'
    })
}
/**
 * To update permission information
 * @param {String} id 
 * @param {Object} data 
 */
export function update(id, data) {
    
    return request({
        url: 'permission/'+id,
        method: 'PUT',
        data: data
    })
}
/**
 * To create new permission
 * @param {Object} data 
 */
export function create(data) {
    
    return request({
        url: 'permission',
        method: 'POST',
        data: data
    })
}
/**
 * To get permission list.,
 * @param {Object} data 
 */
export function list (data, responseType) {

    const formData = helper.objectToQueryString(data);
    return request({
        url: 'permission?'+formData,
        method: 'GET',
        responseType
    })
}
