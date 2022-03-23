<template>
  <div>
    <Header @login="login" :token="token" />
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
  mounted() {
    if (
      localStorage.getItem("acces_token") !== null ||
      localStorage.getItem("acces_token") !== ""
    ) {
      this.token = true;
    } else {
      this.token = false;
    }
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
  },
};
</script>

<style></style>
