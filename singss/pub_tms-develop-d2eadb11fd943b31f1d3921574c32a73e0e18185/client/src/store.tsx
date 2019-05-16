
import { createStore, applyMiddleware,compose } from 'redux'
import browserHistory from './history';
import thunkMiddleware from 'redux-thunk';
// import {AppState} from './app-interface';
import   rootReducer  from './reducers/index';
import user from './models/user';
import { defaultAlertData } from './components/helpers/DeleteConfirmation';
import { defaultTableData } from './reducers/TableTemplate';


import { connectRouter, routerMiddleware } from 'connected-react-router';

const initialState = {
  isError:false,
  isRequesting:false,
  message:'',
  user: new user(),
  errors:[],
  token:'',
  showLoaderBar:true,
  showOverlayLoader:false,
  deleteConfirmation:defaultAlertData,
  tableData: defaultTableData,
};

const store = createStore(
  connectRouter(browserHistory)(rootReducer), // new root reducer with router state
  initialState,
  compose(
    applyMiddleware(
      thunkMiddleware,
      routerMiddleware(browserHistory), // for dispatching history actions
      // ... other middlewares ...
    ),
  ),
)



// const store = createStore(rootReducer, {
//   isError:false,
//   isRequesting:false,
//   message:'',
//   user:{},
//   errors:[],
//   token:'',

// },applyMiddleware(
//   thunkMiddleware,
//   routerMiddleware(browserHistory)
// ));




// Promise.all(fetch('http://google.com'),function(){
//   //console.log("store.getState()");

// })

//store.dispatch(doLogin('sadsa','asdsa'));

export default store;

