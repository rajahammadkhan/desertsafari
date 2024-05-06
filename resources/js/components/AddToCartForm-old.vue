<template>
  <div>
    <form @submit.prevent="addToCart">
      <!-- @csrf -->
      <div class="visa">
        <input type="hidden" :name="'activity_id'" v-model="activity_id" />

        <div style="width: 100%;" v-for="(item, index) in activityoption" :key="item.id">
          <h6>
            <input type="checkbox" :name="'selected_packages[]'" :id="'selected_package_' + item.id" :value="item.activity_name" :checked="index === 0">
            <label :for="'selected_package_' + item.id" style="font-size: 1.6rem; margin: 0; font-weight: 500; color: #001433;">{{ item.activity_name }} </label>
          </h6>
          <div class="visainner">
            <span>
              <label>Transfer Option</label>
              <select class="form-control" style="margin: 0;" :name="'transfer_option' + item.id" :id="'transfer_option' + item.id">
                <option v-if="item.without_transfer_option_price" :value="item.without_transfer_option_price">Without Transfer</option>
                <option v-if="item.sharing_transfer_option_price" :value="item.sharing_transfer_option_price">Sharing Transfer</option>
                <option v-if="item.private_transfer_option_price" :value="item.private_transfer_option_price">Private Transfer</option>
              </select>
              <!-- <p :id="'totalamount_transfer_option' + item.id"></p> -->
            </span>

            <span>
              <label>Tour Date</label>
              <input type="date" class="form-control" style="margin: 0;" max="travel_date_end" :name="'travel_date' + item.id" />
            </span>

            <span v-if="item.adult_price">
              <label>Adult</label>
              <select class="form-control" :id="'adult_price' + item.id" :name="'adult_price' + item.id" style="margin: 0;">
                <option value="">Select Adult</option>
                <option v-for="i in 500" :value="i" :key="i">{{ i }}</option>
              </select>
              <!-- {{ item.adult_price }}  -->
              <!-- <p :id="'total_Amount_adult_price' + item.id"></p>  -->
            </span>
            <span v-else>
              <label>Adult</label>
              <select class="form-control" :id="'adult_price' + item.id" :name="'adult_price' + item.id" style="margin: 0;" readonly>
                <option value="">0</option>
              </select>
              <!-- {{ item.adult_price }}  -->
              <!-- <p :id="'total_Amount_adult_price' + item.id"></p>  -->
            </span>

            <span v-if="item.child_price">
              <label>Child 4-12 Yrs</label>
              <select class="form-control" :id="'child_price' + item.id" :name="'child_price' + item.id" style="margin: 0;">
                <option value="">Select Child</option>
                <option v-for="i in 500" :value="i" :key="i">{{ i }}</option>
              </select>
              <!-- {{ item.child_price }}  -->
              <!-- <p :id="'total_Amount_child_price' + item.id"></p>  -->
            </span>
            <span v-else>
              <label>Child 4-12 Yrs</label>
              <select class="form-control" :id="'child_price' + item.id" :name="'child_price' + item.id" style="margin: 0;" readonly>
                <option value="">0</option>
              </select>
              <!-- {{ item.child_price }}  -->
              <!-- <p :id="'total_Amount_child_price' + item.id"></p>  -->
            </span>

            <!-- <p :id="'total_Amount' + item.id"></p>  -->

            <span v-if="item.infant_price == 0">
              <label>Infant 0-0 Yrs</label>
              <select class="form-control" :id="'infant_price' + item.id" :name="'infant_price' + item.id" style="margin: 0;" :disabled="!item.infant_price">
                <option value="">0</option>
              </select>
              <!-- {{ item.infant_price }}  -->
              <!-- <p :id="'total_Amount_infant_price' + item.id"></p>  -->
            </span>
            <span v-else>
              <label>Infant 0-0 Yrs</label>
              <select class="form-control" :id="'infant_price' + item.id" :name="'infant_price' + item.id" style="margin: 0;">
                <option value="">Select Infant</option>
                <option v-for="i in 10" :value="i" :key="i">{{ i }}</option>
              </select>
              <!-- {{ item.infant_price }}  -->
              <!-- <p :id="'total_Amount_infant_price' + item.id"></p>  -->
            </span>

            <div class="visaprice">
              <span>                                                    
                <label>Total Amount</label>
                <b id="price">
                  <b :id="'total_Amount' + item.id">{{ formatPrice(item.without_transfer_option_price) }}</b>
                  AED
                </b>    
                  <input type="hidden" :name="'total_Amountinput[]'" :id="'total_Amountinput' + item.id" />
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="product-details-action" style="float: right;">
        <button type="submit" class="btn-product btn-cart mt-1" id="btn-cart_hover" :user-id="loggedUser">Add to Cart</button>
      </div>
    </form>
