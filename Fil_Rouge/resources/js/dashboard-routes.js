import home from './pages/dashboard/home.vue'
import projects from './pages/dashboard/projects.vue'
import users from './pages/dashboard/users.vue'
import categories from './pages/dashboard/categories.vue'
import tags from './pages/dashboard/tags.vue'
import addProject from './pages/dashboard/add-project.vue'
import updateProject from './pages/dashboard/update-project.vue'
import addCategories from './pages/dashboard/add-category.vue'
const routes = [
    {path : '' ,  component : home},
    {path : 'projects' , component : projects },
    {path : 'projects/add', component : addProject},
    {path : 'projects/update/:id', component : updateProject, props:true},
    {path : 'users' ,  component : users},
    {path : 'categories' ,  component : categories},
    {path : 'categories/add' ,  component : addCategories},
    {path : 'tags' ,  component : tags},
    // {path : 'projects/update/:id',component : updateProject, props:true}
]


export default routes
