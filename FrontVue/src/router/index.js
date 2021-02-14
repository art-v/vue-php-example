import { createWebHistory, createRouter } from "vue-router";
import home from "/src/views/home.vue";
import admin from "/src/views/admin.vue";
import page from "/src/views/page.vue";

const routerHistory = createWebHistory()

const routes = [
    {
        path: "/",
        name: "Home",
        component: home,
    },
    {
        path: "/admin",
        name: "Admin",
        component: admin,
    },
    {
        path: "/page/:id",
        name: "Page",
        component: page
    }
];

const router = createRouter({
    history: routerHistory,
    routes,
});

export default router;