import request from '@/utils/request'
import helper from 'vuejs-object-helper';

/**
 * To get the oauth-device Details
 * @param {Integer} oauth-client ID
 */
export function get(id) {
    return request({
        url: 'device/'+id,
        method: 'GET'
    })
}

export function list (data) {

    const formData = helper.objectToQueryString(data);
    return request({
        url: 'device?'+formData,
        method: 'GET'
    })
}
