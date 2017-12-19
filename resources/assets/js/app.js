
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('chat-messages', require('./components/ChatMessages.vue'));
Vue.component('chat-form', require('./components/ChatForm.vue'));

const app = new Vue({
    el: '#app',

    data: {
        messages: []
    },

    created() {
        this.fetchMessages();

        Echo.private('https://pr0jectzer0.ml/chat.2')
            .listen('MessageSent', (e) => {
            this.messages.push({
            message: e.message.message,
            user: e.user
        });
    });

        Echo.connector.pusher.config.auth.headers['Authorization'] = 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHBzOi8vcHIwamVjdHplcjAubWwvYXBpL3VzZXIvbG9naW4iLCJpYXQiOjE1MTM2ODgwNzEsImV4cCI6MTUxMzY5MTY3MSwibmJmIjoxNTEzNjg4MDcxLCJqdGkiOiJXQlJjZkdWcmVsZHZjMXE1In0.jiRlAAVAGs2OiXCXc0MStUoAywUYffbpHWlxgXHZ6qc';
    },

    methods: {
        fetchMessages() {
            axios.get('https://pr0jectzer0.ml/api/messages/2?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHBzOi8vcHIwamVjdHplcjAubWwvYXBpL3VzZXIvbG9naW4iLCJpYXQiOjE1MTM2ODgwNzEsImV4cCI6MTUxMzY5MTY3MSwibmJmIjoxNTEzNjg4MDcxLCJqdGkiOiJXQlJjZkdWcmVsZHZjMXE1In0.jiRlAAVAGs2OiXCXc0MStUoAywUYffbpHWlxgXHZ6qc').then(response => {
                this.messages = response.data;
        });
        },
        addMessage(message) {
            this.messages.push(message);

            axios.post('https://pr0jectzer0.ml/api/messages/2?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHBzOi8vcHIwamVjdHplcjAubWwvYXBpL3VzZXIvbG9naW4iLCJpYXQiOjE1MTM2ODgwNzEsImV4cCI6MTUxMzY5MTY3MSwibmJmIjoxNTEzNjg4MDcxLCJqdGkiOiJXQlJjZkdWcmVsZHZjMXE1In0.jiRlAAVAGs2OiXCXc0MStUoAywUYffbpHWlxgXHZ6qc', message).then(response => {});
        }
    }
});
