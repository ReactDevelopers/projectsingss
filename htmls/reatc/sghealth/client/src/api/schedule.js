import request from '@/utils/request'
import helper from 'vuejs-object-helper';

/**
 * To get the institute-monthly-data Details
 * @param {Integer} institute ID
 */
export function list(data) {
    const formData = helper.objectToQueryString(data);
    return request({
        url: 'institute-monthly-data?'+formData,
        method: 'GET'
    })
}

/**
 * To create institute-monthly-data information
 * @param {String} id 
 * @param {Object} data 
 */
export function create(data) {
    
    //const formData = helper.objectToFormData(data)
    return request({
        url: 'institute-monthly-data',
        method: 'POST',
        data
    })
}
