import request from '@/utils/request'
import helper from 'vuejs-object-helper';


/**
 * To get users list.,
 * @param {Object} data 
 */
export function list (data) {

    const formData = helper.objectToQueryString(data);
    return request({
        url: 'users?'+formData,
        method: 'GET'
    })
}

/**
 * To get the users Details
 * @param {Integer} users ID
 */
export function get(id) {
    return request({
        url: 'users/'+id,
        method: 'GET'
    })
}


/**
 * To update users information
 * @param {String} id 
 * @param {Object} data 
 */
export function update(id, data) {
    
    data._method = 'PUT';
    const formData = helper.objectToFormData(data)
    return request({
        url: 'users/'+id,
        method: 'POST',
        data: formData
    })
}

/**
 * To update password
 * @param {String} id 
 * @param {Object} data 
 */
export function resetPassword(id, data) {
    
    const formData = helper.objectToFormData(data)
    return request({
        url: 'reset-password/'+id,
        method: 'POST',
        data: formData
    })
}

/**
 * To delete user
 * @param {String} id 
 * @param {Object} data 
 */
export function deleteUser(id, data) {
    
    const formData = helper.objectToFormData(data)
    return request({
        url: 'users/'+id,
        method: 'DELETE',
        data: formData
    })
}

/**
 * To restore user
 * @param {String} id 
 * @param {Object} data 
 */
export function restoreUser(id) {
    
    return request({
        url: 'restore-user/'+id,
        method: 'POST'
    })
}

export function addAdditionalInfo(id, data) {
    
    return request({
        url: `users/${id}/add-additional-info`,
        method: 'PUT',
        data
    })
}

/**
 * To create employee
 * @param {String} id 
 * @param {Object} data 
 */
export function createEmployee(data) {
    
    const formData = helper.objectToFormData(data)
    return request({
        url: 'create-employee',
        method: 'POST',
        data: formData
    })
}

/**
 * To create employee
 * @param {String} id 
 * @param {Object} data 
 */
export function createManager(data) {
    
    const formData = helper.objectToFormData(data)
    return request({
        url: 'create-manager',
        method: 'POST',
        data: formData
    })
}

/**
 * To create employee
 * @param {String} id 
 * @param {Object} data 
 */
export function createEventManager(data) {
    
    const formData = helper.objectToFormData(data)
    return request({
        url: 'create-event-manager',
        method: 'POST',
        data: formData
    })
}

/**
 * To create employee
 * @param {String} id 
 * @param {Object} data 
 */
export function createFreelancer(data) {
    
    const formData = helper.objectToFormData(data)
    return request({
        url: 'create-freelancer',
        method: 'POST',
        data: formData
    })
}
/**
 * To send Push notifications
 * @param {*} data 
 */
export function sendPushNotification (id, data) {
    
    return request({
        url: `users/${id}/send-push-notification`,
        method: 'POST',
        data
    })
}

