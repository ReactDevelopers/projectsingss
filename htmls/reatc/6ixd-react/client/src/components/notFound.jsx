import React, { Component } from "react";
import logo from "../assests/images/logo.svg";
import profileimage from "../assests/images/profileimage.svg";
import { Redirect } from "react-router-dom";
import { NavLink } from "react-router-dom";

class HistoryDetail extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      redirect: false
    };
  }

  render() {
    if (this.state.redirect) {
      return <Redirect to={"/"} />;
    }

    return (
      <div>
        <h3>NOT FOUND</h3>
      </div>
    );
  }
}

export default HistoryDetail;
