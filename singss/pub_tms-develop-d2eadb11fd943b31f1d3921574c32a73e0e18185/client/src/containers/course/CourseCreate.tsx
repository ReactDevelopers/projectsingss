// import  { AppProps, ImportUserState } from '../../components/user/ImportUser';
import  CourseCreate from '../../components/course/CourseCreate';
// import * as actions from '../actions/';
import { AppState, AppProps } from '../../app-interface';
import { connect } from 'react-redux';

export function mapStateToProps(state: AppState, props: AppProps): AppProps {
  
  return { 
	  	isRequesting:state.isRequesting,
	    isError:state.isError,
	    message:state.message,
	    token:state.token,
	    user:state.user,
	    errors:state.errors,
	    router:state.router,
	    history:state.history,
	    showLoaderBar:state.showLoaderBar,
	    showOverlayLoader:state.showOverlayLoader,
	    data:state.data,
	    error_code:state.error_code
	};
}

export default connect(mapStateToProps)(CourseCreate);