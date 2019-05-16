import  Header from '../components/helpers/Header';
import  { HeaderProps } from '../components/helpers/Header';
import * as actions from '../actions/';
import { connect, Dispatch } from 'react-redux';
import * as LogoutAction  from '../actions/LogoutAction';
import { AppState } from '../app-interface';

const mapStateToProps = (state: AppState, props: HeaderProps): any => {

  return {    
    user: state.user,
    showLoaderBar: state.showLoaderBar,
  };
};

export function mapDispatchToProps(dispatch: Dispatch<actions.AppAction>) {
  return {
    doLogOutRequest: () => dispatch(LogoutAction.doLogOut()),
  };
}

export default connect(mapStateToProps, mapDispatchToProps)(Header);