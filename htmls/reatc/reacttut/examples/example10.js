//Celsius to Fahrenheit Conversion System With Lifting Up
import React from 'react'
import ReactDOM from 'react-dom'

class Calculator extends React.Component {
    constructor(props){
        super(props);
        this.state = {scale : 'c',temp : 0}
    }

    handleCelcius = (e) => {
        this.setState({
            scale : 'c',
            temp : e.target.value
        })
    }

    handleFahrenheit = (e) => {
        this.setState({
            scale : 'f',
            temp : e.target.value
        })
    }

    render() {
        const temp = this.state.temp
        const scale = this.state.scale
        const celcius = scale === 'c' ? temp : convert(temp,toCelcius);
        const fahrenheit = scale === 'f' ? temp : convert(temp,toFahrenheit);
        return(
            <div>
                <Inputs scalename="Celcius" value={celcius} func={this.handleCelcius}/>
                <Inputs scalename="Fahrenheit" value={fahrenheit} func={this.handleFahrenheit}/>
            </div>
        )
    }
}

function convert(temp,convertFunction) {
    return convertFunction(temp);
}

function toCelcius(fahrenheit){
    return (fahrenheit-32)*5/9;
}

function toFahrenheit(celcius){
    return (celcius*9/5) +32;
}

class Inputs extends React.Component {
    render() {
        return (
            <fieldset>
                <legend>Scale {this.props.scalename}</legend>
                <input value={this.props.value} onChange={this.props.func}/>
            </fieldset>
        )
    }
}

ReactDOM.render(
    <Calculator />,
    document.getElementById('root')
)