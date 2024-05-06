<template>
    <div>
        <div class="products-add-to-cart">
            <div class="input-counter">
                <input type="hidden" name="thumbnail" id="thumbnail" v-model="gifts.thumbnail">
                <input type="hidden" name="card_id" id="card_id" v-model="gifts.id">
                <input type="hidden" name="sku_no" id="sku_no" v-model="gifts.sku">
                <input type="hidden" name="expiry_date" id="expiry_date" v-model="gifts.expire_date">
                <label>Card Value <em style="color: red;">*</em></label>
                <select name="price" id="price" v-model="templatePrice" class="nice-select" style="width: 100%;">
                    <option>Choose an Amount</option>
                    <option :value="gifts.price">AED {{gifts.price}}.00</option>
                </select>
                <br>

                <label>Template <em style="color: red;">*</em></label>
                <select name="template" id="template" v-model="templateName" class="nice-select" style="width: 100%;">
                    <option>Choose an Template</option>
                    <option :value="gifts.name">{{gifts.name}}</option>
                </select>
                <br>

                <label>Sender Name <em style="color: red;">*</em></label>
                <input type="text" placeholder="Sender Name" name="sender_name" id="sender_name" style="text-align: left;padding: 20px; font-weight: 200;" v-model="senderName" required>
                <br>

                <label>Recipient Name <em style="color: red;">*</em></label>
                <input type="text" placeholder="Recipient Name" name="recipient_name" id="recipient_name" style="text-align: left;padding: 20px; font-weight: 200;" v-model="recipientName">
                <br>

                <label>Sender Email <em style="color: red;">*</em></label>
                <input type="email" placeholder="Sender Email" name="sender_email" id="sender_email" style="text-align: left;padding: 20px; font-weight: 200;" v-model="senderEmail" required>
                <br>

                <label>Recipient Email <em style="color: red;">*</em></label>
                <input type="email" placeholder="Recipient Email" name="recipient_email" id="recipient_email" style="text-align: left;padding: 20px; font-weight: 200;" v-model="recipientEmail">
                <br>

                <label>Message <em style="color: red;">*</em></label>
                <input type="text" placeholder="Message" name="message" id="message" style="text-align: left;padding: 20px; font-weight: 200;" v-model="message">
                <br>

                <label>Delivery Date <em style="color: red;">*</em></label>
                <input type="date" placeholder="Delivery Date" name="delivery_date" id="delivery_date" style="text-align: left;padding: 20px; font-weight: 200;" v-model="deliveryDate">
            </div>

        </div>
        <a class="default-btn" v-on:click.prevent="addproductToCart" 
        style="cursor: pointer;"> Add to Cart</a>
    </div>
</template>

<script>

    export default {
       data(){
        return{
          giftCardthumbnail: gifts.thumbnail,
          giftCardid: gifts.id,
          giftCardsku: gifts.sku,
          giftCardexpiry: gifts.expire_date,
          templatePrice: '',
          templateName: '',
          senderName: '',
          recipientName: '',
          senderEmail: '',
          recipientEmail: '',
          message: '',
          deliveryDate: '',
        }
       },
        props:[
            "gifts",
            "productId",
            "userId",
        ],
        methods:{
            async addproductToCart(){
                if(this.userId == 0){
                    this.$toastr.e('You Need to login, To add this product in Cart');
                    return;
                }         
                if(!this.senderName){
                    this.$toastr.e('Enter Sender Name ');
                    return;
                }   
                if(!this.recipientName){
                    this.$toastr.e('Enter Recipient Name ');
                    return;
                } 
                if(!this.senderEmail){
                    this.$toastr.e('Enter Sender Email ');
                    return;
                }  
                if(!this.recipientEmail){
                    this.$toastr.e('Enter Recipient Email ');
                    return;
                }   
                if(!this.deliveryDate){
                    this.$toastr.e('Select Delivery Date ');
                    return;
                }      
                let response = await axios.post('/cart',{
                    'product_id': this.productId,
                    'giftCard_thumbnail': this.gifts.thumbnail,
                    'giftCard_id': this.gifts.id,
                    'giftCard_sku': this.gifts.sku,
                    'giftCard_expiry': this.gifts.expire_date,
                    'template_Price': this.templatePrice,
                    'template_Name': this.templateName,
                    'sender_Name': this.senderName,
                    'recipient_Name': this.recipientName,
                    'sender_Email': this.senderEmail,
                    'recipient_Email': this.recipientEmail,
                    'message': this.message,
                    'delivery_Date': this.deliveryDate,
                });
                setTimeout(() => {
                  location.reload();
                }, 2000);
                this.$root.$emit('changeInCart', response.data.items);
            }
          
          

        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
