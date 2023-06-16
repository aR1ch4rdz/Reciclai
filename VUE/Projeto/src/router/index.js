import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import { logedUser, showHeader } from '../assets/variaveis';


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
      beforeEnter: (to, from, next) => {
        showHeader.value = true
        next()
      }
    },
    {
      path: '/sobre',
      name: 'sobre',
      component: () => import('../views/AboutView.vue'),
    },
    {
      path: '/registrar',
      name: 'registrar',
      component: () => import('../views/RegistroView.vue'),
      beforeEnter: (to, from, next) => {
        if (to.path === '/registrar' && logedUser.isLoged) {
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
          showHeader.value = true
        }
      }
    },
    {
      path: '/mypage',
      name: 'mypage',
      component: () => import('../views/UserPage.vue'),
      beforeEnter: (to, from, next) => {
        if (to.path === '/mypage' && !logedUser.isLoged) {
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
      beforeEnter: (to, from, next) => {
        next();
        showHeader.value = false;
      }
    },
    {
      path: '/dashboard/pontos',
      name: 'pontos',
      component: () => import('../views/PontosDeColetaView.vue'),
      beforeEnter: (to, from, next) => {
        if (to.path === '/dashboard/pontos' && logedUser.type != "ADMIN") {
          next('/');
        } else {
          next();
          showHeader.value = true
        }
      }
    },
    {
      path: '/dashboard/empresa',
      name: 'empresa',
      component: () => import('../views/EmpresasRevisaoView.vue'),
      beforeEnter: (to, from, next) => {
        if (to.path === '/dashboard/empresa' && logedUser.type != "ADMIN") {
          next('/');
        } else {
          next();
          showHeader.value = true
        }
      }
    },
    {
      path: '/empresas',
      name: 'empresas',
      component: () => import('../views/EmpresasView.vue'),
    }
  ]
});
  

export default router
