import * as React from 'react';
import * as bc from 'react-bootstrap';
import user from '../../models/user';
import Loading from 'react-loading-bar';
import { AppState } from '../../app-interface';

export interface HeaderProps {

    user: user;
    doLogOutRequest?: ()  => Promise<string>;
    showLoaderBar: boolean;
}

// export interface HeaderState {

//  user: user;
//  message?:string;
//  showLoaderBar:boolean;
// }

export default class Header extends React.Component<HeaderProps , AppState> {
    
    constructor(props: HeaderProps) {
        super(props);
    }

    public render() {   

        let useuPullDownMenu = {
            bsStyle: 'default',
            noCaret: true,
            title: this.props.user.name ? this.props.user.name : '',
            id: 'header_pull_downmenu'
        };

        return (
        <bc.Grid fluid={true} className="header_wrap">
            <bc.Grid>
            <bc.Row>
                <bc.Col sm={7}><h3 className="header_title left">TRAINING MANAGEMENT SYSTEM</h3></bc.Col>
                <bc.Col sm={5} className="account-info">
                    <div className="user-options">
                        <div className="admin_name">
                            <span>
                              {this.props.user.name ? this.props.user.name : '...'} ({this.props.user.pubnet_id ? this.props.user.pubnet_id : '...'})                          
                            </span>
                        </div>
                        <bc.DropdownButton {...useuPullDownMenu} >
                            <bc.MenuItem eventKey="1"><span className="icon-user assistant-icon"></span>My Profile</bc.MenuItem>
                            <bc.MenuItem eventKey="2" onClick={e => this.logOut( e )}><span className="icon-user logout-icon"></span>Log out</bc.MenuItem>
                        </bc.DropdownButton>
                    </div>
                </bc.Col>
            </bc.Row>   
            </bc.Grid>      
            
            <Loading show={this.props.showLoaderBar} change={true} color="red" />
            
        </bc.Grid>
         
        );
    }

    private logOut(e: React.MouseEvent<EventTarget>): void  {
        
        e.preventDefault();
        
        if (typeof this.props.doLogOutRequest !== 'undefined') {

            this.props.doLogOutRequest();
        }
    }
}