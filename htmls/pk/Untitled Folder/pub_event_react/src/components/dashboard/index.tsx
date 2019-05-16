import * as React from 'react';
import {Props, mapDispatchToProps, mapStateToProps} from '../../features/root-props';
import Template from '../layout/Template';
import  {connect } from 'react-redux';
import { Row, Col } from 'react-bootstrap';
import { NavLink } from 'react-router-dom';
var FAS = require('react-fontawesome');

class Dashboard extends React.Component <Props> {

    render() {

        return (
            <Template {...this.props} >
                <Row>
                <Col md={6} sm={6} xs={12}>
                	<div className="course-list">
						<div className="course-list-inner">
							<h2>ACTIONS</h2>
							<ul className="course-listings">
								
								<li><NavLink to="/event"><FAS name=""  className="list-view-icon"/>Show All Events</NavLink></li>
                                <li><NavLink to="/event_group"><FAS name=""  className="list-view-icon"/>Show All Events Group</NavLink></li>
                                <li><NavLink to="/user"><FAS name=""  className="list-view-icon"/>Show All User</NavLink></li>
								<li><NavLink to="/group-email"><FAS name=""  className="list-view-icon"/>Group Email</NavLink></li>
								<li><NavLink to="/audit-trail"><FAS name=""  className="list-view-icon"/>Audit Trails</NavLink></li>
								<li><NavLink to="/email-log"><FAS name=""  className="list-view-icon"/>Email Log</NavLink></li>
				    		</ul>								
						</div>
					</div>
                </Col>
                <Col md={6} sm={6} xs={12}>
                	<div className="course-list">
						<div className="course-list-inner">
							<h2>Email Template</h2>
							<ul className="course-listings">	
								<li><NavLink to="/email_template/1"><FAS name="" className="course-booking-icon"/>Event Email Template</NavLink></li>					
								<li><NavLink to="/email_template/2"><FAS name="" className="course-booking-icon"/>Group Events Email Template</NavLink></li>
								<li><NavLink to="/email_template/3"><FAS name="" className="course-booking-icon"/>Initial Event Email Template</NavLink></li>
								<li><NavLink to="/send-initail-email"><FAS name="" className="course-booking-icon"/>Send Initial Event Email</NavLink></li>					
								<li><NavLink to="/config"><FAS name="" className="course-booking-icon"/>Config</NavLink></li>					
							</ul>
						</div>
					</div>
                </Col>
            </Row>
            </Template>
        )
    }
}

export default connect(mapStateToProps, mapDispatchToProps)(Dashboard)