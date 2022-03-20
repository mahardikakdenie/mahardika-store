<template>
  <!-- Hero Section Begin -->
  <section class="hero-section">
    <!-- <div class=" owl-carousel"></div> -->
    <carousel
      class="hero-items"
      :dots="false"
      :items="1"
      :nav="false"
      :autoplay="true"
    >
      <!-- <template slot="prev"><span class="prev">prev</span></template> -->
      <div
        class="single-hero-items set-bg"
        style="background-image: url('img/hero-1.jpg')"
      >
        <div class="container">
          <div class="row">
            <div class="col-lg-5">
              <span>Bag,kids</span>
              <h1>Black friday</h1>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                eiusmod tempor incididunt ut labore et dolore
              </p>
              <a href="#" class="primary-btn">Shop Now</a>
            </div>
          </div>
        </div>
      </div>
      <div
        class="single-hero-items set-bg"
        style="background-image: url('img/hero-2.jpg')"
      >
        <div class="container">
          <div class="row">
            <div class="col-lg-5">
              <span>Bag,kids</span>
              <h1>Black friday</h1>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                eiusmod tempor incididunt ut labore et dolore
              </p>
              <a href="#" class="primary-btn">Shop Now</a>
            </div>
          </div>
        </div>
      </div>

      <!-- <template slot="next"><span class="next">next</span></template> -->
    </carousel>
  </section>
  <!-- Hero Section End -->
</template>

<script>
import carousel from "vue-owl-carousel";
export default {
  components: {
    carousel,
  },
};
</script>
