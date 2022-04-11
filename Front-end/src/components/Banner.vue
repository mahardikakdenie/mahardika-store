<template>
  <!-- Women Banner Section Begin -->
  <section class="women-banner spad">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 mt-5">
          <carousel
            class="product-slider"
            :items="3"
            :loop="true"
            :autoplay="false"
            :nav="false"
            :dots="false"
          >
            <div v-for="(item, i) in data" :key="i" class="product-item">
              <div class="pi-pic">
                <div v-if="item.galeries">
                  <div v-for="(img, i) in item.galeries" :key="i">
                    <img
                      v-if="img.is_default === 1"
                      class="rounded-lg"
                      :src="img.photo"
                      alt=""
                    />
                  </div>
                </div>

                <div v-else>
                  <img src="img/mickey1.jpg" alt="" />
                </div>

                <ul>
                  <li class="w-icon active">
                    <router-link :to="`product?id=${item.id}`"
                      ><i class="icon_bag_alt"></i
                    ></router-link>
                  </li>
                  <li class="quick-view">
                    <router-link :to="`product?id=${item.id}`"
                      >+ Quick View</router-link
                    >
                  </li>
                </ul>
              </div>
              <div class="pi-text">
                <div class="catagory-name">{{ item.id }}</div>
                <router-link :to="`product?id=${item.id}`">
                  <h5>{{ item.name }}</h5>
                </router-link>
                <div class="product-price">
                  ${{ item.price }}
                  <!-- <span>$35.00</span> -->
                </div>
              </div>
            </div>
          </carousel>
        </div>
      </div>
    </div>
  </section>
  <!-- Women Banner Section End -->
</template>

<script>
import carousel from "vue-owl-carousel";
export default {
  props: {
    data: {
      type: Array,
      default: null,
    },
  },
  components: {
    carousel,
  },
};
</script>

<style></style>
