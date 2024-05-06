<template>

  <div>

    <div class="single-products-box" >
      <div class="products-image">
        <a href="">
          <!-- {{product.id}} -->
          <img :src="imageload(product.id)" class="main-image" alt="image">
          <img :src="imageload(product.id)" class="hover-image" alt="image">
        </a>

        <div class="products-button">
          <ul>
            <li>
              <div class="wishlist-btn">
                <a href="">
                  <i class='bx bx-heart'></i>
                  <span class="tooltip-label">Add to Wishlist</span>
                </a>
              </div>
            </li>
            <li>
              <div class="quick-view-btn">
                <a href="#" data-bs-toggle="modal" data-bs-target="#productsQuickView">
                  <i class='bx bx-search-alt'></i>
                  <span class="tooltip-label">Quick View</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>

      <div class="products-content">
        <h3><a href="" >{{ nameload(product.id) }}</a></h3>
        <p style="margin-bottom: 0;">{{ chartSizeload(product.id) }} | {{ chartSizeload(product.id) }}</p>
        <p>Chart Size | {{ chartSizeload(product.id) }}</p>
        <div class="price">

          <span class="new-price">AED {{ prizeload(product.id) }}.00</span>
        </div>
        <a href="#" class="add-to-cart">Add to Cart</a>
      </div>
    </div>
  </div>
</template>

<script>

    export default {
       data(){
        return{
            products: this.product
        }
       },
        props:[
            "product",
            'prod_id',
            'prod_name',
            'prod_price',
            'prod_sku',
            'prod_brand_id',
            'prod_brand_size',
            'prod_chart_size',
            'prod_thumbnail',
            ]
        

        ,
        methods:{
          
          imageload(id){
            // return "/assets/img/products/"+this.products[id-1].thumbnail;
            return "/assets/img/products/img/"+this.products.thumbnail;

          },
          nameload(id){
            return this.products.name 
          },
          chartSizeload(id){
            return this.products.chart_size 
          },
          prizeload(id){
            return this.products.price 
          },

        },
        mounted() {
            // this.product.forEach((item, index) => {
                // index += 1
                // console.log(index)
                // console.log(item)
            // })
            // console.log(this.products)
        }
    }
</script>
