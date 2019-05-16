import helper from 'vuejs-object-helper';

const state = {}

const actions = {

    addResponse({commit, state}, {listName, response}) {

		commit('storeResponse', { listName: listName, response: response });
	}
}

const mutations = { 
    
    storeResponse(state, {listName, response}) {
		
		helper.setProp(state, [listName, 'response'], response)
	},
}

export default {
    namespaced: true,
    state,
    actions,
    mutations
  }