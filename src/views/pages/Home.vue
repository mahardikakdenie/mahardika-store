<template>
  <div class="home">
    <!-- <img alt="Vue logo" src="../assets/logo.png"> -->

    <Hero />
    <Banner />
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
};
</script>

<style scoped>
.product-item {
  margin-right: 25px;
}
</style>
