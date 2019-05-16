import * as React from 'react';
import * as bc from 'react-bootstrap';
import { breadcrumbIntList, AppState, pageInfo } from '../../app-interface';
import Header from '../../containers/Header';
import  AdminUrl from '../../url/AdminUrl';

import Footer from './Footer';
import PageMeta from './Meta';
import { NavLink } from 'react-router-dom';
import user from '../../models/user';
import Auth from '../../Auth';
import appUrl from '../../helper';
import OverlayLoader from 'react-overlay-loading/lib/OverlayLoader';
import { push } from 'connected-react-router';
import store from '../../store';
import { History } from 'history';

export interface TemplateProps {

    page: string;
    showLoaderBar: boolean;
    breadcrumb?: breadcrumbIntList[];
    history: History;
    user: user;
    showOverlayLoader?: boolean;
}

export default class Template extends React.Component<TemplateProps, AppState> {

    public pageInfo: pageInfo;
    public breadcrumb: breadcrumbIntList[];

    constructor(props: TemplateProps) {

        super(props);

        let adminUrl = new AdminUrl();
        this.pageInfo = adminUrl.getPage(this.props.page);
        this.breadcrumb = [];

        if (typeof this.pageInfo.breadcrumb !== 'undefined' ) {
            
            let self = this;

            this.pageInfo.breadcrumb.map(function(p: string, index: number) {
                
                let page = adminUrl.getPage(p);

                self.breadcrumb.push({
                    title: page.title,
                    discription: page.metaDescription,
                    url: page.url,
                    isActive: (self.props.page === p) ? true : false
                });    
            });            
        }

        this.breadcrumb.push({
            title: this.pageInfo.title,
            discription: this.pageInfo.metaDescription,
            url: this.pageInfo.url,
            isActive: true 
        });       
    }

    componentWillMount() {

        let auth = new Auth();
        
        if (!auth.isLogin()) {

            store.dispatch(push(appUrl('/')));
        }
    }
  
    public render() {

        let show = typeof this.props.showOverlayLoader !== 'undefined' ? this.props.showOverlayLoader : false;
        
        let overLayLoaderProp = {

            color: 'red',
            loader: 'ScaleLoader',
            text: 'Loading... Please wait!',
            active: show,
            backgroundColor: 'black',
            opacity: '0.4'
        };

        return (
            <div className="tms_theme">
            <OverlayLoader {...overLayLoaderProp} />
                <PageMeta page={this.props.page} />
                <Header user={this.props.user} showLoaderBar={this.props.showLoaderBar} />
                <bc.Grid fluid={true} className="container_breadcrumb">
                    <bc.Grid>
                        <bc.Breadcrumb>
                        {this.breadcrumb.map(function(bcrumb: breadcrumbIntList, index: number) {

                            let bcrumbClass = 'breadcrumb-item ' + (bcrumb.isActive ? 'active' : '');
                            return ( 
                                
                            <li key={`LiListItem_${index}`} className={bcrumbClass} >
                                
                                {(() => {

                                 if ( ! bcrumb.isActive ) {

                                    let brcNavProps = {

                                     key: 'ListItem_' + index,
                                     to: appUrl(bcrumb.url, false),
                                     activeClassName: 'active'
                                    };

                                    return ( 
                                        <NavLink {...brcNavProps}>
                                            {bcrumb.title}
                                        </NavLink>
                                    );

                                 } else {

                                     return bcrumb.title;
                                 }                       

                                })()}
                            </li>
                            );
                        })}
                        </bc.Breadcrumb>
                    </bc.Grid>
                </bc.Grid>

                <bc.Grid fluid={true} className="container_wrap">
                    <bc.Grid>
                        {this.props.children}
                    </bc.Grid>
                </bc.Grid>
                <Footer />
            </div>
        );
    }
}