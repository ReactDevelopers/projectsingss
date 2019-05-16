import React, { Component } from "react";
import {
  Route,
  NavLink,
  BrowserRouter,
  Prompt,
  Switch
} from "react-router-dom";
import Home from "./Home";
import Stuff from "./Stuff";
import Contact from "./Contact";
import List from "./List";
import Notfound from './notfound';
 
class Main extends Component {
  render() {
    return (
      <BrowserRouter>
        <div>
          <Prompt message="Are you sure you want to leave?">
          </Prompt>
          <h1>Simple App</h1>
          <ul className="header">
            <li><NavLink exact to="/">Home</NavLink></li>
            <li><NavLink to="/stuff">Stuff</NavLink></li>
            <li><NavLink to="/Contact">Contact</NavLink></li>
            <li><NavLink to="/list">List</NavLink></li>
          </ul>
          <div className="content">
            <Switch>
            <Route exact path="/" component={Home}/>
            <Route path="/stuff" component={Stuff}/>
            <Route path="/contact" component={Contact}/>
            <Route path="/list" component={List}/>
            <Route component={Notfound} />
            </Switch>
          </div>
        </div>
      </BrowserRouter>
    );
  }
}

 
export default Main;
