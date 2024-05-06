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
              <select class="form-control" style="margin: 0;" :name="'transfer_option' + item.id" :id="'transfer_option' + item.id">
                <option v-if="item.processing_type_normal" :value="item.processing_type_normal">Normal</option>
                <option v-if="item.processing_type_express" :value="item.processing_type_express">Express</option>
              </select>
              <!-- <p :id="'totalamount_transfer_option' + item.id"></p> -->
            </span>

            <span>
              <label>No. Of Visa</label>
              <select class="form-control" :id="'no_of_visa' + item.id" :name="'no_of_visa' + item.id" style="margin: 0;">
                <option value="">Select Visa</option>
                <option v-for="i in 500" :value="i" :key="i">{{ i }}</option>
              </select>
              <!-- {{ item.visa_price }}  -->
              <!-- <p :id="'total_Amount_no_visa' + item.id"></p>  -->
            </span>

            <span>
              <label>Tour Date</label>
              <input type="date" class="form-control" style="margin: 0;" max="travel_date_end" :name="'travel_date' + item.id" />
            </span>

            <div class="visaprice">
              <span>                                                    
                <label>Total Amount</label>
                <b id="price">
                  <b :id="'total_Amount' + item.id">{{ formatPrice(item.processing_type_normal) }}</b>
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

<script>
import axios from 'axios';

export default {
  data() {
    return {
      loggedUser: JSON.parse(document.querySelector("meta[name='user']").getAttribute('content')),
      visa_id: this.visa,
      userId: 0,
      total_Amountinput: 0,
    }
  },
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
  methods: {
    addToCartCount() {
      bus.$emit('added-to-cart', this.visa)
    },
    addToWishlist() {
      bus.$emit('added-to-wishlist', this.visa)
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
      $('#no_of_visa' + this.visaoption.id).change(() => {
        const selectedValue = $('#no_of_visa' + this.visaoption.id).val();
        const noVisaPrice = this.visaoption.visa_price;
        const totalPrice = selectedValue * noVisaPrice;
        $('#total_Amount_no_visa' + this.visaoption.id).text(totalPrice);
        this.calculateGrandTotal();
      });

      // Transfer option calculation
      $('#transfer_option' + this.visaoption.id).change(() => {
        const selectedValue = $('#transfer_option' + this.visaoption.id).val();
        $('#totalamount_transfer_option' + this.visaoption.id).text(selectedValue);
        this.calculateGrandTotal();
      });

      this.calculateGrandTotal = () => {
        totalAmount = 0;
        const noVisaPrice = this.visaoption.visa_price;
        const selectedVisaValue = $('#no_of_visa' + this.visaoption.id).val();
        const visaTotalPrice = selectedVisaValue * noVisaPrice;
        totalAmount += visaTotalPrice;

        const selectedTransferOptionValue = $('#transfer_option' + this.visaoption.id).val();
        totalAmount += parseFloat(selectedTransferOptionValue);

        const formattedTotalAmount = totalAmount.toLocaleString(undefined, {
          minimumFractionDigits: 2,
          maximumFractionDigits: 2
        });

        $('#total_Amount' + this.visaoption.id).text(formattedTotalAmount);
        $('#total_Amountinput' + this.visaoption.id).val(formattedTotalAmount);
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
