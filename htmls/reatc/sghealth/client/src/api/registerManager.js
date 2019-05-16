import request from '@/utils/request'
import helper from 'vuejs-object-helper';


/**
 * To create employee
 * @param {String} id 
 * @param {Object} data 
 */
export function createManager(data) {
    
    return request({
        url: 'register-event-manager',
        method: 'POST',
        data
    })
}


