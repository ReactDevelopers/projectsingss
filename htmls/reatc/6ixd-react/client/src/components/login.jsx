import React, {Component} from 'react';
import logo from '../assests/images/logo.svg'
import { Formik , Field, Form, resetForm} from "formik";
import inputField from '../helpers/textField'
import * as Yup from 'yup';
import {PostData} from '../service/PostData';
import {Redirect} from 'react-router-dom'
import { NavLink } from 'react-router-dom'

class Login extends React.Component {

    constructor(props){
        super(props)
            this.state = {
                password : '',
                storeid : '',
                redirectToReferrer: false,
                errorMessage : ''
            }
    }

    submitForm(values){
        
        if(values.storeid && values.storeid){
            var apiData = {
                storeid : values.storeid.toUpperCase(),
                password : values.password
            }

            PostData('store-login',apiData).then((result) => {
                    let responseJson = result;
                    console.log(responseJson);
                    if(responseJson.success == true){
                        localStorage.setItem("userData","true");
                        this.setState({redirectToReferrer: true});
                        this.setState({
                            errorMessage : ''
                        })
                    } 
                    else{
                        this.setState({
                            errorMessage : responseJson.message
                        })
                    }
            });
        }
    }

    render() {    

        if(this.state.redirectToReferrer || localStorage.getItem("userData") == "true" ){
            return ( 
                <Redirect to={'/landing'}/>)
        }

        return(
            <div className="login-body">
                    <div className="login-form-wrapper">
                    <div className="logo-box text-center">
                        <img src={logo} alt="Logo"/>
                    </div>
                    <h2 className="signin-heading text-center m-b-0 m-t-0">Store Sign In</h2>
                        <div className="error-message text-center">
                            <label className="c-pink">{this.state.errorMessage}</label>
                        </div>
                    <div className="form-wrapper">
                        <Formik
                            initialValues={{
                                storeid: "",
                                password : "",
                            }}
                            onSubmit = {(values , {resetForm}) => { 
                                console.log(values);

                                this.setState({
                                    password : values.storeid,
                                    storeid : values.password
                                })

                                this.submitForm(values);

                            }}

                            validationSchema= {Yup.object().shape({
                                storeid: Yup.string().required('Store Id is a required field.'),
                                password : Yup.string().required('Password is a required field.')
                            })}

                            render={({  errors, touched, handleSubmit, setFieldValue, values }) => (   
                                <form onSubmit={handleSubmit}>
                                            <div className="form-group storeid-group">
                                                <label className="label">Store Id</label>
                                                <Field type="text" label="StoreId"  name="storeid" component={inputField}/>
                                            </div>
                                       
                                            <div className="form-group m-b-20">
                                                <label className="label">Password</label>
                                                <Field type="password" label="Password"  name="password" component={inputField}/>
                                            </div>
                                    <div className="login-form-btn text-center">
                                        <button type="submit" className="btn">Log In</button>
                                    </div>
                                </form>
                            )} />
                    </div>
                    </div>
            </div>
        )
    }
}



export default Login