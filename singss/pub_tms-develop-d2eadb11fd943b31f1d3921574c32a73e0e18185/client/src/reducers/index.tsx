import { AppAction } from '../actions';
import {AppState} from '../app-interface';
import user from '../models/user';
// import  immutableReducer  from 'react-redux-sweetalert';

// import {Reducer } from 'redux';
// import {combineReducers } from 'redux';
// import {  routerReducer, RouterState } from 'react-router-redux';

import * as constants  from '../constants/index';
import appConfirmDeleteReducer  from './DeleteConfimation';
import appTableReducer  from './TableTemplate';
import oldDateConfirmReducer from './OldDateConfirmation';
import { defaultAlertData } from '../components/helpers/OldDateConfirmation';

function appReducers(state: AppState , action: AppAction ): AppState {

 
	switch (action.type) {

    	case constants.LOGIN_SUCCESS:
    	
    		return { ...state,user:action.user,isError:false, isRequesting:false,message: action.message,token: action.token}
    	
    	case constants.LOGIN_FAIL:
    		
    		return { ...state,isError:true, isRequesting:false,message: action.message,errors:action.errors}
    	case constants.REQUESTING_TO_SERVER:

        return {...state,isRequesting:true,message:'requesting to server'}

      case constants.USER_PROFILE:

			  return {...state,isRequesting:false,message:'requesting to server',user:action.user}
        
      case constants.USER_LOGOUT:
      case constants.SESSION_EXPIRE: 

        let u = new user();
        return {...state,isRequesting:false,message:'Logout Success',user:u}
      
      case constants.PAGE_LOADED:
        return {...state,showLoaderBar:action.showLoaderBar}

      case constants.OVERLAY_LOADER:
        
        let show = state.showOverlayLoader?false:true;
        return {...state,showOverlayLoader:show}

      default:
        return state;
  	}
  	
}

// interface StoreEnhancerState { }

// export interface RootState extends StoreEnhancerState {
//   app: AppState;
// }

// const rootReducer = combineReducers<AppState>({
//   appReducers
// });

// const rootReducer = combineReducers<AppState>({appReducers} );
// const rootReducer = appReducers;

export default (state:AppState, action:AppAction) => ({ 
  ...appReducers(state,action),
  deleteConfirmation: appConfirmDeleteReducer(state.deleteConfirmation,action),
  tableData: appTableReducer(state.tableData,action),
  oldDateConfirmation: oldDateConfirmReducer(state.oldDateConfirmation ? state.oldDateConfirmation : defaultAlertData , action),
});
//export default rootReducer;