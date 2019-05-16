import Cookies from 'js-cookie'

const TokenKey = 'X-TOKEN';
const RefreshTokenKey = 'X-REFRESH-TOKEN';
const ReviceIdKey = 'DEVICE-ID';
import {logOut} from '@/api/auth';

/**
 * To get the Authentication token
 */
export function getToken() {
  return Cookies.get(TokenKey)
}

/**
 * To Get the Refresh Token
 */
export function getRefreshToken() {
  return Cookies.get(RefreshTokenKey)
}
/**
 * To get the device token
 */
export function getDeviceId() {
  return Cookies.get(ReviceIdKey)
}

export function setToken(token, path, domain) {
  
  return Cookies.set(TokenKey, token, {expires: 30, path, domain})
}

export function setRefreshToken(token, path, domain) {
  return Cookies.set(RefreshTokenKey, token, {expires: 45, path, domain})
}

export function setDeviceId(deviceId) {
  return Cookies.set(ReviceIdKey, deviceId, {expires: 200000})
}

export function removeToken() {
  return Cookies.remove(TokenKey)
}

export function removeRefreshToken() {
  return Cookies.remove(RefreshTokenKey)
}

export function removeDeviceId() {
  return Cookies.remove(ReviceIdKey)
}

export function setTokens(token, path, domain) {
  setToken(token.access_token, path, domain)
  setRefreshToken(token.access_token, path, domain)
}

/**
 * To logout the user and redirect to login page.
 */
export function logOutUser() {

  return logOut()
    .then(() => {
      removeToken();
      removeRefreshToken();
      window.location.href = process.env.VUE_APP_AUTH_URL;

    })
    .catch(() => {
      removeToken();
      removeRefreshToken();
      window.location.href = process.env.VUE_APP_AUTH_URL;

    })
}