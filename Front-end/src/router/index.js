import Vue from "vue";
import VueRouter from "vue-router";
import Index from "../views/Index.vue";
import Home from "../views/pages/Home.vue";

Vue.use(VueRouter);

const routes = [
  {
    name: "Index",
    path: "/",
    component: Index,
    children: [
      {
        path: "/",
        name: "Home",
        component: Home,
      },
      {
        path: "/detail-product",
        name: "About",
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () =>
          import(
            /* webpackChunkName: "about" */ "../views/pages/DetailProduct.vue"
          ),
      },
      {
        path: "/cart",
        name: "Cart",
        component: () => import("@/views/pages/Cart.vue"),
      },
      {
        path: "/success",
        name: "Success",
        component: () => import("@/views/pages/Success.vue"),
      },
    ],
  },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

export default router;
