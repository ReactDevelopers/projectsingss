import request from '@/utils/request'
import helper from 'vuejs-object-helper';
/**
 * To get the role Details
 * @param {Integer} role ID
 */
export function get(id) {
    return request({
        url: 'role/'+id,
        method: 'GET'
    })
}
/**
 * To update role information
 * @param {String} id 
 * @param {Object} data 
 */
export function update(id, data) {
    
    return request({
        url: 'role/'+id,
        method: 'PUT',
        data: data
    })
}
/**
 * To create new role
 * @param {Object} data 
 */
export function create(data) {
    
    return request({
        url: 'role',
        method: 'POST',
        data: data
    })
}
/**
 * To get role list.,
 * @param {Object} data 
 */
export function list (data) {

    const formData = helper.objectToQueryString(data);
    return request({
        url: 'role?'+formData,
        method: 'GET'
    })
}
