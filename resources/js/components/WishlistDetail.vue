<template>
  <div>
    <div v-if="items == null || items.length === 0">
      <table class="table table-wishlist table-mobile">
        <thead>
          <tr>
            <th>
              <a href="/">Back To Website</a>
            </th>
          </tr>
        </thead>
      </table>

      <center>
        <h3>Wishlist is Empty</h3>
      </center>
    </div>

    <div v-else>
      <table class="table table-wishlist table-mobile">
        <thead>
          <tr>
            <th>Activity</th>
            <th>Price</th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="item in items" :key="item.id">
            <td class="product-col" v-if="item.name">
              <div class="product">
                <figure class="product-media">
                  <a :href="generateLink(item.slug)">
                    <img :src="getImageUrl(item.featured_image)" alt="item">
                  </a>
                </figure>

                <h3 class="product-title">
                  <a :href="generateLink(item.slug)">{{ item.name }}</a>
                </h3>
              </div>
            </td>
            <td class="price-col" v-if="item.name"><b>{{ item.total }}</b> AED</td>
            <td class="remove-col" v-if="item.cart_id">
              <button class="btn-remove" @click="deleteFromCart(item.cart_id)">
                <i class="icon-close"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- End Products Area -->
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      items: [],
    };
  },
  methods: {
    async getWishlistItems() {
      try {
        const response = await axios.get('/wishlist/get/items');
        this.items = response.data;
        console.log(this.items);
      } catch (error) {
        console.error(error);
      }
    },
    getImageUrl(imageFileName) {
      return "http://localhost/desertsafari/cms/public/uploads/" + imageFileName;
    },
    async deleteFromCart(cart_id) {
      try {
        await axios.delete(`/wishlist/${cart_id}`);
        this.items = this.items.filter(item => item.cart_id !== cart_id);
        this.$toastr.e('Product Removed from Wishlist');
      } catch (error) {
        console.error(error);
      }
    },
    generateLink(slug) {
      return this.link.replace('arg', slug);
    },
  },
  props: {
    wishlist: {
      type: Array, // Assuming wishlist is an array of objects, adjust the type if it's different
      required: true,
    },
    link: {
      type: String,
      required: true,
    },
  },
  created() {
    this.getWishlistItems();
  },
};
</script>
