import * as React from 'react';
import {Props} from '../../features/root-props';
import Header from './Header';
import Footer from './Footer';
import * as bs from 'react-bootstrap';
import Loading from './LoaderBar';
import Breadcrumb from './Breadcrumb';
import { ReactElement } from 'react';
import {actions} from '../../features/root-action';
import API from '../../aep';
import {AuthI} from '../../models/Auth';

interface TemplateProps extends Props {

    RightSideButton?: ReactElement<any>;
}

export default class Template extends React.Component <TemplateProps> {

    componentWillMount() {

       const response = this.props.rootState.server['auth_user'];
        
        /**
         * Redirect to Home Screen when AUth User not found.
         */
        if(!this.props.helper.isLogin()) {

            this.props.dispatch(actions.auth.logoutSuccess(API.AUTH_USER));
        }
        const data: AuthI = response.response.data;
        
        if(data.role_id === 2) {
            
            const location = this.props.rootState.router.location;            
            if(location && location.pathname !== '/event') {

                this.props.history.push('/event');
            }
        }
    }
    render () {
        
        const props = this.props;
        return (
            
            <div className="tms_theme">
                <Loading {...props} />
                <Header {...props} />  
                <Breadcrumb {...props} />
                
                <bs.Grid fluid={true} className="container_wrap">
                    <bs.Grid>
                        {this.props.children}
                    </bs.Grid>
                </bs.Grid>
                <Footer/>
            </div>
        )
    }
}