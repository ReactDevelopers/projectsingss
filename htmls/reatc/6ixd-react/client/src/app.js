import React, {Component} from 'react';
import { Switch, Route } from 'react-router-dom';
import { Router } from "react-router";
import Dashboard from '../src/components/dashboard'
import store from '../src/store'
import Provider from 'react-redux'
import Login from '../src/components/login'
import MerchantDetail from '../src/components/merchantDetail'
import NotFound from '../src/components/notFound'
import HistoryDetail from '../src/components/histotyDetail'
import History from '../src/components/history'
import index from '../src/assests/sass/index.scss'

const App = ({ history}) => {
    return (
        // <Provider store={store}>
            <div className="wrapper">
                <Router history={history}>
                <Switch>
                    <Route exact={true} path='/'  component={Login} />
                    <Route exact={true} path='/landing' component={Dashboard} />
                    <Route exact={true} path='/history'  component={History} />
                    <Route exact={true} path='/historyDetail' component={HistoryDetail} />
                    <Route exact={true} path='/MerchantDetail' component={MerchantDetail} />
                    <Route component={NotFound} />
                </Switch>
                </Router>
            </div>
        // </Provider>
    );  
};

export default App;