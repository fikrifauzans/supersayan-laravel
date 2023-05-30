
export default [




   { name: 'contents', path: 'contents', component: () => import('pages/master/contents/index.vue') },
   { name: 'add-contents', path: 'contents/form', component: () => import('pages/master/contents/form.vue') },
   { name: 'edit-contents', path: 'contents/form/:id', component: () => import('pages/master/contents/form.vue') },
   { name: 'view-contents', path: 'contents/:id', component: () => import('pages/master/contents/detail.vue') },


];