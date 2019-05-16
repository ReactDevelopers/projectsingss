import * as config from '../constants/config';
import { getUserProfileAction } from '../actions/LoginAction';
import { seessionExpire } from '../actions/SessionExpireAction';
import Auth from '../Auth';
import { push } from 'connected-react-router';
import appUrl from '../helper';
import store from '../store';
// import { serverResponse } from '../app-interface';
// chromium-browser --disable-web-security --user-data-dir
// google-chrome --disable-web-security

class Api {
	
	/**
	 * Using this function for requesting to the server
	 * @param {string}  url    [Assign the url no need to assign the app base url.]
	 * @param {object}  option [Assign the fetch option]
	 * @param {boolean} file   [if you are sending the file data the assign a true value.]
	 */
	async getFetch(url: string, option: object, file?:boolean)
	{	
		let auth = new Auth();
		let isFile = typeof file !=="undefined" ? file : false;

		let  API_URL = config.API_URL + url;

		let myHeaders = new Headers();
			
		if(auth.isLogin()){

			myHeaders.append("Authorization", "Bearer "+auth.getToken());	
		}
		if( isFile === false ) {
			
			//myHeaders.append("Content-Type", "application/x-www-form-urlencoded");
			myHeaders.append("Content-Type", "application/json");
		}

		let fetchData = { 
		    method: 'POST', 
		    body: {},
		    headers:myHeaders ,
		    mode: 'cors',
		    credentials: 'include',
        	cache: 'no-cache'
		}

		let optionData: object = {...fetchData,...option};

		if(typeof optionData['body'] != "undefined" && isFile === false) {

			//optionData['body'] = this.serialize(optionData['body']);
			optionData['body'] = JSON.stringify(optionData['body']);
		}
		
		let res = fetch(API_URL, optionData)
			.then((response: any) => {

			  if (response.status >= 200 && response.status < 300) {
			    
			    return Promise.resolve(response);

			  }else if(response.status ==401){
				
				auth.unsetToken();
				store.dispatch(seessionExpire());
				store.dispatch(push(appUrl('/')));

			  	return Promise.reject({
					type: 'ServerError',
					status: response.status,
					body: {message:'asdasd'},
				});

			  }
			  else {

			    return Promise.reject({
					type: 'ServerError',
					status: response.status,
					body: {message:'asdasd'},
				});

			  }
			})
			.then(this.json);
		return res;
	}


	json(response:any) {

	  return response.json()
	}

	/**
	 * using this function for getting the active user profile data by id
	 */
	async getUserProfile() 
	{

		let data = this.getFetch('my-profile',{});
		return data.then(function(response:any){

			store.dispatch(getUserProfileAction(response.data.user));
		});
	}
	/**
	 * This function uses to covert the json data into form data.
	 * @param  {object} obj [description]
	 * @return {string}     [description]
	 */
	serialize(obj: object): string {

	  var str = [];
	  for(var p in obj)
	    if (obj.hasOwnProperty(p)) {
	      str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
	    }
	  return str.join("&");
	}
}

export default Api;