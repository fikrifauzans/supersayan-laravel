
export default [

    
           
   { name: 'lesson_timetable', path: 'lesson_timetable', component: () => import('pages/master/lesson_timetable/index.vue') },
   { name: 'add-lesson_timetable', path: 'lesson_timetable/form', component: () => import('pages/master/lesson_timetable/form.vue') },
   { name: 'edit-lesson_timetable', path: 'lesson_timetable/form/:id', component: () => import('pages/master/lesson_timetable/form.vue') },
   { name: 'view-lesson_timetable', path: 'lesson_timetable/:id', component: () => import('pages/master/lesson_timetable/detail.vue') },

              
];