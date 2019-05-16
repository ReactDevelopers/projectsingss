import '@babel/polyfill'
import 'url-polyfill';

import {profile, generateToken} from '@/api/auth';
import store from '../store'
import init from '../main';
import router from '@/router/admin';
import {getToken, removeToken, getRefreshToken, setTokens, removeRefreshToken} from '@/utils/auth';

const muli_login_prefix = window.location.toString().match(/\/u\/[0-9]+\/?/g);

if(!muli_login_prefix) {

    window.location.href = process.env.VUE_APP_ADMIN_URL.replaceAll(/^\/|\/$/g, '') + '/u/0';
}
else {

    if(getToken()) {

        profile()
            .then((response) => {

                store.dispatch('profile/set', {data: response.data.profile});  
                init(router);

            }).catch(() => {
                
                const refreshToken = getRefreshToken();
        
                if(refreshToken){

                    generateToken({refresh_token: refreshToken})
                        .then((response) => {

                            store.dispatch('profile/set', {data: response.data.profile});  
                            const {profile: {role}, device, token} = response.data;
                            const landing_page  = new URL(role.landing_page);
                            const pathname = [ landing_page.pathname , 'u', device.login_index ].join('/').replaceAll(/^\/|\/$/g, '');
                            setTokens(token, pathname)

                            init(router);

                        }).catch(() => {
                        
                            removeToken();
                            removeRefreshToken();
                            window.location.href = process.env.VUE_APP_AUTH_URL;
                        })
                }
                else {
        
                    removeToken();
                    window.location.href = process.env.VUE_APP_AUTH_URL;
                }
            })
    }
    else {
        
        window.location.href = process.env.VUE_APP_AUTH_URL;
    }
}