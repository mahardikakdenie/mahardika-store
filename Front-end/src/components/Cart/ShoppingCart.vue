<template>
  <!-- Shopping Cart Section Begin -->
  <section class="shopping-cart spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="row">
            <div class="col-lg-12">
              <div class="cart-table">
                <table>
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th class="p-name text-center">Product Name</th>
                      <th>Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(v, i) in cart" :key="i">
                      <td v-if="v.product" class="si-pic">
                        <div v-for="(item, i) in v.product.galeries" :key="i">
                          <img
                            class="rounded"
                            v-if="item.is_default"
                            :src="item.photo"
                            width="100%"
                            height="70"
                            alt=""
                          />
                        </div>
                      </td>
                      <td
                        v-if="v.product"
                        class="cart-title first-row text-center"
                      >
                        <h5>{{ v.product.name }}</h5>
                      </td>
                      <td class="p-price first-row" v-if="v.product">
                        ${{ v.product.price }}
                      </td>
                      <td class="delete-item">
                        <a href="#"
                          ><i class="material-icons" @click="destroyCart(v)">
                            close
                          </i></a
                        >
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-lg-8">
              <h4 class="mb-4 text-left">Informasi Pembeli:</h4>
              <div class="user-checkout text-left">
                <form>
                  <div class="form-group">
                    <label for="namaLengkap">Nama lengkap</label>
                    <input
                      v-model="form.name"
                      type="text"
                      class="form-control"
                      id="namaLengkap"
                      aria-describedby="namaHelp"
                      placeholder="Masukan Nama"
                    />
                  </div>
                  <div class="form-group">
                    <label for="namaLengkap">Email Address</label>
                    <input
                      v-model="form.email"
                      type="email"
                      class="form-control"
                      id="emailAddress"
                      aria-describedby="emailHelp"
                      placeholder="Masukan Email"
                    />
                  </div>
                  <div class="form-group">
                    <label for="namaLengkap">No. HP</label>
                    <input
                      v-model="form.contact"
                      type="text"
                      class="form-control"
                      id="noHP"
                      aria-describedby="noHPHelp"
                      placeholder="Masukan No. HP"
                    />
                  </div>
                  <div class="form-group">
                    <label for="alamatLengkap">Alamat Lengkap</label>
                    <textarea
                      v-model="form.address"
                      class="form-control"
                      id="alamatLengkap"
                      rows="3"
                    ></textarea>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="row">
            <div class="col-lg-12">
              <div class="proceed-checkout text-left">
                <ul>
                  <li class="subtotal">ID Transaction <span>#SH12000</span></li>
                  <li class="subtotal mt-3">
                    Subtotal <span>${{ total }}</span>
                  </li>
                  <li class="subtotal mt-3">Pajak <span>10%</span></li>
                  <li class="subtotal mt-3">
                    Total Biaya <span>${{ afterDiscount }}</span>
                  </li>
                  <li class="subtotal mt-3">
                    Bank Transfer <span>Mandiri</span>
                  </li>
                  <li class="subtotal mt-3">
                    No. Rekening <span>2208 1996 1403</span>
                  </li>
                  <li class="subtotal mt-3">
                    Nama Penerima <span>Shayna</span>
                  </li>
                </ul>
                <button @click="paid(cart)" class="proceed-btn">
                  I ALREADY PAID
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Shopping Cart Section End -->
</template>

<script>
export default {
  props: {
    cart: {
      type: Array,
      required: true,
    },
  },
  data: () => ({
    form: {
      name: "",
      email: "",
      contact: "",
      address: "",
    },
  }),
  computed: {
    total() {
      return this.cart.reduce((acc, v) => {
        return acc + v.product.price;
      }, 0);
    },
    afterDiscount() {
      return this.total - this.total * 0.1;
    },
  },
  methods: {
    destroyCart(item) {
      this.$emit("destroy", item);
    },
    paid(item) {
      this.$emit("paid", {
        item: item,
        form: this.form,
        after_discount: this.afterDiscount,
      });
    },
  },
};
</script>

<style></style>
