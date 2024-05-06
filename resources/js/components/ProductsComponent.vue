<template>
    <div class="col-lg-10 col-md-12">
        <div class="products-filter-options">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4">
                    <div class="d-lg-flex d-md-flex align-items-center">
                        <span class="sub-title d-lg-none"><a  data-bs-toggle="modal" data-bs-target="#productsFilterModal"><i class='bx bx-filter-alt'></i> Filter</a></span>
                        <span class="sub-title d-none d-lg-block d-md-block">View:</span>
                        <div class="view-list-row d-none d-lg-block d-md-block">
                            <div class="view-column">
                                <a href="#" class="icon-view-one">
                                    <span></span>
                                </a>

                                <a href="#" class="icon-view-two">
                                    <span></span>
                                    <span></span>
                                </a>

                                <a href="#" class="icon-view-three active">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>

                                <a href="#" class="view-grid-switch">
                                    <span></span>
                                    <span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <p>Total 100</p>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="products-ordering-list">
                        <div tabindex="0" class="nice-select open">
                            <span class="current">Sort by Price: Low to High</span>
                            <ul class="list">
                                <li data-value="Sort by Price: Low to High" class="option selected focus">Sort by Price: Low to High</li>
                                <li data-value="Default Sorting" class="option">Default Sorting</li>
                                <li data-value="Sort by Popularity" class="option">Sort by Popularity</li>
                                <li data-value="Sort by Average Rating" class="option">Sort by Average Rating</li>
                                <li data-value="Sort by Latest" class="option">Sort by Latest</li>
                                <li data-value="Sort by Price: High to Low" class="option">Sort by Price: High to Low</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="products-collections-filter" class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 products-col-item" v-for="item in items">
                <div class="single-products-box">
                    <div class="products-image">
                        <a :href="link">
                            <img :src="imageload(item)" class="main-image" alt="image">
                            <img :src="imageload(item)" class="hover-image" alt="image">
                        </a>

                        <div class="products-button">
                            <ul>
                                <li>
                                    <div class="wishlist-btn">
                                        <a :href="link">
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
                        <h3><a :href="link" style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;">{{ item.name }}</a></h3>
                        <p style="margin-bottom: 0;">{{ item.brand_name }} | {{ item.brand_size }}</p>
                        <p>Chart Size | {{ item.chart_size }}</p>
                        <div class="price">
                                                
                            <span class="new-price">AED {{ item.price }}.00</span>
                        </div>
                        <a href="#" class="add-to-cart">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: 'ProductsComponent',
        data(){
        return{
                // products: this.product
                // items: Object.entries(this.product).map(function([key, value], index) {
                //             console.log({...value, key})
                //             return { ...value, key };
                //             })
                items: this.products,
                // .map(function(item, index) {
                //             console.log({key: index+1, value: item})
                //             return { key: index+1, value: item };
                //     }),
            }
       },
        props:[
            "link",
            "products",
            ]
        ,
        methods:{
          
          imageload(id){
            return "/assets/img/products/img/"+id.thumbnail;
            // return "/assets/img/products/"+this.products.thumbnail;

          },
          nameload(id){
            // return this.products.name 
          },
          chartSizeload(id){
            // return this.products.chart_size 
          },
          prizeload(id){
            // return this.products.price 
          },

        },
        mounted() {
            // this.products.forEach((item, index) => {
            //     index += 1
            //     console.log(index)
            //     console.log(item)
            // })
            // console.log(this.products)
        }
    }
</script>
