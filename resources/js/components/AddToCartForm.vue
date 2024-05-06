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
            <span @click="openModal('myModal' + item.id)" class="more-info">(More Info)</span>

          </h6>

          <div :id="'myModal' + item.id" class="modal">
            <div class="modal-dialog" id="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">{{ item.activity_name }}</h5>
                  <button type="button" class="closes" data-dismiss="modal" aria-label="Close" @click="closeModal('myModal' + item.id)">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="modal-div mt-2">
                      <div style="border: 1px solid #ddd; padding: 10px; border-radius: 10px;">
                        <h6>Voucher Confirmation</h6>
                        <span class="collapse-content">
                            <p>
                              <b>Mobile Voucher</b><br>
                                Use your phone or Print your Voucher
                            </p>
                        </span>
                      </div>

                      <div class="mt-1" style="border: 1px solid #ddd; padding: 10px; border-radius: 10px;">
                        <h6>Booking Confirmation</h6>
                        <span class="collapse-content">
                            <p>
                              <b>Instant Confirmation</b><br>
                                Instant Tour Confirmation will be Provided
                            </p>
                        </span>
                      </div>

                      <div class="mt-1" style="border: 1px solid #ddd; padding: 10px; border-radius: 10px;">
                        <h6>Timings & Duration</h6>
                        <span class="collapse-content">
                            <table>
                              <thead>
                                <tr>
                                  <th>Transfer Type</th>
                                  <th>Pickup Timings</th>
                                  <th>Duration Approx</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td v-if="item.without_transfer_option_price == 1">Without Transfers </td>
                                  <td v-if="item.without_transfer_option_price == 1">{{ item.without_pickup_timings }}</td>
                                  <td v-if="item.without_transfer_option_price == 1">{{ item.without_duration_approx }}</td>
                                </tr>

                                <tr>
                                  <td v-if="item.sharing_transfer_option_price == 1">Sharing Transfers</td>
                                  <td v-if="item.sharing_transfer_option_price == 1">{{ item.sharing_pickup_timings }}</td>
                                  <td v-if="item.sharing_transfer_option_price == 1">{{ item.sharing_duration_approx }}</td>
                                </tr>

                                <tr>
                                  <td v-if="item.private_transfer_option_price == 1">Private Transfers</td>
                                  <td v-if="item.private_transfer_option_price == 1">{{ item.private_pickup_timings }}</td>
                                  <td v-if="item.private_transfer_option_price == 1">{{ item.private_duration_approx }}</td>
                                </tr>
                              </tbody>
                            </table>
                        </span>
                      </div>

                      <div class="mt-1" style="border: 1px solid #ddd; padding: 10px; border-radius: 10px;" v-if="item.cancellation_policy !== null || item.child_policy !== null">
                        <h6>Booking Policy</h6>
                        <span class="collapse-content">
                            <p>
                              <span v-if="item.cancellation_policy !== null">
                                <b>Cancellation Policy</b>
                                <ul style="list-style: inside;">
                                    <!-- <span v-html="cancellation_policy"></span>                   -->
                                    <span v-html="formatCancellation_policy(item.cancellation_policy)"></span>
                                </ul>
                              </span>

                              <span v-if="item.child_policy !== null">
                                <b>Child Policy</b>
                                <ul style="list-style: inside;">
                                  <!-- <span v-html="child_policy"></span> -->
                                  <span v-html="formatChild_policy(item.child_policy)"></span>
                                </ul>
                              </span>
                            </p>
                        </span>
                      </div>

                      <div class="mt-1" style="border: 1px solid #ddd; padding: 10px; border-radius: 10px;" v-if="item.inclusions !== null">
                        <h6>Inclusions</h6>
                        <span class="collapse-content">
                            <p>
                              <ul style="list-style: inside;">
                                <!-- <span v-html="inclusion"></span> -->
                                <span v-html="formatInclusions(item.inclusions)"></span>
                              </ul>
                            </p>
                        </span>
                      </div>

                      <div class="mt-1" style="border: 1px solid #ddd; padding: 10px; border-radius: 10px;" v-if="item.exclusion !== null">
                        <h6>Exclusion</h6>
                        <span class="collapse-content">
                            <p>
                              <ul style="list-style: inside;">
                                  <!-- <span v-html="exclusion"></span> -->                              
                                <span v-html="formatExclusion(item.exclusion)"></span>
                              </ul>
                            </p>
                        </span>
                      </div>       
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="visainner">
            <span>
              <label>Transfer Option</label>
              <!-- <select class="form-control" style="margin: 0;" :name="'transfer_option' + item.id" :id="'transfer_option' + item.id"> -->
              <select class="form-control" style="margin: 0;" :name="'transfer_option' + item.id" :id="'transfer_option' + item.id" v-model="selectedTransferOption[item.id]">
                <option v-if="item.without_transfer_option_price == 1" :value="without_transfer_option_price">Without Transfer</option>
                <option v-if="item.sharing_transfer_option_price == 1" :value="sharing_transfer_option_price">Sharing Transfer</option>
                <option v-if="item.private_transfer_option_price == 1" :value="private_transfer_option_price">Private Transfer</option>
              </select>
              <!-- <p :id="'totalamount_transfer_option' + item.id"></p> -->
            </span>

            <span>
              <label>Tour Date</label>
              <input type="date" class="form-control" style="margin: 0;" :min="getCurrentDate()" :max="travel_date_end" :name="'travel_date' + item.id" :value="getCurrentDate()" />
            </span>

            <span v-if="item.adult_price != 0">
              <label>Adult</label>
              <select class="form-control" :id="'adult_price' + item.id" :name="'adult_price' + item.id" style="margin: 0;" v-model="selectedAdultQTY[item.id]">
                <option v-for="i in 500" :value="i" :key="i">{{ i }}</option>
              </select>
              <!-- {{ item.adult_price }}
              {{ item.adult_price_st }}
              {{ item.adult_price_pt }} -->
              <!-- <p :id="'total_Amount_adult_price' + item.id">{{ calculateAdultTotalAmount(item.id) }}</p>
              <p :id="'total_Amount_adult_price_st' + item.id">{{ calculateAdultstTotalAmount(item.id) }}</p>
              <p :id="'total_Amount_adult_price_pt' + item.id">{{ calculateAdultptTotalAmount(item.id) }}</p> -->
            </span>
            <span v-else>
              <label>Adult</label>
              <select class="form-control" :id="'adult_price' + item.id" :name="'adult_price' + item.id" style="margin: 0;" readonly>
                <option value="">0</option>
              </select>
              <!-- {{ item.adult_price }}
              {{ item.adult_price_st }}
              {{ item.adult_price_pt }}
              <p :id="'total_Amount_adult_price' + item.id">{{ calculateAdultTotalAmount(item.id) }}</p>
              <p :id="'total_Amount_adult_price_st' + item.id">{{ calculateAdultstTotalAmount(item.id) }}</p>
              <p :id="'total_Amount_adult_price_pt' + item.id">{{ calculateAdultptTotalAmount(item.id) }}</p> -->
            </span>

            <span v-if="item.child_price != 0">
              <label>Child 4-12 Yrs</label>
              <select class="form-control" :id="'child_price' + item.id" :name="'child_price' + item.id" style="margin: 0;" v-model="selectedChildQTY[item.id]">
                <option value="0">Select Child</option>
                <option v-for="i in 500" :value="i" :key="i">{{ i }}</option>
              </select>
              <!-- {{ item.child_price }}
              {{ item.child_price_st }}
              {{ item.child_price_pt }}
              <p :id="'total_Amount_child_price' + item.id">{{ calculateChildTotalAmount(item.id) }}</p>
              <p :id="'total_Amount_child_price_st' + item.id">{{ calculateChildstTotalAmount(item.id) }}</p>
              <p :id="'total_Amount_child_price_pt' + item.id">{{ calculateChildptTotalAmount(item.id) }}</p> -->
            </span>
            <span v-else>
              <label>Child 4-12 Yrs</label>
              <select class="form-control" :id="'child_price' + item.id" :name="'child_price' + item.id" style="margin: 0;" readonly>
                <option value="">0</option>
              </select>
              <!-- {{ item.child_price }}
              {{ item.child_price_st }}
              {{ item.child_price_pt }}
              <p :id="'total_Amount_child_price' + item.id">{{ calculateChildTotalAmount(item.id) }}</p>
              <p :id="'total_Amount_child_price_st' + item.id">{{ calculateChildstTotalAmount(item.id) }}</p>
              <p :id="'total_Amount_child_price_pt' + item.id">{{ calculateChildptTotalAmount(item.id) }}</p> -->
            </span>

            <span v-if="item.infant_price != 0">
              <label>Infant 0-0 Yrs</label>
              <select class="form-control" :id="'infant_price' + item.id" :name="'infant_price' + item.id" style="margin: 0;" v-model="selectedInfantQTY[item.id]">
                <option value="0">Select Infant</option>
                <option v-for="i in 500" :value="i" :key="i">{{ i }}</option>
              </select>
              <!-- {{ item.infant_price }}
              {{ item.infant_price_st }}
              {{ item.infant_price_pt }}
              <p :id="'total_Amount_infant_price' + item.id">{{ calculateInfantTotalAmount(item.id) }}</p>
              <p :id="'total_Amount_infant_price_st' + item.id">{{ calculateInfantstTotalAmount(item.id) }}</p>
              <p :id="'total_Amount_infant_price_pt' + item.id">{{ calculateInfantptTotalAmount(item.id) }}</p> -->
            </span>
            <span v-else>
              <label>Infant 0-0 Yrs</label>
              <select class="form-control" :id="'infant_price' + item.id" :name="'infant_price' + item.id" style="margin: 0;" readonly>
                <option value="">0</option>
              </select>
              <!-- {{ item.infant_price }}
              {{ item.infant_price_st }}
              {{ item.infant_price_pt }}
              <p :id="'total_Amount_infant_price' + item.id">{{ calculateInfantTotalAmount(item.id) }}</p>
              <p :id="'total_Amount_infant_price_st' + item.id">{{ calculateInfantstTotalAmount(item.id) }}</p>
              <p :id="'total_Amount_infant_price_pt' + item.id">{{ calculateInfantptTotalAmount(item.id) }}</p> -->
            </span>

            <div class="visaprice">
              <span>                                                    
                <label>Total Amount</label>
                <b id="price" @click="openModalAmount('myModalAmount' + item.id)">
                  <!-- <p>Item {{ item.id }} Subtotal: {{ getItemSubtotal(item.id) }}</p> -->
                  <b>{{ getItemSubtotal(item.id) }}</b>
                  <!-- <b>{{ calculateGrandTotal() }}</b> -->
                  AED
                </b>    
                  <input type="hidden" :name="'total_Amountinput[]'" :id="'total_Amountinput' + item.id" :value="getItemAmount(item.id)" readonly />
              </span>
            </div>

            <div :id="'myModalAmount' + item.id" class="modal">
              <div class="modal-dialog" id="modal-dialog-price" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Your Price Details <span class="more-info">({{ item.activity_name }})</span></h5>
                    <button type="button" class="closes" data-dismiss="modal" aria-label="Close" @click="closeModalAmount('myModalAmount' + item.id)">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="modal-div mt-2">

                        <div class="mt-1" style="border: 1px solid #ddd; padding: 10px; border-radius: 10px;">
                          <span class="collapse-content">
                              <p style="background: lightgray;padding: 5px 15px;font-weight: 600;border-radius: 10px;">Your Guarantee lowest price for this option is based on the following:</p>
                              <table>
                                <thead>
                                  <tr>
                                    <th>Transfer Option</th>
                                    <th>Adult Price</th>
                                    <th>Child Price</th>
                                    <th>Infant Price</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr v-if="item.without_transfer_option_price == 1">
                                    <td> Without Transfers </td>
                                    <td>AED {{ item.adult_price ?? 0 }}</td>
                                    <td>AED {{ item.child_price ?? 0 }}</td>
                                    <td>AED {{ item.infant_price ?? 0 }}</td>
                                  </tr>

                                  <tr v-if="item.sharing_transfer_option_price == 1">
                                    <td> Sharing Transfers </td>
                                    <td>AED {{ item.adult_price_st ?? 0 }}</td>
                                    <td>AED {{ item.child_price_st ?? 0 }}</td>
                                    <td>AED {{ item.infant_price_st ?? 0 }}</td>
                                  </tr>

                                  <tr v-if="item.private_transfer_option_price == 1">
                                    <td> Private Transfers </td>
                                    <td>AED {{ item.adult_price_pt ?? 0 }}</td>
                                    <td>AED {{ item.child_price_pt ?? 0 }}</td>
                                    <td>AED {{ item.infant_price_pt ?? 0 }}</td>
                                  </tr>
                                </tbody>
                              </table>
                          </span>
                        </div>       
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="product-details-action" style="float: right;">
        <button type="submit" class="btn-product btn-cart mt-1" id="btn-cart_hover" >Add to Cart</button>
        <!-- <a :href="'add-to-carts/3'" class="btn-product btn-cart mt-1">Add to Cart</a> -->
      </div>
    </form>
