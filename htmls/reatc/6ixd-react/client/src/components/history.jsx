import React, { Component } from "react";
import logo from "../assests/images/logo.svg";
import profileimage from "../assests/images/profileimage.svg";
import { Redirect } from "react-router-dom";
import { NavLink } from "react-router-dom";

class History extends React.Component {
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
                <h3 className="transac-name">History</h3>
              </div>
              <div className="form-wrapper-transaction">
                <div className="table-box table-responsive">
                  <div class="table table-striped" width="100%">
                    <div className="table-head">
                      <div className="table-row">
                        <div width="33.3%" className="table-cell">
                          Time
                        </div>
                        <div width="33.3%" className="table-cell">
                          Trx Id
                        </div>
                        <div width="33.3%" className="table-cell">
                          Receipt No
                        </div>
                      </div>
                    </div>
                    <div className="table-body">
                      <NavLink
                        to="/historyDetail"
                        className="table-row c-black"
                      >
                        <div className="table-cell">20:50</div>
                        <div className="table-cell">AJHNDG</div>
                        <div className="table-cell">12345</div>
                      </NavLink>
                      <NavLink
                        to="/historyDetail"
                        className="table-row c-black c-black"
                      >
                        <div className="table-cell">20:50</div>
                        <div className="table-cell">AJHNDG</div>
                        <div className="table-cell">12345</div>
                      </NavLink>
                      <NavLink
                        to="/historyDetail"
                        className="table-row c-black"
                      >
                        <div className="table-cell">20:50</div>
                        <div className="table-cell">AJHNDG</div>
                        <div className="table-cell">12345</div>
                      </NavLink>
                      <NavLink
                        to="/historyDetail"
                        className="table-row c-black"
                      >
                        <div className="table-cell">20:50</div>
                        <div className="table-cell">AJHNDG</div>
                        <div className="table-cell">12345</div>
                      </NavLink>
                      <NavLink
                        to="/historyDetail"
                        className="table-row c-black"
                      >
                        <div className="table-cell">20:50</div>
                        <div className="table-cell">AJHNDG</div>
                        <div className="table-cell">12345</div>
                      </NavLink>
                      <NavLink
                        to="/historyDetail"
                        className="table-row c-black"
                      >
                        <div className="table-cell">20:50</div>
                        <div className="table-cell">AJHNDG</div>
                        <div className="table-cell">12345</div>
                      </NavLink>
                      <NavLink
                        to="/historyDetail"
                        className="table-row c-black"
                      >
                        <div className="table-cell">20:50</div>
                        <div className="table-cell">AJHNDG</div>
                        <div className="table-cell">12345</div>
                      </NavLink>
                      <NavLink
                        to="/historyDetail"
                        className="table-row c-black"
                      >
                        <div className="table-cell">20:50</div>
                        <div className="table-cell">AJHNDG</div>
                        <div className="table-cell">12345</div>
                      </NavLink>
                      <NavLink
                        to="/historyDetail"
                        className="table-row c-black"
                      >
                        <div className="table-cell">20:50</div>
                        <div className="table-cell">AJHNDG</div>
                        <div className="table-cell">12345</div>
                      </NavLink>
                      <NavLink
                        to="/historyDetail"
                        className="table-row c-black"
                      >
                        <div className="table-cell">20:50</div>
                        <div className="table-cell">AJHNDG</div>
                        <div className="table-cell">12345</div>
                      </NavLink>
                      <NavLink
                        to="/historyDetail"
                        className="table-row c-black"
                      >
                        <div className="table-cell">20:50</div>
                        <div className="table-cell">AJHNDG</div>
                        <div className="table-cell">12345</div>
                      </NavLink>
                      <NavLink
                        to="/historyDetail"
                        className="table-row c-black"
                      >
                        <div className="table-cell">20:50</div>
                        <div className="table-cell">AJHNDG</div>
                        <div className="table-cell">12345</div>
                      </NavLink>
                      <NavLink
                        to="/historyDetail"
                        className="table-row c-black"
                      >
                        <div className="table-cell">20:50</div>
                        <div className="table-cell">AJHNDG</div>
                        <div className="table-cell">12345</div>
                      </NavLink>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    );
  }
}

export default History;
