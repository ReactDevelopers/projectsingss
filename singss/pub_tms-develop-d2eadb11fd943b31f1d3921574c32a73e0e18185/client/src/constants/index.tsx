export const INCREMENT_ENTHUSIASM = 'INCREMENT_ENTHUSIASM';
export type INCREMENT_ENTHUSIASM = typeof INCREMENT_ENTHUSIASM;

export const DECREMENT_ENTHUSIASM = 'DECREMENT_ENTHUSIASM';
export type DECREMENT_ENTHUSIASM = typeof DECREMENT_ENTHUSIASM;

// this event will execute before sending the request to server
export const REQUESTING_TO_SERVER = 'REQUESTING_TO_SERVER';
export type REQUESTING_TO_SERVER = typeof REQUESTING_TO_SERVER;

// this event will execute after request response
export const REQUEST_TO_SERVER_DONE = 'REQUEST_TO_SERVER_DONE';
export type REQUEST_TO_SERVER_DONE = typeof REQUEST_TO_SERVER_DONE;

// this event will execute when user authenticates successfully.
export const LOGIN_SUCCESS = 'LOGIN_SUCCESS';
export type LOGIN_SUCCESS = typeof LOGIN_SUCCESS;

// this event will execute when authentication fails.
export const LOGIN_FAIL = 'LOGIN_FAIL';
export type LOGIN_FAIL = typeof LOGIN_FAIL;

// this event will execute when request to login.
export const LOGIN_REQUEST = 'LOGIN_REQUEST';
export type LOGIN_REQUEST = typeof LOGIN_REQUEST;

// this event execute to get the profile data..
export const USER_PROFILE = 'USER_PROFILE';
export type USER_PROFILE = typeof USER_PROFILE;

// this event execute to logout action
// 
export const USER_LOGOUT = 'USER_LOGOUT';
export type USER_LOGOUT = typeof USER_LOGOUT;

export const PAGE_LOADED = 'PAGE_LOADED';
export type PAGE_LOADED = typeof PAGE_LOADED;

export const SESSION_EXPIRE = 'SESSION_EXPIRE';
export type SESSION_EXPIRE = typeof SESSION_EXPIRE;

export const OVERLAY_LOADER = 'OVERLAY_LOADER';
export type OVERLAY_LOADER = typeof OVERLAY_LOADER;