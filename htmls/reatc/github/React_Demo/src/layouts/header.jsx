import React, { Component } from 'react'
import * as bs from 'react-bootstrap'
import {NavLink} from 'react-router-dom'

export default class Header extends Component {
  render() {
    return (
        <header className="header-section header">
            <bs.Navbar>
              <bs.Navbar.Header>
                    <bs.Navbar.Brand>
                    </bs.Navbar.Brand>
                </bs.Navbar.Header>
                <bs.Nav className="inner-navbar">
						<bs.NavItem eventKey={1}  className="prof-link">
								<NavLink to="/">HOME</NavLink>
						</bs.NavItem>
            <bs.NavItem eventKey={2} >
            		<NavLink to="/aboutUs">ABOUT</NavLink>
						</bs.NavItem>
                </bs.Nav>
            </bs.Navbar>
        </header>
     )
  }
}

