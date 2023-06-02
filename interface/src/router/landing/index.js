export default [
    { name: 'home', path: 'home', component: () => import('pages/landing/home.vue') },
    { name: 'paket', path: 'paket', component: () => import('pages/landing/paket.vue') },
    { name: 'paket', path: 'paket', component: () => import('pages/landing/paket.vue')  },
    { name: 'dokumentasi', path: 'dokumentasi', component: () => import('pages/landing/dokumentasi.vue') },
    { name: 'tentang-kami', path: 'tentang-kami', component: () => import('pages/landing/tentang-kami.vue') },
    { name: 'ruang-edukasi', path: 'ruang-edukasi', component: () => import('pages/landing/ruang-edukasi.vue') },
    { name: 'ruang-edukasi-detail', path: 'ruang-edukasi/:id', component: () => import('pages/landing/ruang-edukasi.vue') },
]