import  UserList, { UserDataTableProps } from '../../components/user/UserList';
// import * as actions from '../actions/';
import { AppState } from '../../app-interface';
import { connect } from 'react-redux';

export function mapStateToProps(state: AppState, props: UserDataTableProps): UserDataTableProps {
  
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
        deleteConfirmation: state.deleteConfirmation,
        tableData: state.tableData
    };
}

export default connect(mapStateToProps)(UserList);