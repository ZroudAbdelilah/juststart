import projectPage from './pages/projects-page.vue'
import Contact from './pages/contact.vue'
import Test from './pages/test.vue'
import Login from'./pages/login.vue'
import Register from './pages/register.vue'
import Home from './pages/home.vue'
import dashboard from './pages/dashboard.vue'
import RegisterPorteurProject from'./pages/register-leaderproject.vue'
import Dashboardlogin from './pages/dashboard/login.vue'
import dashboardRoutes from './dashboard-routes'

import singleProjectPage from './pages/single-projects-page.vue'

const routes = [
    {path : '/projects', component: projectPage},
    {path : '/project/:id', component: singleProjectPage, props:true},
    {path : '/contact', component : Contact},
    {path : '/test', component : Test},
    {path : '/login', component : Login},
    {path : '/register', component : Register},
    {path : '/', component : Home},
    {path : '/porteurproject/register', component:RegisterPorteurProject},

    // dashboard
    {
        path : '/dashboard' , component : dashboard,
        children : dashboardRoutes,
        beforeEnter: (to, from, next) => {
            if(localStorage.getItem('admin_token')){
                next()
            }else{
            window.location.href = "/dashboard/login"
             next(false)
            }
          }
    },
    {path: '/dashboard/login',component:Dashboardlogin}
]
export default routes
