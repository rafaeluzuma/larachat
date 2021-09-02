export default {
    state: {
        userConversation: null,
        messages: []
    },

    mutations: {
        ADD_USER_CONVERSATION (state, user){
            state.userConversation = user
        },

        REMOVE_USER_CONVERSATION (state){
            state.userConversation = null
        },

        ADD_MESSAGES (state, messages){
            state.messages = messages
            console.log(messages)
        },

        ADD_MESSAGE (state, message){
            state.messages.push(message)
        },

        CLEAR_MESSAGES (state){
            state.messages = []
        }
    },

    actions: {
        getMessagesConsersation({ state,  commit}){
            commit('CLEAR_MESSAGES')
            return axios.get(`/api/v1/messages/${state.userConversation.id}`)
                    .then(response => commit('ADD_MESSAGES', response.data.data))

        }
    },

    getters: {

    }
}