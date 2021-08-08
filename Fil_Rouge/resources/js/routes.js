import projectPage from './pages/projects-page.vue'
import Contact from './pages/contact.vue'
import Test from './pages/test.vue'
import Login from'./pages/login.vue'
import Register from './pages/register.vue'
import Home from './pages/home.vue'
import dashboard from './pages/dashboard.vue'
import RegisterPorteurProject from'./pages/register-leaderproject.vue'
import dashboardRoutes from './dashboard-routes'

const routes = [
    {path : '/project', component: projectPage},
    {path : '/contact', component : Contact},
    {path : '/test', component : Test},
    {path : '/login', component : Login},
    {path : '/register', component : Register},
    {path : '/', component : Home},
    {path : '/porteurproject/register', component:RegisterPorteurProject},

    // dashboard
    {
        path : '/dashboard' , component : dashboard,
        children : dashboardRoutes
    }
]
export default routes