</div>
</template>

<script>
import axios from 'axios';

export default {
  props: {
    activity: {
      type: Array,
      required: true
    },
    activityoption: {
      type: Array
    },
    userId: {
      type: Number,
      required: true
    },
  },
  data() {
    return {
      loggedUser: JSON.parse(document.querySelector("meta[name='user']").getAttribute('content')),
      activity_id: this.activity,
      userId: 0,
      total_Amountinput: 0,
      selectedTransferOption: {},
      selectedAdultQTY: {},
      selectedChildQTY: {},
      selectedInfantQTY: {},
      travel_date_end: 'yyyy-mm-dd', 
      without_transfer_option_price: 1,
      sharing_transfer_option_price: {},
      private_transfer_option_price: {},
      isModalOpen: false,

      transferOptionLabels: {
      without_transfer_option_price: 'Without Transfer',
      sharing_transfer_option_price: 'Sharing Transfer',
      private_transfer_option_price: 'Private Transfer'
    }
// 

      // without_transfer_option_price: this.activityoption.without_transfer_option_price || 1,
      // sharing_transfer_option_price: this.activityoption.sharing_transfer_option_price || 1,
      // private_transfer_option_price: this.activityoption.private_transfer_option_price || 1,

    }
  },
  methods: {
    formatInclusions(inclusions) {
      const replacedText = inclusions
        .split(', ')
        .map(item => `<li>${item}</li>`)
        .join('');
      return replacedText;
    },

    formatExclusion(exclusion) {
      const replacedText = exclusion
        .split(', ')
        .map(item => `<li>${item}</li>`)
        .join('');
      return replacedText;
    },

    formatCancellation_policy(cancellation_policy) {
      const replacedText = cancellation_policy
        .split(', ')
        .map(item => `<li>${item}</li>`)
        .join('');
      return replacedText;
    },

    formatChild_policy(child_policy) {
      const replacedText = child_policy
        .split(', ')
        .map(item => `<li>${item}</li>`)
        .join('');
      return replacedText;
    },

    openModal(modalId) {
      const modal = document.getElementById(modalId);
      if (modal) {
        modal.style.display = 'block';
      }
    },
    closeModal(modalId) {
      const modal = document.getElementById(modalId);
      if (modal) {
        modal.style.display = 'none';
      }
    },

    openModalAmount(modalId) {
      const modal = document.getElementById(modalId);
      if (modal) {
        modal.style.display = 'block';
      }
    },
    closeModalAmount(modalId) {
      const modal = document.getElementById(modalId);
      if (modal) {
        modal.style.display = 'none';
      }
    },
    addToCartCount() {
      bus.$emit('added-to-cart', this.activity)
    },
    addToWishlist() {
      bus.$emit('added-to-wishlist', this.activity)
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

  /// Adult Code 
    calculateAdultTotalAmount(itemId) {
      const selectedAdultValue = this.selectedAdultQTY[itemId] || 0;
      const item = this.activityoption.find(item => item.id === itemId);
      const adultPrice = item.adult_price || 0;
      const totalAmount = selectedAdultValue * adultPrice;
      return totalAmount;
      this.calculateGrandTotal();
    },

    calculateAdultstTotalAmount(itemId) {
      const selectedAdultValue = this.selectedAdultQTY[itemId] || 0;
      const item = this.activityoption.find(item => item.id === itemId);
      const adultstPrice = item.adult_price_st || 0;
      const totalAmount = selectedAdultValue * adultstPrice;
      return totalAmount;
      this.calculateGrandTotal();
    },

    calculateAdultptTotalAmount(itemId) {
      const selectedAdultValue = this.selectedAdultQTY[itemId] || 0;
      const item = this.activityoption.find(item => item.id === itemId);
      const adultptPrice = item.adult_price_pt || 0;
      const totalAmount = selectedAdultValue * adultptPrice;
      return totalAmount;
      this.calculateGrandTotal();
    },

  /// Child Code 
    calculateChildTotalAmount(itemId) {
      const selectedChildValue = this.selectedChildQTY[itemId] || 0;
      const item = this.activityoption.find(item => item.id === itemId);
      const childPrice = item.child_price || 0;
      const totalAmount = selectedChildValue * childPrice;
      return totalAmount;
      this.calculateGrandTotal();
    },

    calculateChildstTotalAmount(itemId) {
      const selectedChildValue = this.selectedChildQTY[itemId] || 0;
      const item = this.activityoption.find(item => item.id === itemId);
      const childstPrice = item.child_price_st || 0;
      const totalAmount = selectedChildValue * childstPrice;
      return totalAmount;
      this.calculateGrandTotal();
    },

    calculateChildptTotalAmount(itemId) {
      const selectedChildValue = this.selectedChildQTY[itemId] || 0;
      const item = this.activityoption.find(item => item.id === itemId);
      const childptPrice = item.child_price_pt || 0;
      const totalAmount = selectedChildValue * childptPrice;
      return totalAmount;
      this.calculateGrandTotal();
    },

  /// Infant Code 
    calculateInfantTotalAmount(itemId) {
      const selectedInfantValue = this.selectedInfantQTY[itemId] || 0;
      const item = this.activityoption.find(item => item.id === itemId);
      const infantPrice = item.infant_price || 0;
      const totalAmount = selectedInfantValue * infantPrice;
      return totalAmount;
      this.calculateGrandTotal();
    },

    calculateInfantstTotalAmount(itemId) {
      const selectedInfantValue = this.selectedInfantQTY[itemId] || 0;
      const item = this.activityoption.find(item => item.id === itemId);
      const infantstPrice = item.infant_price_st || 0;
      const totalAmount = selectedInfantValue * infantstPrice;
      return totalAmount;
      this.calculateGrandTotal();
    },

    calculateInfantptTotalAmount(itemId) {
      const selectedInfantValue = this.selectedInfantQTY[itemId] || 0;
      const item = this.activityoption.find(item => item.id === itemId);
      const infantptPrice = item.infant_price_pt || 0;
      const totalAmount = selectedInfantValue * infantptPrice;
      return totalAmount;
      this.calculateGrandTotal();
    },

    calculateGrandTotal() {
      let grandTotal = 0;

      for (const item of this.activityoption) {
        const selectedOption = this.selectedTransferOption[item.id];
        let itemTotal = 0;

        switch (selectedOption) {
          case this.without_transfer_option_price:
            itemTotal += this.calculateAdultTotalAmount(item.id) +
                         this.calculateChildTotalAmount(item.id) +
                         this.calculateInfantTotalAmount(item.id);
            break;
          case this.sharing_transfer_option_price:
            itemTotal += this.calculateAdultstTotalAmount(item.id) +
                         this.calculateChildstTotalAmount(item.id) +
                         this.calculateInfantstTotalAmount(item.id);
            break;
          case this.private_transfer_option_price:
            itemTotal += this.calculateAdultptTotalAmount(item.id) +
                         this.calculateChildptTotalAmount(item.id) +
                         this.calculateInfantptTotalAmount(item.id);
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
      let subtotal = 0;
      const selectedOption = this.selectedTransferOption[itemId];

      switch (selectedOption) {
        case this.without_transfer_option_price:
          subtotal = this.calculateAdultTotalAmount(itemId) +
                      this.calculateChildTotalAmount(itemId) +
                      this.calculateInfantTotalAmount(itemId);
          break;
        case this.sharing_transfer_option_price:
          subtotal = this.calculateAdultstTotalAmount(itemId) +
                      this.calculateChildstTotalAmount(itemId) +
                      this.calculateInfantstTotalAmount(itemId);
          break;
        case this.private_transfer_option_price:
          subtotal = this.calculateAdultptTotalAmount(itemId) +
                      this.calculateChildptTotalAmount(itemId) +
                      this.calculateInfantptTotalAmount(itemId);
          break;
        default:
          // Handle the default case, if needed
          break;
      }

      return this.formatPrice(subtotal);
      $('#total_Amountinput' + itemId).val(this.formatPrice(subtotal));

    },

    getItemAmount(itemId) {
      let subtotal = 0;
      const selectedOption = this.selectedTransferOption[itemId];

      switch (selectedOption) {
        case this.without_transfer_option_price:
          subtotal = this.calculateAdultTotalAmount(itemId) +
                      this.calculateChildTotalAmount(itemId) +
                      this.calculateInfantTotalAmount(itemId);
          break;
        case this.sharing_transfer_option_price:
          subtotal = this.calculateAdultstTotalAmount(itemId) +
                      this.calculateChildstTotalAmount(itemId) +
                      this.calculateInfantstTotalAmount(itemId);
          break;
        case this.private_transfer_option_price:
          subtotal = this.calculateAdultptTotalAmount(itemId) +
                      this.calculateChildptTotalAmount(itemId) +
                      this.calculateInfantptTotalAmount(itemId);
          break;
        default:
          // Handle the default case, if needed
          break;
      }

      $('#total_Amountinput' + itemId).val(subtotal);
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
    // Set default selected values for each item in the activityoption array
    for (const item of this.activityoption) {
      this.selectedTransferOption = {
        ...this.selectedTransferOption,
        [item.id]: 1, // Replace 1 with the desired default value for each item
      };

      this.selectedAdultQTY = {
        ...this.selectedAdultQTY,
        [item.id]: 1, // Replace 1 with the desired default value for each item
      };

      this.selectedChildQTY = {
        ...this.selectedChildQTY,
        [item.id]: 0, // Replace 1 with the desired default value for each item
      };

      this.selectedInfantQTY = {
        ...this.selectedInfantQTY,
        [item.id]: 0, // Replace 1 with the desired default value for each item
      };
    }
  },
};
</script>

<style>
/* Add your custom styles here */
.more-info {
  font-size: 1.2rem;
  color: #e87810;
  cursor: pointer;
}

button.closes {
  padding: 0;
  background-color: transparent;
  border: 0;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
}

.collapse-header {
  cursor: pointer;
}

.collapse-content p{  
  padding-left: 10px;
  font-size: 1.2rem;
}

@media screen and (min-width: 768px){
    #modal-dialog {
      max-width: 1035px;
    }

    #modal-dialog-price {
      max-width: 700px;
    }
}
</style>
