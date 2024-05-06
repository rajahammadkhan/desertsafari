<template>
    <div>
        <!-- <div class="cart-btn">
            <a href="/cart"><i class='bx bx-cart-alt' style="font-size: x-large;"></i><span>{{ itemCount }}</span></a>
        </div> -->
        {{ itemCount }}
    </div>
</template>

<script>
    export default {
        data(){
            return {
                itemCount: '0',
            }
        },
        mounted() {
            this.$root.$on('changeInCart', (item) => {
                this.itemCount = item;
                console.log(item);

                this.$toastr.defaultStyle = "background-color: #2cab2c; color: white; border: 0px solid rgba(0,0,0,.1);";
                this.$toastr.s('Product Add in Cart Just 1 Quantity');
                return;
            })
        },
        methods:{
            async getCartItemsOnPageLoad(){
                let response = await axios.post('/add-to-cart');
                this.itemCount =response.data.items;
            }
        },
        created() {
            this.getCartItemsOnPageLoad();            
        },

    }
</script>
