<template>
  <div>
    <Header
      @login="login"
      :token="token"
      :cart="computedCart"
      @checkout="goCart"
    />
    <router-view />
    <Footer />
  </div>
</template>

<script>
import Header from "@/components/Header.vue";
import Footer from "@/components/Footer.vue";
export default {
  components: {
    Header,
    Footer,
  },
  data: () => ({
    token: false,
  }),
  computed: {
    computedCart() {
      return this.$store.state.cart.data;
    },
  },
  mounted() {
    if (
      localStorage.getItem("acces_token") !== null ||
      localStorage.getItem("acces_token") !== ""
    ) {
      this.token = true;
    } else {
      this.token = false;
    }
    this.getDataCart();
  },
  methods: {
    async login() {
      const { value: formValues } = await this.$swal.fire({
        title: "Login StoreVue",
        html:
          '<input id="swal-input1" placeholder="email" class="swal2-input">' +
          '<input id="swal-input2" type="password" placeholder="password" class="swal2-input">',
        focusConfirm: false,
        preConfirm: () => {
          return [
            document.getElementById("swal-input1").value,
            document.getElementById("swal-input2").value,
          ];
        },
        showCancelButton: true,
      });
      if (formValues) {
        console.log(formValues);
        this.$store
          .dispatch("auth/login", {
            email: formValues[0],
            password: formValues[1],
          })
          .then((res) => {
            console.log(res);
            if (res.data.meta.status) {
              this.$swal.fire({
                title: "Login Success",
                text: "You have been logged in",
                icon: "success",
              });
              this.token = true;
            } else {
              this.$swal.fire({
                title: "Login Failed",
                text: "Please check your email and password",
                icon: "error",
              });
            }
          });
      }
    },
    getDataCart() {
      this.$store.dispatch("cart/getDataCart", {
        entities: "product.galeries",
      });
    },
    goCart() {
      this.$router.push("/cart");
    },
    storeDataTransaction({ cart, total }) {
      console.log(cart);
      console.log(total);
      this.$store
        .dispatch("transaction/storeDataTransaction", {
          // entities: "details.product.galeries",
          name: "User Shayna",
          email: "Email User",
          number: "phone number",
          address: "email User",
          transaction_total: total,
          product_id: cart.product.id,
        })
        .then((res) => {
          if (res.data.meta.status) {
            this.$router.push("/cart");
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
              title: "Checkout",
            });
          }
        });
    },
  },
};
</script>

<style></style>
