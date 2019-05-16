//Incrementing Values on click events
import React, { Component } from 'react'

import ReactDOM from 'react-dom'

class INC extends Component {

    constructor(props){
        super(props);
        this.state = {counter:0};
        //this.increment = this.increment.bind(this);
    }

    incrementnormal(e) {
        e.preventDefault();
        this.setState({
            counter : this.state.counter+1
        })
    }

    incrementarrow = (e) => {
        e.preventDefault();
        this.setState({
            counter : this.state.counter+1
        })
    }

    render() {
        //return <a href="http://www.techjack.biz" onClick={(e)=>this.incrementnormal(e)}>Value is: {this.state.counter}</a>
        return <button href="http://www.techjack.biz" onClick={this.incrementarrow}>Value is: {this.state.counter}</button>
    }
}

ReactDOM.render(
    <INC/>,
    document.getElementById('root')
)


