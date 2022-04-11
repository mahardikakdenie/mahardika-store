<template>
  <div>
    <Thumb />
    <ShoppingCart :cart="computedCart" @destroy="deleteDataCart" @paid="paid" />
  </div>
</template>

<script>
import Thumb from "@/components/Cart/Thumb.vue";
import ShoppingCart from "@/components/Cart/ShoppingCart.vue";
export default {
  components: {
    Thumb,
    ShoppingCart,
  },
  computed: {
    computedCart() {
      return this.$store.state.cart.data;
    },
  },
  mounted() {
    this.getDataCart();
  },
  methods: {
    paid({ item, form, after_discount }) {
      for (const v in item) {
        if (Object.hasOwnProperty.call(item, v)) {
          const items = item[v];
          this.$store
            .dispatch("transaction/storeDataTransaction", {
              product_id: items.product.id,
              name: form.name,
              email: form.email,
              number: form.contact,
              address: form.address,
              transaction_total: after_discount,
            })
            .then((res) => {
              if (res.data.meta.status) {
                this.$router.push("/success");
                const Toast = this.$swal.mixin({
                  toast: true,
                  position: "bottom-end",
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  didOpen: (toast) => {
                    toast.addEventListener("mouseenter", this.$swal.stopTimer);
                    toast.addEventListener(
                      "mouseleave",
                      this.$swal.resumeTimer
                    );
                  },
                  popup: "swal2-show",
                  backdrop: "swal2-backdrop-show",
                  icon: "swal2-icon-show",
                });
                Toast.fire({
                  icon: "success",
                  title: "Success",
                });
                this.deleteCheckOut(items.id);
              }
            });
        }
      }
    },
    getDataCart() {
      this.$store.dispatch("cart/getDataCart", {
        entities: "product.galeries",
      });
    },
    deleteDataCart(item) {
      this.$store
        .dispatch("cart/deleteDataCart", {
          id: item.id,
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
                toast.addEventListene$r("mouseenter", this.swal.stopTimer);
                toast.addEventListener("mouseleave", this.$swal.resumeTimer);
              },
              popup: "swal2-show",
              backdrop: "swal2-backdrop-show",
              icon: "swal2-icon-show",
            });
            Toast.fire({
              icon: "success",
              title: "Deletes",
            });
          }
        });
    },
    deleteCheckOut(id) {
      this.$store.dispatch("cart/deleteDataCart", { id: id });
    },
  },
};
</script>

<style></style>
