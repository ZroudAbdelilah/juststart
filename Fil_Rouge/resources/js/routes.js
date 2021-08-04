import projectPage from './pages/projects-page.vue'
import Contact from './pages/contact.vue'
import Test from './pages/test.vue'
import Login from'./pages/login.vue'
import Home from './pages/home.vue'

const routes = [
    {path : '/project', component: projectPage},
    {path : '/contact', component : Contact},
    {path : '/test', component : Test},
    {path : '/login', component : Login},
    {path : '/', component : Home}

]
export default routes