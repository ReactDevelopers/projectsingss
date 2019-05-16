//Simple Clock
import React from 'react'
import ReactDOM from 'react-dom'

let clock = function () {
    return <h2>Time Now: {new Date().toLocaleTimeString()}</h2>
}

setInterval(function(){
    ReactDOM.render(
        clock(),
        document.getElementById('root')
    )
},1000)

