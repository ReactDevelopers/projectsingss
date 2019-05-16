import request from '@/utils/request'
import helper from 'vuejs-object-helper';

export function update(id, data) {
    
    data._method = 'PUT';
    const formData = helper.objectToFormData(data)
    return request({
        url: 'user-certificate/'+id,
        method: 'POST',
        data: formData
    })
}

export function create(data) {
    
    const formData = helper.objectToFormData(data)
    return request({
        url: 'user-certificate',
        method: 'POST',
        data: formData
    })
}

export function destroy(id) {
    
    return request({
        url: 'user-certificate/'+id,
        method: 'DELETE'
    })
}