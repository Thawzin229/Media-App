import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'
import HomePage from "../views/HomePageView.vue"
import PostDetailPage from "../views/PostDetailView.vue"
import LoginPage from "../views/LoginPageView.vue"
const routes: Array<RouteRecordRaw> = [
  {
    path:"/homepage",
    name:"homepage",
    component: HomePage
  },
  {
    path:"/postdetail/:postid",
    name:"postdetail",
    component:PostDetailPage
  },
  {
    path:"/loginpage",
    name:"loginpage",
    component:LoginPage
  },
  {
    path:"/",
    name:"loginpagestart",
    component:LoginPage
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
