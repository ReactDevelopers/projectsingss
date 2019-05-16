// import localStorage from 'mock-local-storage'

export default class Auth{

	appAuthData:string;

	constructor() {

		let appAuthData = localStorage.getItem('TMS_AUTH');
		this.appAuthData = appAuthData?appAuthData:'';
	}

	/**
	 * This function is using to store the token and device data into the browser local store.
	 * @param {[string]} token     [auth token]
	 * @param {[string]} device_id [browser id]
	 */
	setToken(token:string,device_id:string) :void{

		let authData = JSON.stringify({token:token,device_id:device_id});
		localStorage.setItem('TMS_AUTH',authData);
	}

	/**
	 * This function is using to retrieve the token from the storage if available.
	 */
	getToken(): string|boolean {

		let authData = this.appAuthData;
		if(authData){

			authData = JSON.parse(authData);

			return (typeof authData['token'] !="undefined")?authData['token']:false;
		}

		return false;
	}
	/**
	 * This function is using to retrieve the browser ID from the storage if available.
	 */
	getDeviceId(): string|boolean {

		let authData = this.appAuthData;
		if(authData){

			authData = JSON.parse(authData);

			return (typeof authData['device_id'] !="undefined")?authData['device_id']:false;
		}
		return false;
	}
	/**
	 * This function is using to get the user login status.
	 */
	isLogin(): boolean {

		return this.appAuthData?true:false;
	}

	/**
	 * This function uses to generate the unique id, In this application, we are using to make token secure
	 * @return {string} [Browser id]
	 */

	guid():string {
	  
	  function s4() {
	    return Math.floor((1 + Math.random()) * 0x10000)
	      .toString(16)
	      .substring(1);
	  }
	  return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
	    s4() + '-' + s4() + s4() + s4();
	}

	/**
	 * This function is using to clear the token from the local storage
	 */
	
	async unsetToken() :Promise<any> {

		let clearAuth = await localStorage.removeItem('TMS_AUTH');
		return clearAuth;
	}
}