import  Dashboard from '../components/Dashboard';
// import * as actions from '../actions/';
import {AppState,AppProps} from '../app-interface';
import { connect } from 'react-redux';

export function mapStateToProps(state:AppState,props:AppProps):any {
  
  return {...props,...state};
}

export default connect(mapStateToProps)(Dashboard);