import request from '@/utils/request'
import helper from 'vuejs-object-helper';


/**
 * To get all detail
 */
export function detail (data) {
    return request({
        url: 'dashboard',
        method: 'GET'
    })
}
