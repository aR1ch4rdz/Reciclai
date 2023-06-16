import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import { logedUser } from '../assets/variaveis';


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/sobre',
      name: 'sobre',
      component: () => import('../views/AboutView.vue'),
    },
    {
      path: '/register',
      name: 'register',
      component: () => import('../views/RegistroView.vue'),
      beforeEnter: (to, from, next) => {
        if (to.path === '/register' && logedUser.isLoged) {
          next('/userpage');
        } else {
          next();
        }
      }
    },
    {
      path: '/map',
      name: 'map',
      component: () => import('../views/MapView.vue')
    },
    {
      path: '/dashboard',
      name: 'dashboard',
      component: () => import('../views/DashboardView.vue'),
      beforeEnter: (to, from, next) => {
        if (to.path === '/dashboard' && logedUser.type != "ADMIN") {
          next('/');
        } else {
          next();
        }
      }
    },
    {
      path: '/userpage',
      name: 'userpage',
      component: () => import('../views/UserPage.vue'),
      beforeEnter: (to, from, next) => {
        if (to.path === '/userpage' && !logedUser.isLoged) {
          next('/login');
        } else {
          next();
        }
      }
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('../views/LoginView.vue'),
    },
    {
      path: '/dashboard/pontos',
      name: 'pontos',
      component: () => import('../views/PontosDeColetaView.vue'),
    },
    {
      path: '/CreateCollectPoint',
      name: 'CriarPonto',
      component: () => import('../views/CreateCollectPoint.vue'),
      beforeEnter: () => (to, from, next) => {
        if (to.path === '/CreateCollectPoint' && !logedUser.isLoged) {
          next('/CreateCollectPoint');
        }else{
          next();
        }
      }
    },
  ]
});
  

export default router
