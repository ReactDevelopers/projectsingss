import request from '@/utils/request'
import helper from 'vuejs-object-helper';

/**
 * To get institute list.,
 * @param {Object} data 
 */
export function list (data) {

    const formData = helper.objectToQueryString(data);
    return request({
        url: 'branch?'+formData,
        method: 'GET'
    })
}