<template>
  <header class="header-section">
    <div class="header-top">
      <div class="container">
        <div class="ht-left">
          <div class="mail-service">
            <i class="fa fa-envelope"></i> dikamahar884@gmail.com
          </div>
          <div class="phone-service">
            <i class="fa fa-phone"></i> +628 9621174934
          </div>
        </div>
        <div vels class="ht-right">
          <div v-if="token" class="mail-service mt-2 mb-2">
            <button
              type="button"
              class="btn btn-outline-warning"
              style="width: 180px"
              @click="login"
            >
              <span class="text-red">Login</span>
            </button>
            <button
              style="width: 140px"
              type="button"
              class="btn btn-warning ml-1"
            >
              <span class="text-white">Register</span>
            </button>
          </div>
          <div v-else class="mail-service d-flex mt-2 mb-2">
            <!-- Example single danger button -->
            <div class="btn-group">
              <button
                type="button"
                class="btn btn-danger dropdown-toggle"
                data-toggle="dropdown-menu"
                aria-expanded="true"
              >
                Action
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>
              </div>
            </div>
            <button
              style="width: 140px; height: 37px"
              type="button"
              class="btn btn-warning ml-1 btn-small"
            >
              <span class="text-white">Logout</span>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="inner-header">
        <div class="row">
          <div class="col-lg-2 col-md-2">
            <div class="logo">
              <router-link class="h3" to="/">
                <!-- <img src="img/logo_website_shayna.png" alt="" /> -->
                <i class="fa fa-shopping-cart text-warning"></i>
                <span style="color: black" class="ml-2">StoreVue</span>
              </router-link>
            </div>
          </div>
          <div class="col-lg-7 col-md-7"></div>
          <div class="col-lg-3 text-right col-md-3">
            <ul class="nav-right mt-1">
              <li class="cart-icon">
                Keranjang Belanja &nbsp;
                <a href="#">
                  <i class="icon_bag_alt text-warning"></i>
                  <span>{{ cart.length }}</span>
                </a>
                <div class="cart-hover">
                  <div class="select-items">
                    <table>
                      <tbody v-if="cart.length > 0">
                        <tr v-for="(data, i) in cart" :key="i">
                          <td v-if="data.product" class="si-pic">
                            <div
                              v-for="(item, i) in data.product.galeries"
                              :key="i"
                            >
                              <img
                                v-if="item.is_default"
                                :src="item.photo"
                                width="100%"
                                height="70"
                                alt=""
                                class="rounded-lg"
                              />
                            </div>
                          </td>
                          <td v-else>
                            <img
                              class="rounded-lg"
                              src="img/select-product-1.jpg"
                              alt=""
                            />
                          </td>
                          <td v-if="data.product" class="si-text">
                            <div class="product-selected">
                              <p>${{ data.product.price }}</p>
                              <h6>{{ data.product.name }}</h6>
                            </div>
                          </td>
                          <td class="si-close">
                            <i class="ti-close"></i>
                          </td>
                        </tr>
                      </tbody>
                      <tbody v-else>
                        <tr>
                          <td>
                            <span class="text-center">Tidak Data</span>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="select-total">
                    <span>total:</span>
                    <h5>${{ total }}</h5>
                  </div>
                  <div class="select-button">
                    <!-- <a href="#" class="primary-btn view-card">VIEW CARD</a> -->
                    <a
                      @click="checkout"
                      style="cursor: pointer"
                      class="primary-btn checkout-btn"
                      >CHECK OUT</a
                    >
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
// import axios from "axios";
export default {
  name: "HelloWorld",
  props: {
    msg: String,
    token: Boolean,
    cart: {
      type: Array,
      default: null,
    },
  },

  computed: {
    total() {
      return this.cart.reduce((total, data) => {
        return total + data.product.price;
      }, 0);
    },
  },

  methods: {
    login() {
      this.$emit("login");
    },
    register() {
      this.$emit("register");
    },
    checkout() {
      this.$emit("checkout", {
        cart: this.cart,
        total: this.total,
      });
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
