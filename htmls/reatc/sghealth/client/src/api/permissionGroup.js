import request from '@/utils/request'
import helper from 'vuejs-object-helper';
/**
 * To get the permission-group Details
 * @param {Integer} permission ID
 */
export function get(id) {
    return request({
        url: 'permission-group/'+id,
        method: 'GET'
    })
}
/**
 * To update permission-group information
 * @param {String} id 
 * @param {Object} data 
 */
export function update(id, data) {
    
    return request({
        url: 'permission-group/'+id,
        method: 'PUT',
        data: data
    })
}
/**
 * To create new permission-group
 * @param {Object} data 
 */
export function create(data) {
    
    return request({
        url: 'permission-group',
        method: 'POST',
        data: data
    })
}
/**
 * To get permission-group list.,
 * @param {Object} data 
 */
export function list (data) {
    const formData = helper.objectToQueryString(data);
    return request({
        url: 'permission-group?'+formData,
        method: 'GET'
    })
}
