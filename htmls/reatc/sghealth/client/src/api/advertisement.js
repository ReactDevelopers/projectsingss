import request from '@/utils/request'
import helper from 'vuejs-object-helper';


/**
 * To get advertisment list.,
 * @param {Object} data 
 */
export function list (data) {

    const formData = helper.objectToQueryString(data);
    return request({
        url: 'advertisment?'+formData,
        method: 'GET',
        data: formData
    })
}

/**
 * To get the advertisment Details
 * @param {Integer} advertisment ID
 */
export function get(id) {
    return request({
        url: 'advertisment/'+id,
        method: 'GET'
    })
}


/**
 * To update advertisment information
 * @param {String} id 
 * @param {Object} data 
 */
export function update(id, data) {
    
    data._method = 'PUT';
    const formData = helper.objectToFormData(data)
    return request({
        url: 'advertisment/'+id,
        method: 'POST',
        data: formData
    })
}

/**
 * To create advertisment information
 * @param {String} id 
 * @param {Object} data 
 */
export function create(data) {
    
    const formData = helper.objectToFormData(data)
    return request({
        url: 'advertisment',
        method: 'POST',
        data: formData
    })
}

/**
 * To delete advertisment
 * @param {String} id 
 * @param {Object} data 
 */
export function deleteAvertisment(id) {
    
    return request({
        url: 'advertisment/'+id,
        method: 'DELETE',
    })
}