</div>
</template>

// <script>
// import axios from 'axios';
// export default {
//    data(){
//     return{  
//         loggedUser : JSON.parse(document.querySelector("meta[name='user']").getAttribute('content')),
//         activity_id: this.activity,
//         userId: 0,
//         total_Amountinput:0,
//     }
//   },
//   props: {
//     activity: {
//       type: Array,
//       required: true
//     },
//     activityoption: {
//       type: Array,
//       required: true
//     }
//   },
//   methods: {
//     addToCartCount(){
//         bus.$emit('added-to-cart',this.activity)
//     },

//     addToWishlist(){
//         bus.$emit('added-to-wishlist',this.activity)
//     },
//     addToCart() {
//     // Get the form data
//     const formData = new FormData(event.target);

//     // Send the form data to the server using Axios or other HTTP library
//     axios
//       .post('/add-to-cart', formData)
//       .then(response => {
//         // Handle the response from the server
//         console.log(response.data);
//       })
//       .catch(error => {
//         // Handle any errors
//         console.error(error);
//       });
//   },
//     calculateTotalAmount() {
//       let totalAmount = 0;

//       // Adult price calculation
//       $('#adult_price' + this.activityoption.id).change(() => {
//         const selectedValue = $('#adult_price' + this.activityoption.id).val();
//         const adultPrice = this.activityoption.adult_price;
//         const totalPrice = selectedValue * adultPrice;
//         $('#total_Amount_adult_price' + this.activityoption.id).text(totalPrice);
//         this.calculateGrandTotal();
//       });

//       // Child price calculation
//       $('#child_price' + this.activityoption.id).change(() => {
//         const selectedValue = $('#child_price' + this.activityoption.id).val();
//         const childPrice = this.activityoption.child_price;
//         const totalPrice = selectedValue * childPrice;
//         $('#total_Amount_child_price' + this.activityoption.id).text(totalPrice);
//         this.calculateGrandTotal();
//       });

//       // Infant price calculation
//       $('#infant_price' + this.activityoption.id).change(() => {
//         const selectedValue = $('#infant_price' + this.activityoption.id).val();
//         const infantPrice = this.activityoption.infant_price;
//         const totalPrice = selectedValue * infantPrice;
//         $('#total_Amount_infant_price' + this.activityoption.id).text(totalPrice);
//         this.calculateGrandTotal();
//       });

//       // Transfer option calculation
//       $('#transfer_option' + this.activityoption.id).change(() => {
//         const selectedValue = $('#transfer_option' + this.activityoption.id).val();
//         $('#totalamount_transfer_option' + this.activityoption.id).text(selectedValue);
//         this.calculateGrandTotal();
//       });

//       this.calculateGrandTotal = () => {
//         totalAmount = 0;
//         const adultPrice = this.activityoption.adult_price;
//         const selectedAdultValue = $('#adult_price' + this.activityoption.id).val();
//         const adultTotalPrice = selectedAdultValue * adultPrice;
//         totalAmount += adultTotalPrice;

//         const childPrice = this.activityoption.child_price;
//         const selectedChildValue = $('#child_price' + this.activityoption.id).val();
//         const childTotalPrice = selectedChildValue * childPrice;
//         totalAmount += childTotalPrice;

//         const infantPrice = this.activityoption.infant_price;
//         const selectedInfantValue = $('#infant_price' + this.activityoption.id).val();
//         const infantTotalPrice = selectedInfantValue * infantPrice;
//         totalAmount += infantTotalPrice;

//         const selectedTransferOptionValue = $('#transfer_option' + this.activityoption.id).val();
//         totalAmount += parseFloat(selectedTransferOptionValue);

//         const formattedTotalAmount = totalAmount.toLocaleString(undefined, {
//           minimumFractionDigits: 2,
//           maximumFractionDigits: 2
//         });

//         $('#total_Amount' + this.activityoption.id).text(formattedTotalAmount);
//         $('#total_Amountinput' + this.activityoption.id).val(formattedTotalAmount);
//       };
//     },
//     formatPrice(value) {
//       // Format the price value with commas
//       return Number(value).toLocaleString(undefined, {
//         minimumFractionDigits: 2,
//         maximumFractionDigits: 2
//       });
//     }
//   },

