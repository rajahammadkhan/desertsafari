<template>
    <div>
        <a class="default-btn" v-on:click.prevent="addproductToCart" style="cursor: pointer;">Add to Cart</a>sad
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
