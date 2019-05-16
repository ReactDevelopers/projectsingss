import request from '@/utils/request'
import helper from 'vuejs-object-helper';
/**
 * To get the assignment Details
 * @param {Integer} assignment ID
 */
export function get(id) {
    return request({
        url: 'assignment/'+id,
        method: 'GET'
    })
}

/**
 * To update assignment information
 * @param {String} id 
 * @param {Object} data 
 */
export function update(id, data) {
    
    data._method = 'PUT';
    const formData = helper.objectToFormData(data)
    return request({
        url: 'assignment/'+id,
        method: 'POST',
        data: formData
    })
}
/**
 * To create new assignment
 * @param {Object} data 
 */
export function create(data) {
    
    return request({
        url: 'assignment',
        method: 'POST',
        data: data
    })
}

/**
 * To get assignment list.,
 * @param {Object} data 
 */
export function list (data) {

    const formData = helper.objectToQueryString(data);
    return request({
        url: 'assignment?'+formData,
        method: 'GET'
    })
}

/**
 * To delete instiute
 * @param {String} id 
 * @param {Object} data 
 */
export function deleteJob(id, data) {
    
    const formData = helper.objectToFormData(data)
    return request({
        url: 'assignment/'+id,
        method: 'DELETE',
        data: formData
    })
}

/**
 * To get application assignment
 * @param {String} id 
 * @param {Object} data 
 */
export function getAllApplication(data) {
    const formData = helper.objectToQueryString(data);
    return request({
        url: 'assignment-application?'+formData,
        method: 'GET',
    })
}

/**
 * To update assignment information
 * @param {String} id 
 * @param {Object} data 
 */
export function changeApplicationStatus(id, data) {
    
    return request({
        url: 'assignment-application/'+id,
        method: 'PUT',
        data: data
    })
}