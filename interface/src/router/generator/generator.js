
export default [

    
           
   { name: 'schools', path: 'schools', component: () => import('pages/master/schools/index.vue') },
   { name: 'add-schools', path: 'schools/form', component: () => import('pages/master/schools/form.vue') },
   { name: 'edit-schools', path: 'schools/form/:id', component: () => import('pages/master/schools/form.vue') },
   { name: 'view-schools', path: 'schools/:id', component: () => import('pages/master/schools/detail.vue') },

           
   { name: 'studies', path: 'studies', component: () => import('pages/master/studies/index.vue') },
   { name: 'add-studies', path: 'studies/form', component: () => import('pages/master/studies/form.vue') },
   { name: 'edit-studies', path: 'studies/form/:id', component: () => import('pages/master/studies/form.vue') },
   { name: 'view-studies', path: 'studies/:id', component: () => import('pages/master/studies/detail.vue') },

           
   { name: 'classes', path: 'classes', component: () => import('pages/master/classes/index.vue') },
   { name: 'add-classes', path: 'classes/form', component: () => import('pages/master/classes/form.vue') },
   { name: 'edit-classes', path: 'classes/form/:id', component: () => import('pages/master/classes/form.vue') },
   { name: 'view-classes', path: 'classes/:id', component: () => import('pages/master/classes/detail.vue') },

           
   { name: 'lesson_timetable', path: 'lesson_timetable', component: () => import('pages/master/lesson_timetable/index.vue') },
   { name: 'add-lesson_timetable', path: 'lesson_timetable/form', component: () => import('pages/master/lesson_timetable/form.vue') },
   { name: 'edit-lesson_timetable', path: 'lesson_timetable/form/:id', component: () => import('pages/master/lesson_timetable/form.vue') },
   { name: 'view-lesson_timetable', path: 'lesson_timetable/:id', component: () => import('pages/master/lesson_timetable/detail.vue') },

           
   { name: 'presences', path: 'presences', component: () => import('pages/master/presences/index.vue') },
   { name: 'add-presences', path: 'presences/form', component: () => import('pages/master/presences/form.vue') },
   { name: 'edit-presences', path: 'presences/form/:id', component: () => import('pages/master/presences/form.vue') },
   { name: 'view-presences', path: 'presences/:id', component: () => import('pages/master/presences/detail.vue') },

           
   { name: 'contents', path: 'contents', component: () => import('pages/master/contents/index.vue') },
   { name: 'add-contents', path: 'contents/form', component: () => import('pages/master/contents/form.vue') },
   { name: 'edit-contents', path: 'contents/form/:id', component: () => import('pages/master/contents/form.vue') },
   { name: 'view-contents', path: 'contents/:id', component: () => import('pages/master/contents/detail.vue') },

              
];