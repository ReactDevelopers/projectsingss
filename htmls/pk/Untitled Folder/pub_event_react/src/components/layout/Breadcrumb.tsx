import * as React from 'react';
import {Props, mapDispatchToProps, mapStateToProps} from '../../features/root-props';
import Template from '../layout/Template';
import  {connect } from 'react-redux';
import * as bs from 'react-bootstrap';
import { NavLink } from 'react-router-dom';
var FAS = require('react-fontawesome');
import { ReactElement } from 'react';

interface BreadcrumbProps extends Props {

    RightSideButton?: ReactElement<any>;
}
class Breadcrumb extends React.Component <BreadcrumbProps> {

    shouldComponentUpdate(nextProp: Props) {

        if(this.props.rootState.router.location && nextProp.rootState.router.location 
            && this.props.rootState.router.location.pathname !==  nextProp.rootState.router.location.pathname ){
                return true;
        }
        return false;
    }

    render() {
        const {RightSideButton, rootState: {router}} = this.props;
        const pathname = router && router.location ? router.location.pathname : null;
        const response = this.props.rootState.server['auth_user'];
        const auth: [{[key: string]: any}] = response.response.data;

        return (
            <bs.Grid fluid={true} className="container_breadcrumb">
                <bs.Grid>
                    <bs.Row>
                        <bs.Col sm={10}>
                            <bs.Breadcrumb>
                                {auth && auth.role_id ===1 ?<li className="breadcrumb-item"><NavLink to="/dashboard" activeClassName="active" >DashBoard</NavLink></li> : null}
                                {this.props.breadcrumb && this.props.breadcrumb.map((v, k) => (
                                    <li key={`LiListItem_${k}`} className={ `breadcrumb-item ${pathname === v.url ? 'active':''}`} >
                                        {pathname !== v.url ? <NavLink to={v.url} activeClassName="active" key={`breadcrumb${k}`} >{v.title}</NavLink> :
                                            v.title }
                                    </li>
                                ))}
                            </bs.Breadcrumb>
                        </bs.Col>

                        {RightSideButton ? <bs.Col sm={2}>{RightSideButton }</bs.Col> : null}
                        
                    </bs.Row >
                </bs.Grid>
            </bs.Grid>
        )       
                            
    }
}
export default Breadcrumb;