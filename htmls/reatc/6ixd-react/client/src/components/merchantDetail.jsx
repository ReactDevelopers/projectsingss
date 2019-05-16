import React, { Component } from "react";
import logo from "../assests/images/logo.svg";
import profileimage from "../assests/images/profileimage.svg";
import { Formik, Field, Form, resetForm } from "formik";
import inputField from "../helpers/textField";
import { Button, ButtonToolbar, Modal } from "react-bootstrap";
import * as Yup from "yup";
import { NavLink } from "react-router-dom";
import { Redirect } from "react-router-dom";

class MerchantDetail extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      redirect: false,
      show: false,
      amount: ""
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

  logOut() {
    localStorage.setItem("userData", "");
    localStorage.clear();
    this.setState({
      redirect: true
    });
  }

  render() {
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
        <section className="transaction-wrapper">
          <div className="container">
            <div className="form-box-wrapper">
              <div className="sub-head">
                <NavLink to="/landing" className="orange back-link">
                  Back
                </NavLink>
                <h3 className="transac-name">Submit Transaction</h3>
              </div>
              <div className="form-wrapper-transaction">
                <div className="profile-image-wrapper merchaant-wrapper">
                  <span className="profile-image">CD</span>
                  <div className="block-content">
                    <span>00001</span>
                    <h3>Charlie Deets</h3>
                  </div>
                </div>
                <div className="form-wrapper inner-box">
                  <Formik
                    initialValues={{
                      billamount: "",
                      billreceipt: ""
                    }}
                    onSubmit={(values, { resetForm }) => {
                      console.log(values);
                      if (values.billamount == "" && values.billreceipt == "") {
                        this.setState({
                          show: false
                        });
                      } else {
                        this.setState({
                          amount: values.billamount
                        });
                      }
                    }}
                    validationSchema={Yup.object().shape({
                      billamount: Yup.string().required(
                        "Store Id is a required field."
                      ),
                      billreceipt: Yup.string().required(
                        "Password is a required field."
                      )
                    })}
                    render={({
                      errors,
                      touched,
                      handleSubmit,
                      setFieldValue,
                      values
                    }) => (
                      <form onSubmit={handleSubmit}>
                        <div className="row">
                          <div className="col-md-6 col-sm-6 col-xs-12">
                            <div className="form-group storeid-group merchant-group">
                              <label className="label">
                                ENTER BILL AMOUNT.
                              </label>
                              <Field
                                type="text"
                                label="StoreId"
                                name="billamount"
                                component={inputField}
                              />
                            </div>
                          </div>
                          <div className="col-md-6 col-sm-6 col-xs-12">
                            <div className="form-group m-b-20 merchant-group">
                              <label className="label">ENTER RECEIPT NO.</label>
                              <Field
                                type="text"
                                label="Password"
                                name="billreceipt"
                                component={inputField}
                              />
                            </div>
                          </div>
                        </div>
                        <div className="login-form-btn merchant-btn">
                          <button
                            type="submit"
                            className="btn"
                            onClick={this.showPop.bind(this)}
                          >
                            Submit
                          </button>
                          <button type="submit" className="btn">
                            Cancel
                          </button>
                        </div>
                      </form>
                    )}
                  />
                </div>
              </div>
            </div>
          </div>
        </section>

        <Modal show={this.state.show} className="transaction-poup">
          <Modal.Header className="no-border">
            <Modal.Title className="text-center">
              <h3>Submit Transaction</h3>
            </Modal.Title>
          </Modal.Header>

          <Modal.Body className="body-wrapper form-wrapper">
            <div className="amount-wrapper m-b-0 text-center">
              <h3>
                Bill Amount :{" "}
                <span className="dollar-price">{this.state.amount}</span>
              </h3>
            </div>
          </Modal.Body>

          <Modal.Footer className="no-border">
            <div className="button-group footer-button-wrapper amount-footer text-center">
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

export default MerchantDetail;
