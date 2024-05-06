<template>
    <div>
        <div row v-if="items == null || items.length === 0">
            <table class="table table-wishlist table-mobile" >
                <thead>
                    <tr>
                        <a href="/"><th>Back To Website</th></a>
                    </tr>
                </thead>
            </table>

            <center>
                <h3>Shopping Cart is Empty</h3>
            </center>
        </div>

        <div class="row" v-else>
            <div class="col-lg-9">

                    <!-- Activity Table -->
                    <table class="table table-cart table-mobile">
                        <thead>
                            <tr>
                                <th>Activity</th>
                                <th style="width: 120px;">Amount</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in items" :key="item.id" v-if="item.product === 'activity'">
                                <td class="product-col" v-if="item.name">
                                    <div class="product">
                                        <figure class="product-media">
                                            <a :href="link.replace('arg', item.slug)">
                                                <img :src="imageload(item)" alt="item">
                                            </a>
                                        </figure>
                                        <h3 class="product-title">
                                            <a :href="link.replace('arg', item.slug)">{{ item.name }}</a>
                                        </h3>
                                        <!-- End .product-title -->
                                    </div>
                                    <!-- End .product -->
                                </td>
                                <td class="total-col" v-if="item.name" style="text-align: right;">
                                    {{ item.activity_total_amount }}.00 AED
                                </td>
                                <td class="remove-col" v-if="item.name">
                                    <button class="btn-remove" @click="deleteFromCart(item.cart_id)">
                                        <i class="icon-close"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- End Activity Table -->

                    <!-- Visa Table -->
                    <table class="table table-cart table-mobile">
                        <thead>
                            <tr>
                                <th>Visa</th>
                                <th style="width: 120px;">Amount</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in items" :key="item.id" v-if="item.product === 'visa'">
                                <td class="product-col" v-if="item.name">
                                    <div class="product">
                                        <figure class="product-media">
                                            <a :href="visalink.replace('arg', item.slug)">
                                                <img :src="imageload(item)" alt="item">
                                            </a>
                                        </figure>
                                        <h3 class="product-title">
                                            <a :href="visalink.replace('arg', item.slug)">{{ item.name }}</a>
                                        </h3>
                                        <!-- End .product-title -->
                                    </div>
                                    <!-- End .product -->
                                </td>
                                <td class="total-col" v-if="item.name" style="text-align: right;">
                                    {{ item.visa_total_amount }}.00 AED
                                </td>
                                <td class="remove-col" v-if="item.name">
                                    <button class="btn-remove" @click="deleteFromCart(item.cart_id)">
                                        <i class="icon-close"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- End Visa Table -->
            </div><!-- End .col-lg-9 -->
            <aside class="col-lg-3">
                <div class="summary summary-cart">
                    <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                    <center>
                        <h6 class="mt-1">Subtotal</h6>
                    </center>

                    <table class="table table-summary">
                        <tbody>
                            <tr class="summary-subtotal" v-for="item in items" :key="item.id">
                                <td v-if="item.product === 'activity'">{{item.name}}</td>
                                <td v-if="item.product === 'activity'">{{item.activity_total_amount}}.00 <br> AED </td>
                                <td v-if="item.product === 'visa'">{{item.name}}</td>
                                <td v-if="item.product === 'visa'">{{item.visa_total_amount}}.00 <br> AED </td>
                            </tr>

                            <tr class="summary-total">
                                <td>Total Amount:</td>
                                <td>{{items.totalAmount}}.00 <br> AED</td>
                            </tr><!-- End .summary-total -->
                        </tbody>
                    </table><!-- End .table table-summary -->

                    <a href="/checkout" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                </div><!-- End .summary -->

                <a href="/" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
            </aside><!-- End .col-lg-3 -->
        </div> 
    </div>
</template>

<script>
    export default {
        data(){
            return {
                items: [],
            }
        },
        methods:{
            async getCartItems(){
                let response = await axios.get('/cart/get/items');
                this.items=response.data;
                console.log(this.items);
            },
            imageload(id){
                return "http://localhost/desertsafari/cms/public/uploads/"+id.featured_image;
            },
            async deleteFromCart(cart_id) {
                try {
                    await axios.delete(`/cart/${cart_id}`);

                    this.items = this.items.filter(item => item.cart_id !== id);

                } catch (error) {
                    console.error(error);
                }
                let response = await axios.get('/cart/get/items');
                this.items=response.data;

                this.$toastr.e('Product Remove in Cart');
                return;
            },

            async updateFromCart(cart_id) {
                console.log(cart_id);
            }
        },
        props:[
            "link",
            "visalink",

            ],
        created() {
              this.getCartItems();       
        }

    }
</script>




