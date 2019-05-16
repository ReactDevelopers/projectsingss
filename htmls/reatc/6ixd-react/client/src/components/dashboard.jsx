import React, { Component } from "react";
import logo from "../assests/images/logo.svg";
import profileimage from "../assests/images/profileimage.svg";
import { Redirect } from "react-router-dom";
import { NavLink } from "react-router-dom";
import { Formik, Field, Form, resetForm } from "formik";
import inputField from "../helpers/textField";
import * as Yup from "yup";
import { Button, ButtonToolbar, Modal } from "react-bootstrap";

class Dashboard extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      redirect: false,
      show: false
    };
  }

  componentWillMount() {
    if (localStorage.getItem("userData")) {
      return <Redirect to={"/landing"} />;
    } else {
      this.setState({
        redirect: true
      });
    }
  }

  logOut() {
    localStorage.setItem("userData", "");
    localStorage.clear();
    this.setState({
      redirect: true
    });
  }

  showPop() {
    this.setState({
      show: true
    });
  }

  closeBtn() {
    this.setState({
      show: false
    });
  }

  render() {
    if (this.state.redirect) {
      return <Redirect to={"/"} />;
    }

    return (
      <div className="dashboard-wrapper">
        <header className="header-section">
          <div className="container">
            <div className="row">
              <div className="col-md-6 col-sm-6 col-xs-6">
                <div className="header-logo">
                  <img src={logo} alt="Logo" />
                </div>
              </div>
              <div className="col-md-6 col-sm-6 col-xs-6">
                <div className="logout-btn-wrapper text-right">
                  <button
                    onClick={this.logOut.bind(this)}
                    className="logout-btn orange"
                  >
                    Log out
                  </button>
                </div>
              </div>
            </div>
          </div>
        </header>
        <section className="landing-panel-wrapper">
          <div className="container">
            <div className="row">
              <div className="col-md-6 col-sm-6 col-xs-12">
                <div className="profile-image-wrapper">
                  <span className="profile-image">
                    <img src={profileimage} alt="Profile Image" />
                  </span>
                  <div className="profile-image-data">
                    <h4>Scaled</h4>
                    <span>55 Haji Lane Singapore 189248</span>
                  </div>
                </div>
              </div>
              <div className="col-md-6 col-sm-6 col-xs-12">
                <div className="manual-button">
                  <button className="btn" onClick={this.showPop.bind(this)}>
                    Manual Entry
                  </button>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section className="order-block">
          <div className="container">
            <div className="order-block-head">
              <h2 className="inline-block-middle">All Orders</h2>
              <span className="pull-right orange">
                <NavLink to="/history" className="orange">
                  View History
                </NavLink>
              </span>
            </div>
            <div className="order-box">
              <div className="row custom-row">
                <div className="col-md-3 col-sm-3 col-xs-12 custom-padding">
                  <NavLink to="/MerchantDetail" className="c-black">
                    <div className="brand-block">
                      <span className="block-name">CD</span>
                      <div className="block-content">
                        <span>00001</span>
                        <h3>Charlie Deets</h3>
                      </div>
                    </div>
                  </NavLink>
                </div>
                <div className="col-md-3 col-sm-3 col-xs-12 custom-padding">
                  <div className="brand-block">
                    <span className="block-name">CD</span>
                    <div className="block-content">
                      <span>00001</span>
                      <h3>Charlie Deets</h3>
                    </div>
                  </div>
                </div>
                <div className="col-md-3 col-sm-3 col-xs-12 custom-padding">
                  <div className="brand-block">
                    <span className="block-name">CD</span>
                    <div className="block-content">
                      <span>00001</span>
                      <h3>Charlie Deets</h3>
                    </div>
                  </div>
                </div>
                <div className="col-md-3 col-sm-3 col-xs-12 custom-padding">
                  <div className="brand-block">
                    <span className="block-name">CD</span>
                    <div className="block-content">
                      <span>00001</span>
                      <h3>Charlie Deets</h3>
                    </div>
                  </div>
                </div>
                <div className="col-md-3 col-sm-3 col-xs-12 custom-padding">
                  <div className="brand-block">
                    <span className="block-name">CD</span>
                    <div className="block-content">
                      <span>00001</span>
                      <h3>Charlie Deets</h3>
                    </div>
                  </div>
                </div>
                <div className="col-md-3 col-sm-3 col-xs-12 custom-padding">
                  <div className="brand-block">
                    <span className="block-name">CD</span>
                    <div className="block-content">
                      <span>00001</span>
                      <h3>Charlie Deets</h3>
                    </div>
                  </div>
                </div>
                <div className="col-md-3 col-sm-3 col-xs-12 custom-padding">
                  <div className="brand-block">
                    <span className="block-name">CD</span>
                    <div className="block-content">
                      <span>00001</span>
                      <h3>Charlie Deets</h3>
                    </div>
                  </div>
                </div>
                <div className="col-md-3 col-sm-3 col-xs-12 custom-padding">
                  <div className="brand-block">
                    <span className="block-name">CD</span>
                    <div className="block-content">
                      <span>00001</span>
                      <h3>Charlie Deets</h3>
                    </div>
                  </div>
                </div>
                <div className="col-md-3 col-sm-3 col-xs-12 custom-padding">
                  <div className="brand-block">
                    <span className="block-name">CD</span>
                    <div className="block-content">
                      <span>00001</span>
                      <h3>Charlie Deets</h3>
                    </div>
                  </div>
                </div>
                <div className="col-md-3 col-sm-3 col-xs-12 custom-padding">
                  <div className="brand-block">
                    <span className="block-name">CD</span>
                    <div className="block-content">
                      <span>00001</span>
                      <h3>Charlie Deets</h3>
                    </div>
                  </div>
                </div>
                <div className="col-md-3 col-sm-3 col-xs-12 custom-padding">
                  <div className="brand-block">
                    <span className="block-name">CD</span>
                    <div className="block-content">
                      <span>00001</span>
                      <h3>Charlie Deets</h3>
                    </div>
                  </div>
                </div>
                <div className="col-md-3 col-sm-3 col-xs-12 custom-padding">
                  <div className="brand-block">
                    <span className="block-name">CD</span>
                    <div className="block-content">
                      <span>00001</span>
                      <h3>Charlie Deets</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <Modal show={this.state.show} className="transaction-poup">
          <Modal.Header className="no-border">
            <Modal.Title className="text-center">
              <h3>Enter Mobile Number</h3>
            </Modal.Title>
          </Modal.Header>

          <Modal.Body className="body-wrapper form-wrapper">
            <div className="form-group storeid-group m-b-0">
              <label className="label">Mobile No</label>
              <input
                className="form-control"
                type="text"
                label="StoreId"
                name="storeid"
              />
            </div>
          </Modal.Body>

          <Modal.Footer className="no-border">
            <div className="button-group footer-button-wrapper text-left">
              <button className="btn submit-btn">Ok</button>
              <button
                className="btn close-btn"
                onClick={this.closeBtn.bind(this)}
              >
                Cancel
              </button>
            </div>
          </Modal.Footer>
        </Modal>
      </div>
    );
  }
}

export default Dashboard;
