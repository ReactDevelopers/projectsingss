import request from '@/utils/request'
import helper from 'vuejs-object-helper';

/**
 * To get the service Details
 * @param {Integer} institute ID
 */
export function list(data) {
    const formData = helper.objectToQueryString(data);
    return request({
        url: 'config?'+formData,
        method: 'GET'
    })
}
export function generalConfigs(data) {

    const formData = helper.objectToQueryString(data ? data: {});
    return request({
        url: 'site-general-config?'+formData,
        method: 'GET'
    })
}

/**
 * To update the configuration
 * @param {Integer} institute ID
 */
export function update(id, data, isFile) {
    
    if(isFile) {

        data._method = 'PUT';
        data = helper.objectToFormData(data)
    }
    
    return request({
        url: 'config/'+id,
        method: isFile ? 'POST': 'PUT',
        data: data
    })
}
