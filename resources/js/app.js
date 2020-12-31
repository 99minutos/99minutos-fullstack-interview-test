require('./bootstrap');

window.Vue = require('vue');

Vue.component('modal-commit', require('./components/ModalComponent.vue').default);
Vue.component('modal-pull', require('./components/PullRequestComponent.vue').default);
 
const app = new Vue({
  el: '#app',
  data: {
    showModal: false,
    sha: '',
    number: 0
  }, 
  methods: {
      click(sha){
        this.showModal = true;
        this.sha = sha;
      }, 
      clickPull(number){
        this.showModal = true;
        this.number = number;  
      }
  }
});

