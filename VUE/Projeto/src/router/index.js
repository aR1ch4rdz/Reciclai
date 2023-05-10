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
      component: () => import('../views/MapView.vue'),
      beforeEnter: (to, from, next) => {
        if (to.path === '/map' && !logedUser.isLoged) {
          // Redirecione para a página de login se a rota é '/map' e o usuário não está autenticado
          next('/login');
        } else {
          // Continue normalmente para a próxima rota
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
      path: '/empresas',
      name: 'empresas',
      component: () => import('../views/EmpresasView.vue'),
    }
  ]
});
  

export default router
