window.Vue = require('vue').default;
import VueRouter from 'vue-router';
import CategoryList from '../components/CategoriesListComponent.vue';
import PostList from '../components/PostsListComponent.vue';
import UserList from '../components/UsersListComponent.vue';
import PostDetail from '../components/PostDetailComponent.vue';
import UserDetail from '../components/UserDetailComponent.vue';

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',
    routes : [
        { path: '/web', component: PostList },
        { path: '/web/categories', component: CategoryList },
        { path: '/web/users', component: UserList },
        { path: '/web/users/detail/:id', component: UserDetail },
        { path: '/web/detail/:id', component: PostDetail },     
        
    ]
})