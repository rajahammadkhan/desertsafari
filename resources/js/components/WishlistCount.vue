<template>
    <div>
        {{ itemwishCount }}
    </div>
</template>

<script>
    export default {
        data(){
            return {
                itemwishCount: '0',
            }
        },
        mounted() {
            this.$root.$on('changeInWishlist', (item) => {
                this.itemwishCount = item;
                console.log(item);
                this.$toastr.s('Add in Wishlist');
                return;
            })
        },
        methods:{
            async getCartItemsOnPageLoad(){
                let response = await axios.post('/wishlist');
                this.itemwishCount =response.data.items;
            }
        },
        created() {
            this.getCartItemsOnPageLoad();            
        },

    }
</script>
