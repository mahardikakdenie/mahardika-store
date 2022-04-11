<template>
  <div class="about">
    <Thumb />
    <product
      :img_default="img_default"
      :data="computedShow"
      :imgs="imgs"
      @change="clickImg"
      @add-cart="addCart"
    />
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
  computed: {
    computedShow() {
      return this.$store.state.product.show;
    },
  },
  mounted() {
    console.log("id", this.$route.query.id);
    this.getShowProduct();
  },
  methods: {
    clickImg(number) {
      if (number >= 1) this.img_default = `img/mickey${number}.jpg`;
      else return (this.img_default = "img/mickey1.jpg");
    },
    getShowProduct() {
      this.$store
        .dispatch("product/getShowProduct", {
          id: this.$route.query.id,
          entities: "galeries",
        })
        .then((res) => {
          console.log(res.data.data);
        });
    },
    addCart() {
      this.$store
        .dispatch("cart/insertDataCart", {
          products_id: this.$route.query.id,
        })
        .then((res) => {
          if (res.data.meta.status) {
            const Toast = this.$swal.mixin({
              toast: true,
              position: "bottom-end",
              showConfirmButton: false,
              timer: 3000,
              timerProgressBar: true,
              didOpen: (toast) => {
                toast.addEventListener("mouseenter", this.$swal.stopTimer);
                toast.addEventListener("mouseleave", this.$swal.resumeTimer);
              },
              popup: "swal2-show",
              backdrop: "swal2-backdrop-show",
              icon: "swal2-icon-show",
            });
            Toast.fire({
              icon: "success",
              title: `${res.data.data.product.name} Product has been successfully added to cart`,
            });
            this.$router.push("/");
          }
        });
    },
  },
};
</script>
