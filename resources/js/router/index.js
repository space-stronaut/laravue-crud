import Home from "../views/Home.vue"
import About from "../views/About.vue"
import Index from "../views/players/Index.vue"
import Show from "../views/players/Show.vue"
import Create from "../views/players/Create.vue"
import Edit from "../views/players/Edit.vue"

export default{
    routes : [
        {
            path : "/",
            name : "home",
            component : Home
        },
        {
            path : "/about",
            name : "about",
            component : About
        },
        {
            path : "/player",
            name : "index",
            component : Index
        },
        {
            path : "/player/show/:id",
            name : "show",
            component : Show
        },
        {
            path : "/player/add",
            name : "create",
            component : Create
        },
        {
            path : "/player/edit/:id",
            name : "edit",
            component : Edit
        },
    ]
}