import * as React from 'react';
import 'bootstrap/dist/css/bootstrap.css';
import 'react-loading-bar/dist/index.css';
import "react-table/react-table.css";
import 'react-select/dist/react-select.css';
import 'font-awesome/css/font-awesome.css';
import 'react-bootstrap-table/css/react-bootstrap-table.css';
import 'react-datepicker/dist/react-datepicker.css';
import './App.css';
import './scss/index.scss';

import {AppState,AppProps} from './app-interface';
import store from './store';
import { pageLoaded } from './actions/Page';
import AppRouter from './router';

import Auth from './Auth';
import Api from './api/Api';

let api = new Api();
let auth = new Auth();

if(auth.isLogin() ) {

   api.getUserProfile();
}

class App extends React.Component< AppProps ,AppState > {
    
    constructor(props: AppProps) {
        super(props);
    }
    componentWillMount(){

       // store.dispatch(pageWillLoaded());
    }
    componentDidMount() {

       store.dispatch(pageLoaded());
    }

    render() {
        return (
          <AppRouter/>
        );
    }
}

export default App;