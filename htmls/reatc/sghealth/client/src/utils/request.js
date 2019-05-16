import axios from 'axios'
import { Message } from 'lq-element-ui'
import { getToken, getDeviceId } from '@/utils/auth'
import NProgress from 'nprogress';

const service = axios.create({
  baseURL: process.env.VUE_APP_API_BASE_URL, // api 
  //timeout: 5000,
})
service.defaults.headers.common['client-id'] = process.env.VUE_APP_CLIENT_ID;
service.defaults.headers.common['device-id'] = getDeviceId();

service.defaults.headers.common['Accept'] = 'application/json, text/plain, */*';


service.interceptors.request.use(
  config => {
    NProgress.start();
    const authToken = getToken();
    if(authToken){
      config.headers['Authorization'] =  'Bearer '+authToken;
    }

    return config
  },
  error => {
    // Do something with request error
    Promise.reject(error)
  }
)

service.interceptors.response.use(
  response => {
    NProgress.done();
    
    return response.data
  },
  error => {
    
    NProgress.done();
    if(error.response.status === 500) {

      Message({
        message: error.message,
        type: 'error',
        duration: 5 * 1000
      })
    }
    else if(error.response.status === 403) {
      Message({
        message: 'You do not have the authority.',
        type: 'error',
        duration: 5 * 1000
      })
    }


    return Promise.reject(error)
  }
)

export default service
