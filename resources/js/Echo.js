import store from './vuex/store';

window.Echo.join('larachat_database_chatroom')
.here(users => {
    console.log('Usuarios Online: ')
    console.log(users)
})
.joining(user => {
    console.log('Entrou: ')
    console.log(user)
})
.leaving(user => {
    console.log('Saiu: ')
    console.log(user)
})