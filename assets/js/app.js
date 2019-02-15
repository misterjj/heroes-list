require('../css/app.scss');

const $ = require('jquery');
import 'bootstrap';
import Vue from 'vue';
import Heroes from './vue/heroes-list.vue';

let app = new Vue({
  el: '#app',
  components: {
    'heroes-list' : Heroes
  }
});