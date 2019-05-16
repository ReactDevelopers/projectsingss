import React, { Component } from "react";
import swal from 'sweetalert';
import './index.css';
import axios from 'axios';


 
class Contact extends Component {

  constructor() {
    super();
    this.state = {
      fields: {},
      errors: {},
      username: '',
      emailid: '',
    }

    this.handleChange = this.handleChange.bind(this);
    this.submituserRegistrationForm = this.submituserRegistrationForm.bind(this);

  };

  handleChange(e) {
    let fields = this.state.fields;
    fields[e.target.name] = e.target.value;
    this.setState({
      fields
    });

  }

  submituserRegistrationForm(e) {
    e.preventDefault();
    if (this.validateForm()) {
      var data = {
            username: this.state.fields.username,
            emailid: this.state.fields.emailid
        }
      console.log(data);
      console.log('##');
      axios({
            method: 'post',
                url: "http://localhost:3001/myaction",
                data: data,
                crossDomain: true,
                accept: 'application/json',
            //     headers : {
            //     'Content-Type': 'application/json'
            // }
         })
        .then(function (response) {
          console.log(response);
            swal({
                title: "Contact Form submitted1!",
                icon: "success",
                button: "Ok",
              })
        })
        .catch(function (response) {
            swal({
                title: "Contact Form not Submitted2!",
                icon: "error",
                button: "Ok",
              })
        });
      /*fetch("http://localhost:3001/myaction", {
            accept: 'application/json',
            method: 'POST',
            // headers: {'Content-Type': 'application/json'},
            // credentials: false,
            mode: "cors",
            body: JSON.stringify(data)
        }).then(function(response) {
            if (response.status >= 400) {
              throw new Error("Bad response from server");
            }
            console.log(response);
            return response.json();
        }).then(function(data) {
            console.log(data)    
            if(data == "success"){
               this.setState({msg: "Thanks for registering"});  
            }
        }).catch(function(err) {
            console.log(err)
        });*/
      // return fetch(`/api/books?firstName=${query}`, {
      //   accept: 'application/json',
      // }).then(checkStatus)
      //   .then(parseJSON);
        // let fields = {};
        // fields["username"] = "";
        // fields["emailid"] = "";
        // fields["mobileno"] = "";
        // fields["password"] = "";
        // this.setState({fields:fields});
        this.handleSubmit = this.handleSubmit.bind(this)
        swal({
              title: "Contact Form submitted!",
              icon: "success",
              button: "Ok",
            })
        alert("Form submitted");
    }

  }

  handleSubmit(event) {
        event.preventDefault()
        var data = {
            username: this.state.username,
            emailid: this.state.emailid
        }
        console.log(data)
        console.log('####done######')
        // fetch("/users/new", {
        //     method: 'POST',
        //     headers: {'Content-Type': 'application/json'},
        //     body: JSON.stringify(data)
        // }).then(function(response) {
        //     if (response.status >= 400) {
        //       throw new Error("Bad response from server");
        //     }
        //     return response.json();
        // }).then(function(data) {
        //     console.log(data)    
        //     if(data == "success"){
        //        this.setState({msg: "Thanks for registering"});  
        //     }
        // }).catch(function(err) {
        //     console.log(err)
        // });
    }

  validateForm() {

    let fields = this.state.fields;
    let errors = {};
    let formIsValid = true;

    if (!fields["username"]) {
      formIsValid = false;
      errors["username"] = "*Please enter your username.";
    }

    if (typeof fields["username"] !== "undefined") {
      if (!fields["username"].match(/^[a-zA-Z ]*$/)) {
        formIsValid = false;
        errors["username"] = "*Please enter alphabet characters only.";
      }
    }

    if (!fields["emailid"]) {
      formIsValid = false;
      errors["emailid"] = "*Please enter your email-ID.";
    }

    if (typeof fields["emailid"] !== "undefined") {
      //regular expression for email validation
      var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
      if (!pattern.test(fields["emailid"])) {
        formIsValid = false;
        errors["emailid"] = "*Please enter valid email-ID.";
      }
    }

    if (!fields["mobileno"]) {
      formIsValid = false;
      errors["mobileno"] = "*Please enter your mobile no.";
    }

    if (typeof fields["mobileno"] !== "undefined") {
      if (!fields["mobileno"].match(/^[0-9]{10}$/)) {
        formIsValid = false;
        errors["mobileno"] = "*Please enter valid mobile no.";
      }
    }

    if (!fields["password"]) {
      formIsValid = false;
      errors["password"] = "*Please enter your password.";
    }

    if (typeof fields["password"] !== "undefined") {
      if (!fields["password"].match(/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%&]).*$/)) {
        formIsValid = false;
        errors["password"] = "*Please enter secure and strong password.";
      }
    }

    this.setState({
      errors: errors
    });
    return formIsValid;


  }
  render() {
    return (
      <div>
        <h2>GOT QUESTIONS?</h2>
        <p>The easiest thing to do is post on our <a href="javascript:void(0);">forums</a>.
        </p>
      <div id="main-registration-container">
         <div id="register">
            <h3>Registration page</h3>
            <form method="post"  name="userRegistrationForm"  onSubmit= {this.submituserRegistrationForm} >
            <label>Name</label>
            <input type="text" name="username" value={this.state.fields.username  || ''} onChange={this.handleChange} />
            <div className="errorMsg c-pink">{this.state.errors.username}</div>
            <label>Email ID:</label>
            <input type="text" name="emailid" value={this.state.fields.emailid  || ''} onChange={this.handleChange}  />
            <div className="errorMsg c-pink">{this.state.errors.emailid}</div>
            <label>Mobile No:</label>
            <input type="text" name="mobileno" value={this.state.fields.mobileno  || ''} onChange={this.handleChange}   />
            <div className="errorMsg c-pink">{this.state.errors.mobileno}</div>
            <label>Password</label>
            <input type="password" name="password" value={this.state.fields.password  || ''} onChange={this.handleChange} />
            <div className="errorMsg c-pink">{this.state.errors.password}</div>
            <input type="submit" className="button"  value="Register"/>
            </form>
        </div>
    </div>
      </div>
    );
  }
}
 
export default Contact;

