import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'

const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    name: 'home',
    component:()=>import('../views/HomePage.vue'),
  },
  {
    path:'/homePage',
    name:'homePage',
    component:()=>import('../views/HomePage.vue'),
  },
  {
    path:'/postDetail/:postId',
    name:'postDetail',
    component:()=>import('../views/PostDetail.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
