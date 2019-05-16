import request from '@/utils/request'
import helper from 'vuejs-object-helper';

/**
 * To get the oauth-client Details
 * @param {Integer} oauth-client ID
 */
export function get(id) {
    return request({
        url: 'oauth-client/'+id,
        method: 'GET'
    })
}

export function list (data) {

    const formData = helper.objectToQueryString(data);
    return request({
        url: 'oauth-client?'+formData,
        method: 'GET'
    })
}
