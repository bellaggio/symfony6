import { createRouter, createWebHistory } from 'vue-router'
import Book from "@/views/Book.vue";
import Description from "@/views/Description.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'book-list',
      component: Book
    },
    {
      path: '/description/:id',
      name: 'book-description',
      component: Description
    }
  ]
})

export default router