//   filters: {
//     numberFormat(value) {
//       // Format the number with commas
//       return Number(value).toLocaleString();
//     }
//   },
//   mounted() {
//     this.calculateTotalAmount();
//   }
// };
// </script>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      loggedUser: JSON.parse(document.querySelector("meta[name='user']").getAttribute('content')),
      activity_id: this.activity,
      userId: 0,
      total_Amountinput: 0,
    }
  },
  props: {
    activity: {
      type: Array,
      required: true
    },
    activityoption: {
      type: Array,
      required: true
    },
    userId: {
      type: Number,
      required: true
    },
  },
  methods: {
    addToCartCount() {
      bus.$emit('added-to-cart', this.activity)
    },
    addToWishlist() {
      bus.$emit('added-to-wishlist', this.activity)
    },
    async addToCart() {
  if (this.userId === 0) {
    this.$toastr.e('You Need to login, To add this product in Cart');
    return;
  }

  try {
    const formData = new FormData(event.target);

    const response = await axios.post('/add-to-cart', formData);

    // Handle the response from the server
    console.log(response.data);
    this.$root.$emit('changeInCart', response.data.items);
  } catch (error) {
    // Handle any errors
    console.error(error);
  }
},


    calculateTotalAmount() {
      let totalAmount = 0;

      // Adult price calculation
      $('#adult_price' + this.activityoption.id).change(() => {
        const selectedValue = $('#adult_price' + this.activityoption.id).val();
        const adultPrice = this.activityoption.adult_price;
        const totalPrice = selectedValue * adultPrice;
        $('#total_Amount_adult_price' + this.activityoption.id).text(totalPrice);
        this.calculateGrandTotal();
      });

      // Child price calculation
      $('#child_price' + this.activityoption.id).change(() => {
        const selectedValue = $('#child_price' + this.activityoption.id).val();
        const childPrice = this.activityoption.child_price;
        const totalPrice = selectedValue * childPrice;
        $('#total_Amount_child_price' + this.activityoption.id).text(totalPrice);
        this.calculateGrandTotal();
      });

      // Infant price calculation
      $('#infant_price' + this.activityoption.id).change(() => {
        const selectedValue = $('#infant_price' + this.activityoption.id).val();
        const infantPrice = this.activityoption.infant_price;
        const totalPrice = selectedValue * infantPrice;
        $('#total_Amount_infant_price' + this.activityoption.id).text(totalPrice);
        this.calculateGrandTotal();
      });

      // Transfer option calculation
      $('#transfer_option' + this.activityoption.id).change(() => {
        const selectedValue = $('#transfer_option' + this.activityoption.id).val();
        $('#totalamount_transfer_option' + this.activityoption.id).text(selectedValue);
        this.calculateGrandTotal();
      });

      this.calculateGrandTotal = () => {
        totalAmount = 0;
        const adultPrice = this.activityoption.adult_price;
        const selectedAdultValue = $('#adult_price' + this.activityoption.id).val();
        const adultTotalPrice = selectedAdultValue * adultPrice;
        totalAmount += adultTotalPrice;

        const childPrice = this.activityoption.child_price;
        const selectedChildValue = $('#child_price' + this.activityoption.id).val();
        const childTotalPrice = selectedChildValue * childPrice;
        totalAmount += childTotalPrice;

        const infantPrice = this.activityoption.infant_price;
        const selectedInfantValue = $('#infant_price' + this.activityoption.id).val();
        const infantTotalPrice = selectedInfantValue * infantPrice;
        totalAmount += infantTotalPrice;

        const selectedTransferOptionValue = $('#transfer_option' + this.activityoption.id).val();
        totalAmount += parseFloat(selectedTransferOptionValue);

        const formattedTotalAmount = totalAmount.toLocaleString(undefined, {
          minimumFractionDigits: 2,
          maximumFractionDigits: 2
        });

        $('#total_Amount' + this.activityoption.id).text(formattedTotalAmount);
        $('#total_Amountinput' + this.activityoption.id).val(formattedTotalAmount);
      };
    },
    formatPrice(value) {
      // Format the price value with commas
      return Number(value).toLocaleString(undefined, {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
      });
    }
  },
  filters: {
    numberFormat(value) {
      // Format the number with commas
      return Number(value).toLocaleString();
    }
  },
  mounted() {
    this.calculateTotalAmount();
  }
};
</script>
