import * as React from 'react';

import { Row, Col } from 'react-bootstrap';
import { AppState, AppProps } from '../app-interface';

// import PageMeta from './helpers/Meta';
import Template from './helpers/Template';
import { NavLink } from 'react-router-dom';
import appUrl from '../helper';
var FAS = require('react-fontawesome');
export interface DashboardProps extends AppProps {

}

class Dashboard extends React.Component<DashboardProps, AppState> {


	constructor(props:DashboardProps) {

		super(props);

	}

	componentWillReceiveProps(nextProps:DashboardProps) {

	
	}

	public render() {

		return (

			// <PageMeta page="dashboard" />
			<Template page="dashboard" user={this.props.user} history={this.props.history} showLoaderBar={this.props.showLoaderBar} >
	            <Row>
	                <Col md={6} sm={6} xs={12}>
	                	<div className="course-list">
							<div className="course-list-inner">
								<h2>Navigation</h2>
								<ul className="course-listings">
									<li><NavLink to={appUrl('user', false)}><FAS name="list" />Maintain Staff List</NavLink></li>
									<li><NavLink to={appUrl('course', false)}><FAS name="list" />Maintain Course List</NavLink></li>
									<li><NavLink to={appUrl('running-course', false)}><FAS name="list" />Maintain Course Run</NavLink></li>
									<li><NavLink to={appUrl('running-course-booking', false)}><FAS name="list" />Maintain Course Run Bookings</NavLink></li>
					    		</ul>								
							</div>
						</div>
	                </Col>
	                <Col md={6} sm={6} xs={12}>
	                	<div className="course-list">
							<div className="course-list-inner">
								<h2>Navigation</h2>
															
							</div>
						</div>
	                </Col>
	            </Row>
			</Template>
		);
	}

	
}

export default Dashboard;