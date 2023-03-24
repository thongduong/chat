<template>
    <h1>{{ msg }}</h1>
  <input type="text" v-model="message" class="input-el" placeholder="enter message..." @keyup.enter="sendMessage">
  <button @click="sendMessage">Send</button>
    <div class="list-messages">
      <div class="message" v-for="(message, k) in list_messages" v-bind:key="k">
        <p class="m">{{ message }}</p>
      </div>
    </div>

</template>

<script>
import axios from 'axios'
import Echo from "laravel-echo";

// axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
// axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';

window.io = require('socket.io-client')
window.Echo = new Echo({
  broadcaster: 'socket.io',
  host: process.env.VUE_APP_SERVICE_URL + ':6001'
})

export default {
  name: 'ChatForm',
  props: {
    msg: String
  },
  data() {
    return {
      message: '',
      list_messages: []
    }
  },
  created() {
    window.Echo.channel('chat_database_chatroom')
        .listen('.ChatEvent', (data) => {
          console.log(data.message)
          let message = data.message
          this.list_messages.push(message)
        })
  },
  methods: {
    sendMessage() {
      axios.get(process.env.VUE_APP_SERVICE_URL + '/comment?message=' + this.message
      //     , {
      //   'message': this.message
      // }
      ).then(() => {
        // console.log(response.data.message);
        // this.list_messages.push(
        //   response.data.message,
        // )
        this.message = ''
      }).catch(error => {
        console.log(error)
      })
    }
  }
}
</script>
