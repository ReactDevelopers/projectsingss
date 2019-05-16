import request from '@/utils/request'
import helper from 'vuejs-object-helper';

/**
 * To get post-type list.,
 * @param {Object} data 
 */
export function list (data) {

    const formData = helper.objectToQueryString(data);
    return request({
        url: 'post-type?'+formData,
        method: 'GET',
        data: formData
    })
}

/**
 * To get the post-type Details
 * @param {Integer} post ID
 */
export function get(id) {
    return request({
        url: 'post-type/'+id,
        method: 'GET'
    })
}