import * as React from 'react';

import { Form, Row, Col, FormControl, Button } from 'react-bootstrap';
import { AppState, AppProps } from '../app-interface';
import Message from './Message';
import Auth from '../Auth';
import appUrl from '../helper';
import Footer from './helpers/Footer';
import PageMeta from './helpers/Meta';
import Loading from 'react-loading-bar';
import ColWithError from './helpers/ColWithError';
import CsFormGroup from './helpers/CsFormGroup';

export interface HomeProps extends AppProps {

    doLoginRequest?: ( username: string, password: string )  => Promise<string>;
}

class Home extends React.Component<HomeProps, AppState> {

    private username: HTMLInputElement;
    private password: HTMLInputElement;
    
    /**
     * In this method, we are assignin the component properties.
     * @param  props:HomeProps Interface of home
     * @return {void}
     */
    constructor(props: HomeProps) {

        super(props);

    }

    /**
     * Here, we are redirecting the user to the dashboard page, if the user is already login.
     * @return {void} 
     */
    componentWillMount() {

        let auth = new Auth();
        
        if (auth.isLogin()) {

            this.props.history.push(appUrl('/dashboard'));
        }
    }

    /**
     * Here, we are focusing on the username field after the page render.
     * @return {void} 
     */
    componentDidMount() {

        this.username.focus();
    }

    /**
     * Here, handling the login form submit request.
     * @type {void}
     */
    public  handleSubmit(e: React.SyntheticEvent<EventTarget> ): void {
        
        e.preventDefault();
        let username: string = this.username.value;
        let password: string = this.password.value;
        // console.log("this.props");
        // console.log(this.props);
        // this.validCredentails() && 
        if (typeof this.props.doLoginRequest === 'function') {
            
            this.props.doLoginRequest(username, password);
        }
    }

    /**
     * Here, checking, if the user press enter button and both field contain some value 
     * then execute the form submit function
     * @type {void}
     */
    public handleChange(e: React.KeyboardEvent<EventTarget>): void {
        
        if (e.key === 'Enter' && this.validCredentails() ) {
            
            if (typeof this.props.doLoginRequest === 'function') {
                
                let username: string = this.username.value;
                let password: string = this.password.value;
                
                this.props.doLoginRequest(username, password);
            }
        }

    }

    /**
     * Render the Home
     * @return {HTMLInputElement}
     */
    
    public render() {

        let loaderPops = {
            show: this.props.showLoaderBar,
            change: true,
            color: 'red'
        };

        let usernameProps = {

            onKeyPress: (e: React.KeyboardEvent<EventTarget>) => {this.handleChange( e ); },
            type: 'text',
            inputRef: (input: HTMLInputElement) => { this.username = input; },
            placeholder: 'PUBNET ID',
        };

        let passwordProps = {
            ...usernameProps,
            type: 'password',
            inputRef: (input: HTMLInputElement) => { this.password = input; },
            placeholder: 'Password',
        };

        const errors = this.props.errors;

        return (
            <div className="site-wrapper main-wrapper loginPage">
                <div className="navbar">
                    <div className="container">
                        <Row className="col">
                            <Col md={6} sm={6} xs={12}>
                                <div className="navbar-header">
                                    <a href={ appUrl('/') } className="navbar-brand"><img src={require('../scss/assets/images/logo.png')}/></a>
                                </div>
                            </Col>
                            <Col md={6} sm={6} xs={12}>
                                <div className="header-message">
                                    <div className="right-content">
                                        <p>PUB, Singapore’s national water agency.</p>
                                        <p className="sub-head">Managing the country’s water supply,</p>
                                        <p className="sub-head">water catchment and used water in an integrated way.</p>
                                    </div>
                                </div>
                            </Col>
                        </Row>
                    </div>
                </div>
                <div className="formContainer loginContainer">
                    <div className="container">
                        <div className="login-box">
                            <div className="login-box-inner">
                                <h3 className="login-heading text-center">TRAINING MANAGEMENT SYSTEM</h3>
                                <h4 className="login-subheading text-center">Please log into your account</h4>
                                <div className="formWrapper">
                                    <Form horizontal={true} onSubmit={e => this.handleSubmit( e )}>         
                                        <Loading {...loaderPops}/>
                                        <PageMeta page="home" />
                                        <Message message={this.props.message} isError={this.props.isError}  />                                    
                                        <CsFormGroup elementName="username" errors={errors}>
                                            <ColWithError sm={12} elementName="username" errors={errors}>
                                                <FormControl {...usernameProps} />
                                            </ColWithError>
                                        </CsFormGroup>

                                        <CsFormGroup elementName="password" errors={errors}>
                                            <ColWithError sm={12} elementName="password" errors={errors}>
                                                <FormControl {...passwordProps} />
                                            </ColWithError>
                                        </CsFormGroup>            

                                        <div className="loginBtn text-right">
                                            <Row>
                                            <Col sm={12}>
                                                <Button type="submit" disabled={this.props.isRequesting} className="btn-round">Sign in</Button>
                                            </Col>
                                            </Row>
                                        </div>
                                    </Form>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
                <Footer/>
            </div>
        );
    }

    /**
     * Checking username and password both contains some value.
     */
    private validCredentails(): boolean {

        return (this.username.value && this.password.value ) ? true : false;
    }
}
export default Home;