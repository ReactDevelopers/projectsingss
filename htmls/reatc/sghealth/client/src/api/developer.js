import request from '@/utils/request'
import helper from 'vuejs-object-helper';

/**
 * To execute the php command.
 */
export function executePhp(data) {
    
    return request({
        url: 'developer/execute-php',
        method: 'POST',
        data
    })
}

/**
 * To execute the Node commands.
 */
export function executeNode(data) {
    
    return request({
        url: 'developer/execute-node',
        method: 'POST',
        data
    })
}

/**
 * To execute the Composer commands.
 */
export function executeComposer(data) {
    
    return request({
        url: 'developer/execute-composer',
        method: 'POST',
        data
    })
}


/**
 * API to get the Request Log.
 */
export function requestLogList(data) {
    
    const formData = helper.objectToQueryString(data);
    return request({
        url: 'developer/request-log?'+formData,
        method: 'get',
    })
}