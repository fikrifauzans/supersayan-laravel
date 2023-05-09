export default [
  { name: "packages", path: "packages", component: () => import("pages/transaction/packages/index.vue") },
  { name: "add-packages", path: "packages/form", component: () => import("src/pages/master/master-packages/form.vue"), },
  { name: "edit-packages", path: "packages/form/:id", component: () => import("src/pages/master/master-packages/form.vue"), },
  { name: "view-packages", path: "packages/:id", component: () => import("pages/transaction/packages/detail.vue"), },
  // -----------------------------------------------------------------------
  { name: "booking-packages", path: "booking-packages", component: () => import("pages/transaction/booking-packages/index.vue") },
  { name: "add-booking-packages", path: "booking-packages/form", component: () => import("pages/transaction/booking-packages/form.vue") },
  { name: "edit-booking-packages", path: "booking-packages/form/:id", component: () => import("pages/transaction/booking-packages/form.vue"), },
  {
    name: "view-booking-packages",
    path: "booking-packages/:id",
    component: () => import("pages/transaction/booking-packages/detail.vue"),
  },
  {
    name: "transaction-booking-packages",
    path: "booking-packages/:id/:trId",
    component: () => import("pages/transaction/booking-packages/detail.vue"),
  },
  // -----------------------------------------------------------------------
  {
    name: "inventories",
    path: "inventories",
    component: () => import("pages/transaction/inventories/index.vue"),
  },
  {
    name: "add-inventories",
    path: "inventories/form",
    component: () => import("pages/transaction/inventories/form.vue"),
  },
  {
    name: "edit-inventories",
    path: "inventories/form/:id",
    component: () => import("pages/transaction/inventories/form.vue"),
  },
  {
    name: "view-inventories",
    path: "inventories/:id",
    component: () => import("pages/transaction/inventories/detail.vue"),
  },
  // -----------------------------------------------------------------------
  {
    name: "orders",
    path: "orders",
    component: () => import("pages/transaction/orders/index.vue"),
  },
  {
    name: "add-jamaahs",
    path: "jamaahs/form",
    component: () => import("pages/master/master-jamaahs/form.vue"),
  },
  {
    name: "edit-jamaahs",
    path: "jamaahs/form/:id",
    component: () => import("pages/master/master-jamaahs/form.vue"),
  },
  {
    name: "view-orders",
    path: "orders/:id",
    component: () => import("pages/transaction/orders/detail.vue"),
  },
  // -----------------------------------------------------------------------
  {
    name: "dashboard-cso",
    path: "dashboard-cso",
    component: () => import("pages/transaction/dashboard-cso/index.vue"),
  },
  // {
  //   name: "add-dashboard-cso",
  //   path: "dashboard-cso/form",
  //   component: () => import("pages/transaction/dashboard-cso/form.vue"),
  // },
  // {
  //   name: "edit-dashboard-cso",
  //   path: "dashboard-cso/form/:id",
  //   component: () => import("pages/transaction/dashboard-cso/form.vue"),
  // },
  {
    name: "view-dashboard-cso",
    path: "dashboard-cso/:id",
    component: () => import("pages/transaction/dashboard-cso/detail.vue"),
  },
  // -----------------------------------------------------------------------
  {
    name: "agents",
    path: "agents",
    component: () => import("pages/transaction/agents/index.vue"),
  },
  {
    name: "add-agents",
    path: "agents/form",
    component: () => import("pages/transaction/agents/form.vue"),
  },
  {
    name: "edit-agents",
    path: "agents/form/:id",
    component: () => import("pages/transaction/agents/form.vue"),
  },
  {
    name: "view-agents",
    path: "agents/:id",
    component: () => import("pages/transaction/agents/detail.vue"),
  },
  // -----------------------------------------------------------------------
  {
    name: "store-fronts",
    path: "store-fronts",
    component: () => import("pages/transaction/store-fronts/index.vue"),
  },
  {
    name: "add-store-fronts",
    path: "store-fronts/form",
    component: () => import("pages/transaction/store-fronts/form.vue"),
  },
  {
    name: "edit-store-fronts",
    path: "store-fronts/form/:id",
    component: () => import("pages/transaction/store-fronts/form.vue"),
  },
  {
    name: "view-store-fronts",
    path: "store-fronts/:id",
    component: () => import("pages/transaction/store-fronts/detail.vue"),
  },
];
