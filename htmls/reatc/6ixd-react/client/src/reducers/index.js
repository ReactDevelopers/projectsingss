import { combineReducers } from 'redux';
import loginReducer from './Reducers'

const reducer = combineReducers({
    login : loginReducer
});

export default reducer;
