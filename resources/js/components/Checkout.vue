<template>
    <div>
        <div class="row">
            <div class="col-lg-9">
                <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <label>First Name *</label>
                            <input type="text" class="form-control" name="first_name" v-model="firstname" placeholder="First Name" required>
                        </div><!-- End .col-lg-6 col-md-6 -->

                        <div class="col-lg-6 col-md-6">
                            <label>Last Name *</label>
                            <input type="text" class="form-control" name="last_name" v-model="lastname" placeholder="Last Name" required>
                        </div><!-- End .col-lg-6 col-md-6 -->
                    </div><!-- End .row -->

                    <label>Email address *</label>
                    <input type="email" class="form-control" name="email" v-model="email" placeholder="Email Address" required>

                    <label>Street Address *</label>
                    <input type="text" class="form-control" name="address" v-model="address" placeholder="Address" required>


                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <label>Town / City *</label>
                            <input type="text" class="form-control" name="towncity" v-model="towncity" placeholder="Town / City" required>
                        </div><!-- End .col-lg-6 col-md-6 -->

                        <div class="col-lg-6 col-md-6">
                            <label>State / County *</label>
                            <input type="text" class="form-control" name="statecountry" v-model="statecountry" placeholder="State / Country" required>
                        </div><!-- End .col-lg-6 col-md-6 -->
                    </div><!-- End .row -->

                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <label>Postcode / ZIP *</label>
                            <input type="text" class="form-control" name="postcodezip" v-model="postcodezip" placeholder="Postcode / Zip" required>
                        </div><!-- End .col-lg-6 col-md-6 -->

                        <div class="col-lg-6 col-md-6">
                            <label>Number *</label>
                            <input type="tel" class="form-control" name="number" v-model="number" placeholder="Number" required>
                        </div><!-- End .col-lg-6 col-md-6 -->

                        <div class="col-lg-6 col-md-6">
                            <label>Alternate Number *</label>
                            <input type="tel" class="form-control" name="alternumber" v-model="alternumber" placeholder="Alternate Number" required>
                        </div><!-- End .col-lg-6 col-md-6 -->

                        <div class="col-lg-6 col-md-6">
                            <label>Total Price</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="totalprice" v-model="items.totalAmount - discount_get_price" placeholder="Total Price" v-if="discount_get_price" readonly>
                                <input type="text" class="form-control" name="totalprice" v-model="items.totalAmount" placeholder="Total Price" v-else readonly>

                            </div>
                        </div>
                    </div><!-- End .row -->                    

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="checkout-create-acc" name="user" v-model="isChecked" @click="showToast">
                        <label class="custom-control-label" for="checkout-create-acc">Create an account?</label>
                    </div><!-- End .custom-checkbox -->

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="checkout-diff-address" name="differentaddress" v-model="differentaddress" :value="Ship">
                        <label class="custom-control-label" for="checkout-diff-address">Ship to a different address?</label>
                    </div><!-- End .custom-checkbox -->

                    <div class="col-lg-12 col-md-6" v-if="differentaddress">
                        <div class="form-group">
                            <label>Ship Address </label>
                            <input type="text" class="form-control" name="shipaddress" v-model="shipaddress" placeholder="Ship Address">
                        </div>
                    </div>

                    <label>Order notes (optional)</label>
                    <textarea class="form-control" cols="30" rows="4" name="note" v-model="note" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
            </div><!-- End .col-lg-9 -->

            <aside class="col-lg-3">
                <div class="summary">
                    <div class="checkout-discount" style="max-width: 100%;">
                      <form @submit.prevent="applyDiscount">
                        <input type="text" class="form-control" name="discount_code" v-model="discountcode" id="checkout-discount-input" placeholder="Have a coupon? Click here to enter your code">
                        <!-- <button type="submit" class="btn btn-primary">Apply</button> -->

                        <button class="btn btn-outline-primary-2 btn-order btn-block" type="submit">
                            <span class="btn-text">Apply Coupon</span>
                            <span class="btn-hover-text">Add Coupon</span>
                        </button>
                      </form>

                    </div>
                    <h3 class="summary-title mt-2">Your Order</h3><!-- End .summary-title -->

                    <table class="table table-summary">
                        <thead>
                            <tr>
                                <th>Items</th>
                                <th style="width: 40%;">Total</th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- <tr v-for="item in discountCodeArray" :key="item.id">
                              <td>{{item.coupon_code}}</td>
                              <td>{{item.coupon_price}}</td>
                            </tr>-->
                            <tr>
                                <h6 class="mt-2 mb-0">Service</h6>
                            </tr>
                            <tr v-for="(item, key) in sessionData" :key="key">
                              <!-- <td>User ID: {{ item }}</td> -->
                              <!-- <td v-if="item.user_id">User ID: {{ item.user_id }}</td> -->

                              <!-- <td v-if="item.activity_id">Activity ID: {{ item.activity_id }}</td> -->
                              <!-- <td v-if="item.product_activity">Product Activity: {{ item.product_activity }}</td> -->
                              <td v-if="item.activity_packages">{{ JSON.parse(item.activity_packages)[0] }}</td>
                              <td v-if="item.activity_total_amount">{{ formatAmount(JSON.parse(item.activity_total_amount)[0]) }}<br> AED</td>
                            </tr>
                            <!-- <tr v-for="item in items" :key="item.id">
                                <td v-if="item.product === 'activity'">{{item.name}}</td>
                                <td v-if="item.product === 'activity'">{{item.activity_total_amount}}.00 <br> AED </td>
                            </tr> -->

                            <tr>
                                <h6 class="mt-2 mb-0">Visa</h6>
                            </tr>

                            <!-- <tr v-for="item in items" :key="item.id">
                                <td v-if="item.product === 'visa'">{{item.name}}</td>
                                <td v-if="item.product === 'visa'">{{item.visa_total_amount}}.00 <br> AED </td>
                            </tr> -->
                            <tr v-for="(item, key) in sessionData" :key="key">
                              <!-- <td>User ID: {{ item }}</td> -->
                              <!-- <td v-if="item.user_id">User ID: {{ item.user_id }}</td> -->

                              <!-- <td v-if="item.visa_id">Visa ID: {{ item.visa_id }}</td> -->
                              <!-- <td v-if="item.product_visa">Visa ID: {{ item.product_visa }}</td> -->
                              <td v-if="item.visa_packages">{{ JSON.parse(item.visa_packages)[0] }}</td>
                              <td v-if="item.visa_total_amount">{{ formatAmount(JSON.parse(item.visa_total_amount)[0]) }}<br> AED</td>
                            </tr>

                            <tr class="summary-subtotal">
                                <td>Subtotal:</td>
                                <!-- <td>{{ formatAmount(totalAmount) }}.00 AED</td> -->
                                <!-- <p>Total Amount: {{ totalAmount }} AED</p> -->
                            </tr><!-- End .summary-subtotal -->

                            <input type="hidden" name="discount_get_price" v-model="discount_get_price" v-if="discount_get_price">
                            <tr class="summary-subtotal" v-if="discount_get_price">
                                <td>Discount Code:</td>
                            
                                <td id="discount_get_price">{{ discount_get_price }}.00 AED</td>
                            </tr><!-- End .summary-subtotal -->

                            <tr class="summary-total">
                                <td>Total:</td>
                                <td v-if="discount_get_price">{{ items.totalAmount - discount_get_price }}.00 AED</td>
                                <td v-else>{{items.totalAmount}}.00 AED</td>
                            </tr><!-- End .summary-total -->
                        </tbody>
                    </table><!-- End .table table-summary -->

                    <div class="accordion-summary" id="accordion-payment" v-if="isChecked">
                        <div class="card">
                            <div class="card-header" id="heading-1">
                                <h2 class="card-title">
                                    <input type="radio"  id="cash-on-delivery" name="payment_clear" value="Cash" v-model="isCheckedbank" checked>
                                    <label for="cash-on-delivery">Cash on Delivery</label>
                                </h2>

                            </div><!-- End .card-header -->
                        </div><!-- End .card -->
                        <button class="btn btn-outline-primary-2 btn-order btn-block" v-on:click.prevent="getUserAddress()">
                            <span class="btn-text">Place Order</span>
                            <span class="btn-hover-text">Proceed to Checkout</span>
                        </button>   
                    </div>
                </div><!-- End .summary -->
            </aside><!-- End .col-lg-3 -->
        </div>
    </div>
