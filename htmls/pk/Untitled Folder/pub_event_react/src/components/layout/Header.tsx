import * as React from 'react';
import {Props} from '../../features/root-props';
import * as bs from 'react-bootstrap';
import Auth, {AuthI} from '../../models/Auth';
import {actions} from '../../features/root-action';
import API from '../../aep';

export default class Header extends React.Component<Props> {
    
    constructor(props: Props) {
        super(props);
        this.logOut =  this.logOut.bind(this);
    }
    /**
     * component will update when the auth user data will change.
     * @param nextProps 
     */
    shouldComponentUpdate(nextProps: Props) {

        if(nextProps.rootState.server['auth_user'].shouldUpdate !== this.props.rootState.server['auth_user'].shouldUpdate) {
            return true;
        }
        return false;        
    }

    logOut() {
        //console.log('.,,,,,,,,,,,,,,,,,');
        this.props.callApi(API.LOGOUT);
    }

    render () {

        const server_auth_data =  this.props.rootState.server['auth_user'];
        const auth_user: AuthI = server_auth_data && server_auth_data.response && server_auth_data.response.data ? server_auth_data.response.data : {};
        const {name, pubnet_id} = auth_user;
     

        const  useuPullDownMenu = {
            bsStyle: 'default',
            noCaret: true,
            title: name ? name: '..',
            id: 'header_pull_downmenu'
        };

        return (
        
        <bs.Grid fluid={true} className="header_wrap">
            <bs.Grid>
            <bs.Row>
                <bs.Col sm={7}><h3 className="header_title left">Event MANAGEMENT SYSTEM</h3></bs.Col>
                <bs.Col sm={5} className="account-info">
                    <div className="user-options">
                        <div className="admin_name">
                            <span>
                              {name} ({pubnet_id})                          
                            </span>
                        </div>
                        <bs.DropdownButton {...useuPullDownMenu} >
                            {/* <bs.MenuItem eventKey="1"
                             onClick={(e: any) => {this.props.history.push('/my-profile')}}
                            >                               
                            <span className="icon-user assistant-icon"></span>My Profile
                              
                            </bs.MenuItem> */}
                            <bs.MenuItem eventKey="2"  onClick={this.logOut}>
                                <span className="icon-user logout-icon"></span>Log out
                            </bs.MenuItem>
                        </bs.DropdownButton>
                    </div>
                </bs.Col>
            </bs.Row>   
            </bs.Grid>
        </bs.Grid>
        )
    }

}