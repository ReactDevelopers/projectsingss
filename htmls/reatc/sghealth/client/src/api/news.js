import request from '@/utils/request'
import helper from 'vuejs-object-helper';


/**
 * To get news list.,
 * @param {Object} data 
 */
export function list (data) {

    const formData = helper.objectToQueryString(data);
    return request({
        url: 'news?'+formData,
        method: 'GET',
        data: formData
    })
}

/**
 * To get the news Details
 * @param {Integer} news ID
 */
export function get(id) {
    return request({
        url: 'news/'+id,
        method: 'GET'
    })
}


/**
 * To update news information
 * @param {String} id 
 * @param {Object} data 
 */
export function update(id, data) {
    
    data._method = 'PUT';
    const formData = helper.objectToFormData(data)
    return request({
        url: 'news/'+id,
        method: 'POST',
        data: formData
    })
}

/**
 * To create news information
 * @param {String} id 
 * @param {Object} data 
 */
export function create(data) {
    
    const formData = helper.objectToFormData(data)
    return request({
        url: 'news',
        method: 'POST',
        data: formData
    })
}

/**
 * To delete news
 * @param {String} id 
 * @param {Object} data 
 */
export function deleteNews(id) {
    
    return request({
        url: 'news/'+id,
        method: 'DELETE',
    })
}
