//Creating List Items
import React from 'react'
import ReactDOM from 'react-dom'

const cartoons = ['Tom','Alladin','Bleach','Bleach']

//const toons = cartoons.map((c,i) => <li key={i}>{c}</li>)

function Toonlist(props){
    const list = props.cartoons
    return <ul>{
        list.map((c,i) => <li key={i}>{c}</li>)
    }</ul>
}

ReactDOM.render(
    <Toonlist cartoons={cartoons}/>,
    document.getElementById('root')
)

// ReactDOM.render(
//     <ul>{toons}</ul>,
//     document.getElementById('root')
// )


