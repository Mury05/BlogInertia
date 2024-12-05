// import HomeView from '@/views/HomeView.vue'
// import LoginView from '@/views/Authentication/LoginView.vue'
// import RegisterView from '@/views/Authentication/RegisterView.vue'
import Dashboard from '@/Pages/Dashboard.vue';
import AllUsers from '@/Pages/Dashboard/Users/AllUsers.vue';
// import Dashboard from '@/views/Dashboard/Dashboard.vue'
// import errorComponent from '@/components/errorComponent.vue'
// import NewJob from '@/views/Dashboard/New-Job.vue'
// import Profile from '@/views/Dashboard/Profile.vue'
// import Stats from '@/views/Dashboard/Stats.vue'
// import { getData } from '@/utils'
import { createRouter, createWebHistory } from 'vue-router'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    // {
    //   path: '/',
    //   name: 'home',
    //   component: HomeView,
    // },
    // {
    //   path: '/login',
    //   name: 'login',
    //   component: LoginView,
    // },
    // {
    //   path: '/register',
    //   name: 'register',
    //   component: RegisterView,
    // },
    {
      path: '/dashboard',
      meta: { require: true },
      children: [
        {
            path: '', // Route par défaut du dashboard
            name: 'dashboard.home',
            // component: Dashboard, // Composant principal du dashboard
        },
    ],
    },

    {
      path: '/dashboard/users',
      name: 'dashboard.users',
      component: AllUsers,
      meta: { require: true },
    },
    // {
    //   path: '/dashboard/new-job/:id?',
    //   name: 'New-Job',
    //   component: NewJob,
    //   meta: { require: true },
    // },
    // {
    //   path: '/dashboard/profile',
    //   name: 'Profile',
    //   component: Profile,
    //   meta: { require: true },
    // },
    // {
    //   path: '/:Wrong(.*)',
    //   name: 'Error',
    //   component: errorComponent,
    // }
  ],
})
const user = () => {
  const token = getData('Token');
  return token ? token : '';
};

// router.beforeEach(async (to, from, next) => {
//   const isAuthenticated = user().length > 0;
//   if (to.meta.require && !isAuthenticated) {
//     console.log("Utilisateur non authentifié, redirection vers login");
//     next({ name: 'login' });
//     return;
//   }
//   if (isAuthenticated && (to.name === 'login' || to.name === 'register')) {
//     console.log("Utilisateur déjà authentifié, redirection vers dashboard");
//     next({ name: 'dashboard' });
//     return;
//   }
//   console.log("Accès autorisé, utilisateur ");
//   next();
// });



export default router
