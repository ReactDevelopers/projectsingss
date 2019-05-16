import { LOG_IN }  from '../actions/action'

const initialState = {
    item  : []
}

export default function(state = initialState, action){
    switch(action.type){
        case LOG_IN : 

        return {
       
        }

        default:
        return state
    }
}