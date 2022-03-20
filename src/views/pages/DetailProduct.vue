<template>
  <div class="about">
    <Thumb />
    <product :img_default="img_default" :imgs="imgs" @change="clickImg" />
    <Related />
  </div>
</template>

<script>
import Thumb from "@/components/detailProduct/Thumb.vue";
import Product from "@/components/detailProduct/Product.vue";
import Related from "@/components/detailProduct/Related.vue";
export default {
  components: {
    Thumb,
    Product,
    Related,
  },

  data: () => ({
    img_default: "img/mickey1.jpg",
    imgs: [
      "img/mickey1.jpg",
      "img/mickey2.jpg",
      "img/mickey3.jpg",
      "img/mickey4.jpg",
    ],
  }),
  methods: {
    clickImg(number) {
      if (number >= 1) this.img_default = `img/mickey${number}.jpg`;
      else return (this.img_default = "img/mickey1.jpg");
    },
  },
};
</script>
