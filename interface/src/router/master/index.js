export default [
  {
    name: "categories",
    path: "categories",
    component: () => import("pages/master/categories/index.vue"),
  },
  {
    name: "add-categories",
    path: "categories/form",
    component: () => import("pages/master/categories/form.vue"),
  },
  {
    name: "edit-categories",
    path: "categories/form/:id",
    component: () => import("pages/master/categories/form.vue"),
  },
  {
    name: "view-categories",
    path: "categories/:id",
    component: () => import("pages/master/categories/detail.vue"),
  },
 
];
