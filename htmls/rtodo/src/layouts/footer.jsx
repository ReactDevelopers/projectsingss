import React, { Component } from 'react'
import * as bs from 'react-bootstrap'
import {NavLink} from 'react-router-dom'
    
export default class footer extends Component {

    emailSubs(){
        console.log(window.location.href);    
    }

  render() {
    return (
        <div>
            <footer className="footer-section">
                <div className="container">
                    <bs.Row className="p-b-10">
                        <bs.Col md={8} sm={8} xs={12}>
                            <div className="footer-left-wrapper">
                                <bs.Row>
                                    <bs.Col md={4} sm={3} xs={12}>
                                        <div className="address-block">
                                            <p>Motto: We Are Anonymous
                                            Membership: Decentralized affinity group</p>
                                        </div>
                                        <div className="mail-box hidden visible-xs">
                                            <span className="mail-icon">info@seedinstitute.edu.sg</span>
                                        </div>
                                    </bs.Col>
                                    
                                </bs.Row>
                            </div>
                        </bs.Col>
                        <bs.Col md={4} sm={4} xs={12}>
                            <div className="footer-right-wrapper">
                                <bs.Row>
                                    <bs.Col md={6} sm={6} xs={12}>
                                        <div className="footer-list">
                                            <ul>
                                                <li><NavLink to="/">About Us</NavLink></li>
                                                <li><NavLink to="/">Contact Us</NavLink></li>
                                                <li><NavLink to="/">Career</NavLink></li>
                                            </ul>
                                        </div>
                                    </bs.Col>
                                    <bs.Col md={6} sm={6} xs={12}>
                                        <div className="footer-list">
                                            <ul>
                                                <li><NavLink to="/">Sitemap</NavLink></li>
                                                <li><NavLink to="/">Terms of Use</NavLink></li>
                                                <li><NavLink to="/">Privacy Policy</NavLink></li>
                                            </ul>
                                        </div>
                                    </bs.Col>
                                </bs.Row>
                            </div>
                        </bs.Col>
                    </bs.Row>
                </div>      
                <div className="bottom-footer">
                    <div className="container">
                        <bs.Row>
                            <bs.Col md={4} sm={6} xs={12}>
                                <div className="copyright-text text-left">
                                    <p>COPYRIGHT</p>
                                </div>
                            </bs.Col>
                            <bs.Col md={8} sm={6} xs={12}>
                                <div className="copyright-text text-right">
                                    <p></p>
                                </div>
                            </bs.Col>
                        </bs.Row>
                    </div>
                </div>    
            </footer> 
        </div>
     )
  }
}

