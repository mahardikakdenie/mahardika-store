<template>
  <div class="home">
    <!-- <img alt="Vue logo" src="../assets/logo.png"> -->

    <Hero />
    <Banner :data="computedData" />
    <InstaImage />
    <Patner />
  </div>
</template>

<script>
// @ is an alias to /src
// import Header from "@/components/Header.vue";
import Hero from "@/components/Hero.vue";
import Banner from "@/components/Banner.vue";
import Patner from "@/components/Patner.vue";
import InstaImage from "@/components/InstaImage.vue";
// import Footer from "@/components/Footer.vue";

export default {
  name: "Home",
  components: {
    Hero,
    Banner,
    Patner,
    InstaImage,
  },
  computed: {
    computedData() {
      return this.$store.state.product.data;
    },
  },
  mounted() {
    this.getDataProduct();
  },
  methods: {
    getDataProduct() {
      this.$store.dispatch("product/getDataProduct", {
        entities: "galeries",
      });
    },
  },
};
</script>

<style scoped>
.product-item {
  margin-right: 25px;
}
</style>
