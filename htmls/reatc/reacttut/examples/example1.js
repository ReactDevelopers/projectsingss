//Starter
import React from 'react'
import ReactDOM from 'react-dom'

let name = "TechJack"

let obj = {
    fname:'Manish',
    lname:'Mahant'
}

const element = <div><h1>Welcome to {name}, with {obj.fname} {obj.lname}</h1><br/><h2>Lets Play</h2></div>

function cartoon () {
    return element
}


ReactDOM.render(
    cartoon (),
    document.getElementById('root')
)
