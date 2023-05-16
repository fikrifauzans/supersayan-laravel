
import auth from './auth/index';
import master from './master/index';
import generator from './generator/generator'

const routes = [

  { path: '/', component: () => import('layouts/LandingPage.vue'), },
  {
    path: '/management',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', name: 'dashboard', component: () => import('pages/dashboard/index.vue'), },
      { path: 'docs', name: 'docs', component: () => import('pages/docs.vue'), },
      { path: 'profile', name: 'admin-profile', component: () => import('pages/auth/me/form.vue') },
      ...auth, ...master, ...generator

    ],
  },
  {
    path: '/login', component: () => import('layouts/LoginLayout.vue'),
    children: [
      { path: '', name: 'login', component: () => import('pages/login/login.vue') },
      { path: 'create', name: 'jamaah-create', component: () => import('pages/login/create.vue') },
      { path: 'verification', name: 'jamaah-verification', component: () => imprt('pages/login/verification.vue'), },
    ],
  },

  { path: '/print', component: () => import('layouts/Print.vue'), },
  { path: '/:catchAll(.*)*', component: () => import('pages/ErrorNotFound.vue'), },
  { path: '/403', component: () => import('pages/PermissionDenied.vue'), },
];

export default routes;