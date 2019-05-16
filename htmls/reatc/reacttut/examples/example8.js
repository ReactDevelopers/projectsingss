//Handle Form Data
import React from 'react'
import ReactDOM from 'react-dom'

class Formtest extends React.Component {
    constructor(props){
        super(props);
        this.state = {
            value : ''
            //Forcheckbox
            // value : false
        }
    }

    handleSubmit = (e) => {
        e.preventDefault();
        console.log(this.state.value)
    }

    handleChange = (e) => {
        this.setState({
            value : e.target.value
            //For Checkbox
            // value : !this.state.value
        })
    }

    render() {
        return(
            <form onSubmit={this.handleSubmit}>
                <input type="text" value={this.state.value} onChange={this.handleChange}></input>
                {/* <textarea value={this.state.textarea} onChange={this.handleChange}/> */}
                {/* 
                    <label>Checkbox</label>
                    <input type="checkbox" value={this.state.value} onChange={this.handleChange}></input> 
                
                */}
                {/* 
                    <label>Select</label>
                    <select value={this.state.value} onChange={this.handleChange}>
                        <option value="1">First</option>
                        <option value="2">Second</option>
                    </select>
                    <input type="checkbox" value={this.state.value} onChange={this.handleChange}></input> 
                
                */}
                <input type="submit" value="Go Ahead"></input>
            </form>
        )
    }
}

ReactDOM.render(
    <Formtest />,
    document.getElementById('root')
)


