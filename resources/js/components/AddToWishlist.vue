<template>
    <div>
        <a href="javascript:void(0)" class="btn-product-icon btn-wishlist btn-expandable" v-on:click.prevent="addproductToWishlist" >
            <span>add to wishlist</span>
        </a>
    </div>
</template>

<script>

    export default {
       data(){
        return{
            
        }
       },
        props:[
            "productId",
            "userId",
        ],
        methods:{
            async addproductToWishlist(){
                if(this.userId == 0){
                    this.$toastr.e('You Need to login, To add this product in Wishlist');
                    return;
                }               
                let response = await axios.post('/wishlist',{
                    'activity_id': this.productId
                });
                this.$root.$emit('changeInWishlist', response.data.items);
            }
          
          

        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
