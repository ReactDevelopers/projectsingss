import request from '@/utils/request'
import helper from 'vuejs-object-helper';

/**
 * To update institute information
 * @param {String} id 
 * @param {Object} data 
 */
export function update(id, data) {
    
    return request({
        url: 'institute-license/'+id,
        method: 'PUT',
        data
    })
}
/**
 * To create new institute
 * @param {Object} data 
 */
export function create(data) {
    
    return request({
        url: 'institute-license',
        method: 'POST',
        data
    })
}

/**
 * To get institute list.,
 * @param {Object} data 
 */
export function list (data) {

    const formData = helper.objectToQueryString(data);
    return request({
        url: 'institute-license?'+formData,
        method: 'GET'
    })
}

export function destroy (id, data) {
    return request({
        url: 'institute-license/'+id,
        method: 'DELETE',
        data
    })   
}