import home from './pages/dashboard/home.vue'
import projects from './pages/dashboard/projects.vue'
import users from './pages/dashboard/users.vue'
import categories from './pages/dashboard/categories.vue'
import tags from './pages/dashboard/tags.vue'
import addProject from './pages/dashboard/add-project.vue'
const routes = [
    {path : '' ,  component : home},
    {path : 'projects' ,  component : projects},
    {path : 'users' ,  component : users},
    {path : 'categories' ,  component : categories},
    {path : 'tags' ,  component : tags},
    {path : 'addproject', component : addProject}
]


export default routes