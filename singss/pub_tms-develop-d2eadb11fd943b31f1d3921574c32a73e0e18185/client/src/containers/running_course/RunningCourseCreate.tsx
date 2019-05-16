// import  { AppProps, ImportUserState } from '../../components/user/ImportUser';
import  RunningCourseCreate, { RCCProps } from '../../components/running_course/RunningCourseCreate';
// import * as actions from '../actions/';
import { AppState } from '../../app-interface';
import { connect } from 'react-redux';

import { defaultAlertData } from '../../components/helpers/OldDateConfirmation';

export function mapStateToProps(state: AppState, props: RCCProps): RCCProps {
  
  return {
	  	isRequesting: state.isRequesting,
	    isError: state.isError,
	    message: state.message,
	    token: state.token,
	    user: state.user,
	    errors: state.errors,
	    router: state.router,
	    history: state.history,
	    showLoaderBar: state.showLoaderBar,
	    showOverlayLoader: state.showOverlayLoader,
	    data: state.data,
	    error_code: state.error_code,
	    sweetalert: state.sweetalert,
	    oldDateConfirmation : state.oldDateConfirmation ? state.oldDateConfirmation : defaultAlertData
	};
}

export default connect(mapStateToProps)(RunningCourseCreate);