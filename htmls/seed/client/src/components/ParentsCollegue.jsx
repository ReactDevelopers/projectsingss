import React, {Component} from "react"
import {NavLink} from 'react-router-dom'
import QuestionLanding from '../components/questionLanding'

export default class ParentsCollegue extends Component {

    render (){
        return (
            <div className="parents-collegue">
                <QuestionLanding/>            
            </div>
        )
    }
}