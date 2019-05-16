import React, { Component } from 'react';
import { Switch, Route } from 'react-router-dom';
import { Router } from "react-router";
import Home from '../src/components/home'
import aboutUs from '../src/components/aboutUs'

const App = ({history}) => {

  // render() {
    return (
      <div className="wrapper">
          <Router history={history}>
            <Switch>
                <Route exact={true} path='/'  component={Home} />
                <Route exact={true} path='/aboutUs' component={aboutUs}></Route>
            </Switch>
          </Router>
      </div>
    );
  // }
};

export default App;
