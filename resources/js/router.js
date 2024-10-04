import { createRouter, createWebHistory } from 'vue-router';


const routes = [

    {
        path: '/card/:id',  // Используем строку для пути
        component: () => import('./components/ShowComponent.vue'),
        name: 'show'
    }


];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
