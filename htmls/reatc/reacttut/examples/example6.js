//Switch Between Two Components
import React, { Component } from 'react'

import ReactDOM from 'react-dom'

function Message(props){
    if(props.value){
        return <h1>This is default message</h1>
    }
    return <h1>This is event message</h1>
}

class Btn extends Component {

    constructor(props){
        super(props);
        this.state = {value : true};
    }

    handleClick = (e) => {
        this.setState({
            value : !this.state.value
        })
    }

    render() {
        return (
            <div>
                <button onClick={this.handleClick}>Change The Message</button>
                <Message value={this.state.value}/>
            </div>
        )
    }
}

ReactDOM.render(
    <Btn/>,
    document.getElementById('root')
)


