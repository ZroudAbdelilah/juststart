import home from './pages/leader-dashboard/home.vue'
import projects from './pages/leader-dashboard/projects.vue'
import categories from './pages/leader-dashboard/categories.vue'
import addProject from './pages/leader-dashboard/add-project.vue'
import updateProject from './pages/leader-dashboard/update-project.vue'



const routes = [
    {path : '' ,  component : home},
    {path : 'projects' , component : projects },
    {path : 'projects/add', component : addProject},
    {path : 'projects/update/:id', component : updateProject, props:true},
    {path : 'categories' ,  component : categories},
    // {path : 'projects/update/:id',component : updateProject, props:true}
]


export default routes
