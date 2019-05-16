// index.js
import { combineReducers, applyMiddleware, createStore } from 'redux'
import { createBrowserHistory } from 'history'
import { routerReducer } from './reducer'
import { routerMiddleware } from './middleware'
import { startListener } from './listener'
import { push } from './actions'
// Create the history object
const history = createBrowserHistory()
// Build the root reducer
const rootReducer = combineReducers({
  // ...otherReducers,
  router: routerReducer,
})
  
// Build the middleware
const middleware = routerMiddleware(history)
// Create the store
const store = createStore(rootReducer, {}, applyMiddleware(middleware))
// Start the history listener
startListener(history, store)
// Now you can read location data from the store!
let currentLocation = store.getState().router.pathname
// You can also subscribe to changes in the location!
let unsubscribe = store.subscribe(() => {
  let previousLocation = currentLocation
  currentLocation = store.getState().router.pathname
  if (previousLocation !== currentLocation) {
    // You can render your application reactively here!
  }
})
// And you can dispatch navigation actions from anywhere!
store.dispatch(push('/about'))