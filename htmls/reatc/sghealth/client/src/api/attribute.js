import request from '@/utils/request'

/**
 * To get the calling Code. * 
 */
export function callingCode() {
  return request({
      url: 'calling-code',
      method: 'GET',
  })
}