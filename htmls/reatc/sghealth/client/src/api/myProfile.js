import request from '@/utils/request'
import helper from 'vuejs-object-helper';
/**
 * To update the profile detail.
 * @param {Object} data -> profile data like email, mobile no, last name first name
 */
export function update(data) {
    data._method = 'PUT';
    const formData = helper.objectToFormData(data)

    return request({
        url: '/my-profile',
        method: 'POST',
        data: formData
    })
}

export function resetPassword(data) {

    return request({
        url: '/my-profile/reset-password',
        method: 'PUT',
        data: data
    })
}