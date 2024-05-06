<template>
	<div class="woocommerce-widget price-list-widget">
                <h3 class="woocommerce-widget-title" @click="isPriceActive = !isPriceActive" style="cursor: pointer;">Price <i class='bx bx-chevron-down' style="float: right;"></i></h3>
                <!-- <h3 class="woocommerce-widget-title" data-bs-toggle="collapse" data-bs-target="#price" aria-expanded="true" style="cursor: pointer;">Price <i class='bx bx-chevron-down' style="float: right;"></i></h3> -->

                <div class="collection-filter-by-price collapse" :class="[  isPriceActive ? 'show' : 'collapsing' ]" id="price" style="">
                    <!-- <input class="js-range-of-price" type="range" min="0" max="100" step="1" >  -->
                    <!-- <input class="js-range-of-price" type="text" data-min="0" data-max="1055" name="filter_by_price" data-step="10"> -->
                    <div class="content">
					  <div id="my-slider" :se-min="minThreshold" :se-step="step" :se-min-value="min" :se-max-value="max" :se-max="maxThreshold" class="slider">
					    <div class="slider-touch-left">
					      <span></span>
					    </div>
					    <div class="slider-touch-right">
					      <span></span>
					    </div>
					    <div class="slider-line">
					      <span></span>
					    </div>
					  </div>
					</div>
                </div>
            </div>
</template>

<script >
// import rangeSlider from './rangeSlider.js'

export default {
  props: {
    minThreshold: {
      type: Number,
      default: 0
    },
    maxThreshold: {
      type: Number,
      default: 160
    },
    step: {
      type: Number,
      default: 1
    },
    min: {
      type: Number,
      required: true
    },
    max: {
      type: Number,
      required: true
    }
  },
  data: function () {
    return {
      instance: undefined,
   	  isPriceActive : false,

    }
  },
  mounted: function () {
    this.instance = new rangeSlider('my-slider')
    this.instance.onChange = (min, max) => this.updateValues(min, max)
  },
  destroyed: function () {

  },
  methods: {
    updateValues: function (min, max) {
      this.$emit('update:min', min)
      this.$emit('update:max', max)
    }
  }
}
</script>

<style>
.slider {
  display: block;
  position: relative;
  height: 36px;
  width: 100%;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -o-user-select: none;
  user-select: none;
}
.slider .slider-touch-left,
.slider .slider-touch-right {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  display: block;
  position: absolute;
  height: 36px;
  width: 36px;
  padding: 6px;
  z-index: 2;
}
.slider .slider-touch-left span,
.slider .slider-touch-right span {
  display: block;
  width: 100%;
  height: 100%;
  background: #f0f0f0;
  border: 1px solid #a4a4a4;
  border-radius: 50%;
}
.slider .slider-line {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  position: absolute;
  width: calc(100% - 36px);
  left: 18px;
  top: 16px;
  height: 4px;
  border-radius: 4px;
  background: #f0f0f0;
  z-index: 0;
  overflow: hidden;
}
.slider .slider-line span {
  display: block;
  height: 100%;
  width: 0%;
  background: orange;
}
/*input[type="range"] {
  -webkit-appearance: none;
  margin-right: 15px;
  width: 200px;
  height: 7px;
  background: #66bf01;
  border-radius: 5px;
  background-image: linear-gradient(#66bf01, #66bf01);
  background-size: 700% 20%;
  background-repeat: no-repeat;
}

input[type="range"]::-webkit-slider-thumb, input[type=”range”]::-moz-range-thumb {
  -webkit-appearance: none;
  height: 20px;
  width: 20px;
  border-radius: 50%;
  background: #66bf01;
  cursor: ew-resize;
  box-shadow: 0 0 2px 0 #555;
  transition: background .3s ease-in-out;
  margin-top: 50px;
  margin-bottom: auto;
}

input[type=range]::-webkit-slider-runnable-track  {
  -webkit-appearance: none;
  box-shadow: none;
  border: none;
  background: transparent;
}*/
</style>



