<template>
  <div>
    <form @submit.prevent="addToCart">
      <!-- @csrf -->
      <div class="visa">
        <input type="hidden" :name="'visa_id'" v-model="visa_id" />

        <div style="width: 100%;" v-for="(item, index) in visaoption" :key="item.id">
          <h6>
            <input type="checkbox" :name="'selected_packages[]'" :id="'selected_package_' + item.id" :value="item.visa_name" :checked="index === 0">
            <label :for="'selected_package_' + item.id" style="font-size: 1.6rem; margin: 0; font-weight: 500; color: #001433;">{{ item.visa_name }} </label>
          </h6>
          <div class="visainner">
            <span>
              <label>Processing Type</label>
              <select class="form-control" style="margin: 0;" :name="'transfer_option' + item.id" :id="'transfer_option' + item.id" v-model="selectedTransferOption[item.id]">
                <option v-if="item.processing_type_normal == 1" :value="processing_type_normal">Normal</option>
                <option v-if="item.processing_type_express == 1" :value="processing_type_express">Express</option>
              </select>
              <!-- <p :id="'totalamount_transfer_option' + item.id"></p> -->
            </span>

            <span>
              <label>No. Of Visa</label>

              <select class="form-control" :id="'visa_price' + item.id" :name="'visa_price' + item.id" style="margin: 0;" v-model="selectedVisaQTY[item.id]">
                <option v-for="i in 500" :value="i" :key="i">{{ i }}</option>
              </select>
              <!-- {{ item.visa_price }} 
              {{ item.visa_price_e }} 
              <p :id="'total_Amount_no_visa' + item.id">{{ calculateVisaTotalAmount(item.id) }}</p>
              <p :id="'total_Amount_no_visa_e' + item.id">{{ calculateVisaeTotalAmount(item.id) }}</p> -->
            </span>

            <span>
              <label>Tour Date</label>
              <input type="date" class="form-control" style="margin: 0;" :min="getCurrentDate()" :max="travel_date_end" :name="'travel_date' + item.id" :value="getCurrentDate()" />
            </span>

            <div class="visaprice">
              <span>                                                    
                <label>Total Amount</label>
                <b id="price">

                  <!-- <b>{{ calculateGrandTotal() }}</b> -->
                  <b>{{ getItemSubtotal(item.id) }}</b>
                  AED
                </b>
                <input type="hidden" :name="'total_Amountinput[]'" :id="'total_Amountinput' + item.id" :value="getItemAmount(item.id)" readonly />    
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="product-details-action" style="float: right;">
            <button type="submit" class="btn-product btn-cart mt-1" id="btn-cart_hover" >Add to Cart</button>
        <!-- <button type="submit" class="btn-product btn-cart mt-1" id="btn-cart_hover" :user-id="loggedUser">Add to Cart</button> -->
      </div>
    </form>
</div>
</template>

<script>
import axios from 'axios';

export default {
  props: {
    visa: {
      type: Array,
      required: true
    },
    visaoption: {
      type: Array,
      required: true
    },
    userId: {
      type: Number,
      required: true
    },
  },
  data() {
    return {
      loggedUser: JSON.parse(document.querySelector("meta[name='user']").getAttribute('content')),
      visa_id: this.visa,
      userId: 0,
      total_Amountinput: 0,
      selectedTransferOption: {},
      selectedVisaQTY: {},
      travel_date_end: 'yyyy-mm-dd',
      //processing_type_normal: {},
      processing_type_express: {},

    }
  },
  methods: {
    addToCartCount() {
      bus.$emit('added-to-cart', this.visa)
    },
    addToWishlist() {
      bus.$emit('added-to-wishlist', this.visa)
    },
    async addToCart() {
      // if (this.userId === 0) {
      //   this.$toastr.e('You Need to login, To add this product in Cart');
      //   return;
      // }

      try {
        const formData = new FormData(event.target);

        const response = await axios.post('/add-to-cart', formData);
        this.$toastr.s('Add Service in Cart');
        window.location.href = '/cart';

        // Handle the response from the server
        console.log(response.data);
        this.$root.$emit('changeInCart', response.data.items);
      } catch (error) {
        // Handle any errors
        console.error(error);
        this.$toastr.e('Service already exists.');
      }
    },

    getCurrentDate() {
      const today = new Date();
      const year = today.getFullYear();
      let month = today.getMonth() + 1; // Months are zero-based
      let day = today.getDate();

      // Add leading zeros if needed
      if (month < 10) {
        month = '0' + month;
      }
      if (day < 10) {
        day = '0' + day;
      }

      return `${year}-${month}-${day}`;
    },

    calculateVisaTotalAmount(itemId) {
      const selectedVisaValue = this.selectedVisaQTY[itemId] || 0;
      const item = this.visaoption.find(item => item.id === itemId);
      const visaPrice = item.visa_price || 0;
      const totalAmount = selectedVisaValue * visaPrice;
      return totalAmount;
      this.calculateGrandTotal();
    },

    calculateVisaeTotalAmount(itemId) {
      const selectedVisaValue = this.selectedVisaQTY[itemId] || 0;
      const item = this.visaoption.find(item => item.id === itemId);
      const visaePrice = item.visa_price_e || 0;
      const totalAmount = selectedVisaValue * visaePrice;
      return totalAmount;
      this.calculateGrandTotal();
    },

    calculateGrandTotal() {
      let grandTotal = 0;

      for (const item of this.visaoption) {
        const selectedOption = this.selectedTransferOption[item.id];
        let itemTotal = 0;

        switch (selectedOption) {
          case this.processing_type_normal:
            itemTotal += this.calculateVisaTotalAmount(item.id);
            break;
          case this.processing_type_express:
            itemTotal += this.calculateVisaeTotalAmount(item.id);
            break;
          default:
            // Handle the default case, if needed
            break;
        }

        // Debug: Print item subtotal for each item
        console.log(`Item ${item.id} Subtotal: ${itemTotal}`);

        // Add the item's total amount to the grand total
        grandTotal += itemTotal;
      }

      // Debug: Print the grand total
      console.log(`Grand Total: ${grandTotal}`);

      // Return the grand total formatted as a price
      return this.formatPrice(grandTotal);
    },

      getItemSubtotal(itemId) {
        const selectedOption = this.selectedTransferOption[itemId];
        let subtotal = 0;

        switch (selectedOption) {
          case this.processing_type_normal:
            subtotal = this.calculateVisaTotalAmount(itemId);
            break;
          case this.processing_type_express:
            subtotal = this.calculateVisaeTotalAmount(itemId);
            break;
          default:
            // Handle the default case, if needed
            break;
        }

        // Update the subtotal in the DOM
        $('#total_Amountinput' + itemId).val(this.formatPrice(subtotal));

        // return subtotal;
        return this.formatPrice(subtotal);
      },

      getItemAmount(itemId) {
        const selectedOption = this.selectedTransferOption[itemId];
        let subtotal = 0;

        switch (selectedOption) {
          case this.processing_type_normal:
            subtotal = this.calculateVisaTotalAmount(itemId);
            break;
          case this.processing_type_express:
            subtotal = this.calculateVisaeTotalAmount(itemId);
            break;
          default:
            // Handle the default case, if needed
            break;
        }

        // Update the subtotal in the DOM
        $('#total_Amountinput' + itemId).val(this.formatPrice(subtotal));

        return subtotal;
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
    // Set default selected values for each item in the visaoption array
    for (const item of this.visaoption) {
      this.selectedVisaQTY = {
        ...this.selectedVisaQTY,
        [item.id]: 1, // Replace 1 with the desired default value for each item
      };
    }
  },
};
</script>