</template>

<script>
import axios from 'axios';
    export default {
        props: ['sessionData'],
        data(){
            return {
                items: [],
                differentaddress: false,
                isChecked: true,
                isCheckedbank: 'Cash',
                firstname: '',
                lastname: '',
                email: '',
                address: '',
                towncity: '',
                statecountry: '',
                postcodezip: '',
                number: '',
                alternumber: '',
                Ship: 'Shipping',
                shipaddress: '',
                note: '',

                discountcode: '',
                discount_get_price: '',
                codePrice: 0,
                discountCodeArray: [],
            }
        },
        mounted() {
            console.log('Component mounted');
          this.getCartItems();
        },


        computed: {
            showDiv() {
              return this.isCheckedbank === 'Bank';
            },
            totalAmount() {
      let total = 0;
      this.sessionData.forEach(item => {
        if (item.visa_total_amount) {
          total += parseFloat(JSON.parse(item.visa_total_amount)[0]);
        }
      });
      console.error('Error:', total);
      return total;
    },
          },
        methods:{
            formatAmount(amount) {
      return parseFloat(amount).toFixed(2);
    },
            
            async getCartItems() {
                try {
                    const response = await axios.get('/checkout/get/items');
                    this.items = response.data;
                    this.discountCodeArray = JSON.parse(this.items.discount_code);
                    console.log(this.items);
                    console.log(this.discountCodeArray);
                } catch (error) {
                    console.error('Error:', error);
                    // Handle the error as needed
                }
            },

            applyDiscount() {
              // Check if discountcode exists in discountCodeArray
              const matchedCode = this.discountCodeArray.find(item => item.coupon_code === this.discountcode);
              if (matchedCode) {
                // Get the current local date and time in Pakistan
                const currentDateTime = new Date();
                const options = { timeZone: 'Asia/Karachi', hour12: false };
                const currentLocalDate = currentDateTime.toLocaleDateString('en-US', options);
                const currentLocalTime = currentDateTime.toLocaleTimeString('en-US', options);

                // Convert start_date and start_time to local date and time strings in Pakistan time zone
                const startDateTime = new Date(`${matchedCode.start_date}T${matchedCode.start_time}`);
                const startLocalDate = startDateTime.toLocaleDateString('en-US', options);
                const startLocalTime = startDateTime.toLocaleTimeString('en-US', options);

                // Convert end_date and end_time to local date and time strings in Pakistan time zone
                const endDateTime = new Date(`${matchedCode.end_date}T${matchedCode.end_time}`);
                const endLocalDate = endDateTime.toLocaleDateString('en-US', options);
                const endLocalTime = endDateTime.toLocaleTimeString('en-US', options);

                // Compare the current local date and time with the start and end dates and times
                if (currentLocalDate >= startLocalDate && currentLocalDate <= endLocalDate) {
                  if (currentLocalDate === startLocalDate && currentLocalTime < startLocalTime) {
                    this.$toastr.e('Coupon is not valid yet.');
                  } else if (currentLocalDate === endLocalDate && currentLocalTime > endLocalTime) {
                    this.$toastr.e('Coupon has expired.');
                  } else {
                    this.discount_get_price = matchedCode.coupon_price.toString();
                    this.$toastr.s('Valid Coupon.');
                  }
                } else {
                  this.$toastr.e('Coupon is not valid yet.');
                }
              } else {
                this.discount_get_price = '';
                this.$toastr.e('Invalid Coupon.');
              }
            },

            showToast() {
              if (this.isChecked) {
                this.$toastr.e('Please accept the Create an account.');
                return;
              }
            },

            async getUserAddress(){
                if(this.firstname != '' && this.lastname != '' && this.email != '' && this.address != '' && this.towncity != '' && this.statecountry != '' && this.postcodezip != '' && this.number != ''){
                    let response = await axios.post('/process/user/payment',{
                        'discountcode':this.discountcode,
                        'firstname':this.firstname,
                        'lastname':this.lastname,
                        'email':this.email,
                        'address':this.address,
                        'towncity':this.towncity,
                        'statecountry':this.statecountry,
                        'postcodezip':this.postcodezip,
                        'number':this.number,
                        'alternumber':this.alternumber,
                        'couponprice':this.discount_get_price,
                        'shippingAmount':this.items.shippingAmount,                        
                        'Famount':this.items.totalAmount,
                        'Ship':this.Ship,
                        'shipaddress':this.shipaddress,
                        'isCheckedbank':this.isCheckedbank,
                        'note':this.note,
                        'order':this.items,
                    });
                    if(response.data.success){
                        this.$toastr.s(response.data.success);
                    }else{
                        this.$toastr.e(response.data.error);
                    }

                    setTimeout(()=> {
                        window.location.href= '/';
                    }, 2000);
                    console.log(response.data);
                }
                else{
                    this.$toastr.e('Incomplete Data');
                }
            },
        },
        created() {
            this.getCartItems();       
        }

    }
</script>
