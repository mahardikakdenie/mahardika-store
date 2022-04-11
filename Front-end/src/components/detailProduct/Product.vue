<template>
  <!-- Product Shop Section Begin -->
  <section class="product-shop spad page-details">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6">
              <div class="product-pic-zoom">
                <img class="product-big-img" :src="img_default" alt="" />
              </div>
              <div class="product-thumbs">
                <carousel
                  :items="4"
                  :nav="false"
                  :dots="false"
                  :autoplay="true"
                  class="product-thumbs-track ps-slider"
                >
                  <div
                    v-for="(img, index) in data.galeries"
                    :key="index"
                    @click="clickImg(img.photo)"
                    class="pt rounded-lg"
                    :class="`${img_default === img.photo ? 'active' : ''}`"
                  >
                    <img :src="img.photo" alt="" />
                  </div>
                </carousel>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="product-details text-left">
                <div class="pd-title">
                  <span>{{ data.type }}</span>
                  <h3>{{ data.name }}</h3>
                </div>
                <div class="pd-desc">
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Corporis, error officia. Rem aperiam laborum voluptatum vel,
                    pariatur modi hic provident eum iure natus quos non a sequi,
                    id accusantium! Autem.
                  </p>
                  <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                    Quam possimus quisquam animi, commodi, nihil voluptate
                    nostrum neque architecto illo officiis doloremque et
                    corrupti cupiditate voluptatibus error illum. Commodi
                    expedita animi nulla aspernatur. Id asperiores blanditiis,
                    omnis repudiandae iste inventore cum, quam sint molestiae
                    accusamus voluptates ex tempora illum sit perspiciatis.
                    Nostrum dolor tenetur amet, illo natus magni veniam quia sit
                    nihil dolores. Commodi ratione distinctio harum voluptatum
                    velit facilis voluptas animi non laudantium, id dolorem
                    atque perferendis enim ducimus? A exercitationem recusandae
                    aliquam quod. Itaque inventore obcaecati, unde quam impedit
                    praesentium veritatis quis beatae ea atque perferendis
                    voluptates velit architecto?
                  </p>
                  <h4>${{ data.price }}</h4>
                </div>
                <div class="quantity">
                  <a @click="addCart" class="cursor-pointer primary-btn pd-cart"
                    >Add To Cart</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Product Shop Section End -->
</template>

<script>
import carousel from "vue-owl-carousel";
export default {
  components: {
    carousel,
  },
  props: {
    imgs: {
      type: Array,
      default: null,
    },
    // img_default: {
    //   type: String,
    //   default: null,
    // },
    data: {
      type: Object,
      default: null,
    },
  },
  data: () => ({
    img_default: "img/mickey1.jpg",
  }),
  mounted() {
    for (const item in this.data.galeries) {
      if (Object.hasOwnProperty.call(this.data.galeries, item)) {
        const img = this.data.galeries[item];
        if (img.is_default) {
          this.img_default = img.photo;
        }
      }
    }
  },
  methods: {
    clickImg(url) {
      this.img_default = url;
    },
    addCart() {
      this.$emit("add-cart");
    },
  },
};
</script>

<style scoped>
.product-thumbs .pt {
  margin-right: 14px;
}
.cursor-pointer {
  cursor: pointer;
}
</style>
