import React, { Component } from 'react'
import Header from '../layouts/header'
import Footer from '../layouts/footer'
import {NavLink} from 'react-router-dom'

export default class Home extends React.Component {

    componentDidMount() {
        window.scrollTo(0,0);
    }

    
    render() {
        return (
        <div className="home-section bg-Gray">
            <Header/>
            <section className="landing-banner-section">
                <div className="owl-carousel-section">
                    <div className="container">
                        <div className="banner-head">
                            <h2>Latest News</h2>
                        </div>
                    </div>
                </div>
            </section>
            <section className="childhood-section container">
                <div className="flex-wrapper">
                    <div className="earlychildood">
                        <div className="childhoodcontent">
                            <div className="content-wrapper">
                                <h2>Trending</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <h3 id="projects">Projects</h3>

                <p><strong><a href="https://directory.weill.cornell.edu">Web Directory</a></strong> - Public listing of people, departments, and services</p>

                <ul>
                  <li>Upgrade from Rails 4.1 to 5.2</li>
                  <li>Add departments and services to original app with only people</li>
                  <li>Move application from on-premise servers to AWS</li>
                  <li>Improve integration with Java UnboundID LDAP SDK library and JRuby</li>
                  <li>Improve page loading through caching and code refactoring</li>
                  <li>Update styles from Boostrap v3 to v4</li>
                </ul>

                <p><strong><a href="https://github.com/wcmc-its/wcm-styles">WCM Styles</a></strong> - CDN-delivered shared custom assets</p>

                <ul>
                  <li>Lead my initiative to extract shared styles and utilize free CDN hosting from <a href="https://www.jsdelivr.com">JSDelivr</a></li>
                  <li>Use Webpack to manage external and custom dependencies and package assets</li>
                </ul>

                <p><strong><a href="https://seedlr.com">Seedlr</a></strong> - Share positive thoughts.</p>

                <ul className="list-plus">
                  <li>Coordinate with remote team across geographic divide with Trello, WhatsApp, Git, and Bitbucket</li>
                  <li>Build out new features including data models and UI from an InVision app</li>
                  <li>Integrate with payment system and mail marketing APIs</li>
                  <li>Use JQuery and custom JavaScript to enhance front-end with asynchronous AJAX requests</li>
                </ul>


                <p><strong>Constant Contact, New York, NY</strong>
                Software Engineer, October 2016 - March 2017</p>

                <ul className="list-plus">
                <li>Work on a small team of engineers that works closely with the sales and product teams</li>
                <li>Engage in agile development including team feature planning with Jira</li>
                <li>Develop and maintain three Rails apps that advertise on Facebook for small businesses and nonprofits</li>
                <li>Ensure high code quality with Git, CodeClimate, and CircleCI</li>
                <li>Practice test-driven development with RSpec and Capybara in comprehensive test suites</li>
                <li>Deploy, monitor and debug production apps through Heroku, Honeybadger, Jenkins, New Relic, and Splunk</li>
                </ul>

                <p><strong>Flatiron School, New York, NY</strong>
                Online Instructor, May 2016 - October 2016</p>

                <ul className="list-plus">
                <li>Assisted students learning full stack web development with Ruby on Rails and JavaScript</li>
                <li>Fielded student coding and development environment questions</li>
                <li>Triaged issues with the Learn integrated development environment</li>
                </ul>

                <p><strong>East Bronx Academy, Bronx, NY</strong>
                Teacher and Solutions Architect, Aug 2008 - September 2016</p>

                <ul className="list-plus">
                <li>Designed and taught year-long curriculum for computer science and music in grades 6-12</li>
                <li>Administered Google Apps for Education account with over 800 active users</li>
                <li>Wrote shell scripts and custom OS images to automate Linux desktop deployments</li>
                <li>Honored by Academy for Teachers for innovation as a computer science educator</li>
                <li>Commissioned by PERC to create digital resources for the Exploring Computer Science curriculum</li>
                <li>Commissioned by New Visions to create Google Apps for School Operations screen-cast tutorials</li>
                </ul>


            </section>
            <Footer/>
        </div>
        )
    }
}
