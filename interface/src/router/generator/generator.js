
export default [

    
           
   { name: 'klinik-kebidanan', path: 'klinik-kebidanan', component: () => import('pages/transaction/klinik-kebidanan/index.vue') },
   { name: 'add-klinik-kebidanan', path: 'klinik-kebidanan/form', component: () => import('pages/transaction/klinik-kebidanan/form.vue') },
   { name: 'edit-klinik-kebidanan', path: 'klinik-kebidanan/form/:id', component: () => import('pages/transaction/klinik-kebidanan/form.vue') },
   { name: 'view-klinik-kebidanan', path: 'klinik-kebidanan/:id', component: () => import('pages/transaction/klinik-kebidanan/detail.vue') },

           
   { name: 'konseling', path: 'konseling', component: () => import('pages/transaction/konseling/index.vue') },
   { name: 'add-konseling', path: 'konseling/form', component: () => import('pages/transaction/konseling/form.vue') },
   { name: 'edit-konseling', path: 'konseling/form/:id', component: () => import('pages/transaction/konseling/form.vue') },
   { name: 'view-konseling', path: 'konseling/:id', component: () => import('pages/transaction/konseling/detail.vue') },

           
   { name: 'personalisasi', path: 'personalisasi', component: () => import('pages/transaction/personalisasi/index.vue') },
   { name: 'add-personalisasi', path: 'personalisasi/form', component: () => import('pages/transaction/personalisasi/form.vue') },
   { name: 'edit-personalisasi', path: 'personalisasi/form/:id', component: () => import('pages/transaction/personalisasi/form.vue') },
   { name: 'view-personalisasi', path: 'personalisasi/:id', component: () => import('pages/transaction/personalisasi/detail.vue') },

           
   { name: 'simulasi', path: 'simulasi', component: () => import('pages/transaction/simulasi/index.vue') },
   { name: 'add-simulasi', path: 'simulasi/form', component: () => import('pages/transaction/simulasi/form.vue') },
   { name: 'edit-simulasi', path: 'simulasi/form/:id', component: () => import('pages/transaction/simulasi/form.vue') },
   { name: 'view-simulasi', path: 'simulasi/:id', component: () => import('pages/transaction/simulasi/detail.vue') },

   { name: 'rekap-simulasi', path: 'rekap-simulasi', component: () => import('pages/transaction/rekap-simulasi/index.vue') },
   { name: 'add-rekap-simulasi', path: 'rekap-simulasi/form', component: () => import('pages/transaction/rekap-simulasi/form.vue') },
   { name: 'edit-rekap-simulasi', path: 'rekap-simulasi/form/:id', component: () => import('pages/transaction/rekap-simulasi/form.vue') },
   { name: 'view-rekap-simulasi', path: 'rekap-simulasi/:id', component: () => import('pages/transaction/rekap-simulasi/detail.vue') },

              
];