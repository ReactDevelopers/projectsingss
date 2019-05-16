import request from '@/utils/request'

/**
 * To check the Authetication access.
 * @param {Object} data {email, password}
 */
export function login(data) {
  return request({
      url: 'login',
      method: 'POST',
      data: data
  })
}
/**
 * To Send a token to reset password
 * @param {Object} data {email}
 */
export function forgetPassword(data) {
  return request({
      url: 'forget-password',
      method: 'POST',
      data
  })
}
/**
 * 
 * @param {Object} data {token, password, password_confirmation}
 */
export function resetPassword(data) {
  return request({
      url: 'reset-password',
      method: 'POST',
      data
  })
}

/**
 * To send token for verify the email or mobule
 * @param {Object} data {email}
 */
export function verificationLink(data) {
  return request({
      url: 'data-verification-token',
      method: 'POST',
      data
  })
}
/**
 * To verify the OTP/Token
 * @param {Object} data {token}
 */
export function verifyToken(data) {

  return request({
      url: 'data-verify',
      method: 'POST',
      data
  })
}

/**
 * To Get the profile details
 * @param {Object} data {token}
 */
export function profile() {

  return request({
      url: 'my-profile',
      method: 'GET'
  })
}

/**
 * To Generate the Token form refresh token.
 * @param {Object} data {refresh_token}
 */
export function generateToken(data) {

  return request({
      url: 'refresh-token',
      method: 'POST',
      data
  })
}

/**
 * To Logout the user
 * @param {Object} data {refresh_token}
 */
export function logOut() {

  return request({
      url: 'logout',
      method: 'POST'
  })
}

/**
 * To get login Users of this device
 */
export function getDeviceLoginUser() {
    
  return request({
      url: 'device/user',
      method: 'GET',
  })
}

/**
 * To get login Users of this device
 */
export function deviceUserRevoked(user_id) {
    
  return request({
      url: 'device/user/'+user_id+'/revoke',
      method: 'PUT',
  })
}