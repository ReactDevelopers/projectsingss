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
        <section className="transaction-wrapper">
          <div className="container">
            <div className="form-box-wrapper">
              <div className="sub-head">
                <NavLink to="/landing" className="back-link orange">
                  Back
                </NavLink>
                <h3 className="transac-name">26/11/2019</h3>
              </div>
              <div className="form-wrapper-transaction">
                <div className="table-box table-responsive">
                  <table class="table table-striped" width="100%">
                    <thead>
                      <tr>
                        <th width="30%">Time</th>
                        <th width="30%">Trx Id</th>
                        <th width="30%">Receipt No</th>
                        <th width="10%">Bill Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>20:50</td>
                        <td>AJHNDG</td>
                        <td>12345</td>
                        <td>$40.00</td>
                      </tr>
                      <tr>
                        <td>20:50</td>
                        <td>AJHNDG</td>
                        <td>12345</td>
                        <td>$40.00</td>
                      </tr>
                      <tr>
                        <td>20:50</td>
                        <td>AJHNDG</td>
                        <td>12345</td>
                        <td>$40.00</td>
                      </tr>
                      <tr>
                        <td>20:50</td>
                        <td>AJHNDG</td>
                        <td>12345</td>
                        <td>$40.00</td>
                      </tr>
                      <tr>
                        <td>20:50</td>
                        <td>AJHNDG</td>
                        <td>12345</td>
                        <td>$40.00</td>
                      </tr>
                      <tr>
                        <td>20:50</td>
                        <td>AJHNDG</td>
                        <td>12345</td>
                        <td>$40.00</td>
                      </tr>
                      <tr>
                        <td>20:50</td>
                        <td>AJHNDG</td>
                        <td>12345</td>
                        <td>$40.00</td>
                      </tr>
                      <tr>
                        <td>20:50</td>
                        <td>AJHNDG</td>
                        <td>12345</td>
                        <td>$40.00</td>
                      </tr>
                      <tr>
                        <td>20:50</td>
                        <td>AJHNDG</td>
                        <td>12345</td>
                        <td>$40.00</td>
                      </tr>
                      <tr>
                        <td>20:50</td>
                        <td>AJHNDG</td>
                        <td>12345</td>
                        <td>$40.00</td>
                      </tr>
                      <tr>
                        <td>20:50</td>
                        <td>AJHNDG</td>
                        <td>12345</td>
                        <td>$40.00</td>
                      </tr>
                      <tr>
                        <td>20:50</td>
                        <td>AJHNDG</td>
                        <td>12345</td>
                        <td>$40.00</td>
                      </tr>
                      <tr>
                        <td>20:50</td>
                        <td>AJHNDG</td>
                        <td>12345</td>
                        <td>$40.00</td>
                      </tr>
                      <tr>
                        <td>20:50</td>
                        <td>AJHNDG</td>
                        <td>12345</td>
                        <td>$40.00</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    );
  }
}

export default HistoryDetail;
