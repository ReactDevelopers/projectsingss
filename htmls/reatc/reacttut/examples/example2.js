import React from 'react'
import ReactDOM from 'react-dom'

// function Cartoon (props) {
//     return <h2>Hello, {props.name}</h2>
// } OR

let Clock = function () {
    return <h2>Time Now: {new Date().toLocaleTimeString()}</h2>
}

class Cartoon extends React.Component {
    render() {
        return <h2>Hello, {this.props.name} on {this.props.show}</h2>
    }
}

class Show extends React.Component {
    render() {
        return <div>
            <Clock/>
            <Cartoon name='Manish' show='TechJack'/>
            <Cartoon name='Mahant' show='TechJack'/>
        </div>
    }
}

setInterval(function(){
    ReactDOM.render(
        <Show/>,
        document.getElementById('root')
    )
},1000)

