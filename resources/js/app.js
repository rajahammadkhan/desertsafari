/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');
window.Vue = require('vue').default;

import Vue from 'vue'
export default new Vue();
import VueToastr from "vue-toastr";
import BootstrapVue from 'bootstrap-vue';

Vue.use(BootstrapVue);
Vue.use(VueToastr);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('add-to-cart-button', require('./components/AddToCart.vue').default);
Vue.component('add-to-cart-button-detail', require('./components/AddToCartdetail.vue').default);
Vue.component('add-to-cart-button-gift', require('./components/AddToCart_Gift.vue').default);
Vue.component('popular-products', require('./components/PopularProducts.vue').default);
Vue.component('products-component', require('./components/ProductsComponent.vue').default);
Vue.component('slider-component', require('./components/slider/SliderComponent.vue').default);
Vue.component('cart-count', require('./components/CartCount.vue').default);
Vue.component('add-to-wishlist-button', require('./components/AddToWishlist.vue').default);
Vue.component('wishlist-count', require('./components/WishlistCount.vue').default);
Vue.component('wishlist-detail', require('./components/WishlistDetail.vue').default);
Vue.component('cart-detail', require('./components/CartDetail.vue').default);
Vue.component('checkout', require('./components/Checkout.vue').default);


Vue.component('add-to-cart-form', require('./components/AddToCartForm.vue').default);
Vue.component('add-to-cart-form-visa', require('./components/AddToCartFormVisa.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data:{
        itemCount:0,
        itemwishCount:0,
        cart:[]
    },
    created() {
  bus.$on('added-to-cart', (activity) => {
    this.addToCartCount(activity);
    this.increaseCounter();
  });

  bus.$on('added-to-wishlist', (activity) => {
    this.addToWishlist(activity);
    this.increaseCounter1();
  });

  bus.$on('removed-from-wishlist', () => {
    this.decreaseCounter1();
  });
},
methods: {
  increaseCounter() {
    this.itemCount++;
  },
  increaseCounter1() {
    this.itemwishCount++;
  },
  decreaseCounter1() {
    this.itemwishCount--;
  },
  addToCartCount(activity) {
    this.cart.push(activity);
  },
  addToWishlist(activity) {
    this.wishlist.push(activity);
  },
  removeFromWishlist(index) {
    this.wishlist.splice(index, 1);
    bus.$emit('removed-from-wishlist');
  }
},
mounted() {
  if (localStorage.getItem('cart')) {
    try {
      this.cart = JSON.parse(localStorage.getItem('cart'));
      this.itemCount = this.cart.length;
    } catch (e) {
      localStorage.removeItem('cart');
    }
  }

  if (localStorage.getItem('wishlist')) {
    try {
      this.wishlist = JSON.parse(localStorage.getItem('wishlist'));
      this.itemwishCount = this.wishlist.length;
    } catch (e) {
      localStorage.removeItem('wishlist');
    }
  }
}

});
