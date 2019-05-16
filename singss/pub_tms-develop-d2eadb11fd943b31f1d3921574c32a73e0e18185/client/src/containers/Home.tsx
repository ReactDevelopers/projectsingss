import  Home from '../components/Home';
import * as actions from '../actions/';
import * as LoginAction  from '../actions/LoginAction';
import {AppState,AppProps} from '../app-interface';
import { connect, Dispatch } from 'react-redux';

export function mapStateToProps(state:AppState,props:AppProps):any {
  
  return {...props,...state};
}


export function mapDispatchToProps(dispatch: Dispatch<actions.AppAction>) {
  return {
    doLoginRequest: (username:string,password:string) => dispatch(LoginAction.doLogin(username,password)),
  }
}

export default connect(mapStateToProps, mapDispatchToProps)(Home);