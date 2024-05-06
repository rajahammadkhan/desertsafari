<template>
    <div>
        <!-- <button class="btn-product btn-cart" v-on:click.prevent="addproductToCart" style="background: transparent;">
            add to cart
        </button>  -->       
        <button type="submit" class="btn-product btn-cart" id="btn-cart_hover" v-on:click.prevent="addproductToCart">Add to Cart</button>
    </div>
</template>

<script>

    export default {
       data(){
        return{
            
        }
       },
        props:[
            "activityId",
            "userId",
        ],
        methods:{
            async addproductToCart(){
                if(this.userId == 0){
                    this.$toastr.e('You Need to login, To add this product in Cart');
                    
                    return;
                }               
                let response = await axios.post('/cart',{
                    'activity_id': this.activityId
                });
                this.$root.$emit('changeInCart', response.data.items);
            }
          
          

        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
