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
import leaderDashboardRoutes from './leader-routes'
import singleProjectPage from './pages/single-projects-page.vue'
import invest from './pages/invest.vue'
import LeaderDashboardlogin from './pages/loginleader.vue'

const routes = [
    {path : '/projects', component: projectPage},
    {path : '/project/:id', component: singleProjectPage, props:true},
    {path : '/contact', component : Contact},
    {path : '/test', component : Test},
    {path : '/login', component : Login},
    {path : '/register', component : Register},
    {path : '/', component : Home},
    {path : '/porteurproject/register', component:RegisterPorteurProject},
    {path : '/invest', component:invest},

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
    // leader dashboard
    {
        path : '/leader/dashboard' , component : dashboard,
        children : leaderDashboardRoutes,
        beforeEnter: (to, from, next) => {
            if(localStorage.getItem('leader_token')){
                next()
            }else{
            window.location.href = "/porteurproject/login"
             next(false)
            }
          }
    },
    {path: '/dashboard/login',component:Dashboardlogin},
    {path: '/porteurproject/login',component:LeaderDashboardlogin},
]
export default routes
