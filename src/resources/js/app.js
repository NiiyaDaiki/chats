/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
Vue.use(require('vue-chat-scroll'));

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('chat-component', require('./components/ChatComponent.vue').default);
import ChatComponent from './components/ChatComponent.vue'
import MessageComponent from './components/MessageComponent.vue'
import BalloonComponent from './components/BalloonComponent.vue'
import OpponentBalloonComponent from './components/OpponentBalloonComponent.vue'
import OpponentFaceComponent from './components/OpponentFaceComponent.vue'
import IsTypingComponent from './components/IsTypingComponent.vue'
import ImageUploadComponent from './components/ImageUploadComponent.vue'
import SnsLogoComponent from './components/SnsLogoComponent.vue'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components: {
        ChatComponent,
        MessageComponent,
        BalloonComponent,
        OpponentBalloonComponent,
        OpponentFaceComponent,
        IsTypingComponent,
        ImageUploadComponent,
        SnsLogoComponent
    },
    data: {
        showModal: false
    },
    methods: {
        openModal() {
            this.showModal = true
        },
        closeModal() {
            this.showModal = false
        }
    }
});
