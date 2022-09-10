import { createRouter, createWebHashHistory } from 'vue-router'
import Home from '@/views/Home.vue'

const routes = [
  {
    meta: {
      title: 'Login',
      fullScreen: true
    },
    path: '/',
    name: 'login',
    component: () => import(/* webpackChunkName: "login" */ '@/views/Login.vue')
  },
  {
    meta: {
      title: 'Register',
      fullScreen: true
    },
    path: '/register',
    name: 'register',
    component: () => import(/* webpackChunkName: "register" */ '@/views/Register.vue')
  },
  {
    // Document title tag
    // We combine it with defaultDocumentTitle set in `src/main.js` on router.afterEach hook
    meta: {
      title: 'Dashboard'
    },
    path: '/dashboard',
    name: 'dashboard',
    component: Home
  },
  {
    meta: {
      title: 'Booking'
    },
    path: '/booking',
    name: 'booking',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "booking" */ '@/views/Reservations.vue')
  },
  {
    meta: {
      title: 'Calendar'
    },
    path: '/calendar',
    name: 'calendar',
    component: () => import(/* webpackChunkName: "Calendar" */ '@/views/Calendar.vue')
  },
  {
    meta: {
      title: 'Rooms'
    },
    path: '/rooms',
    name: 'rooms',
    component: () => import(/* webpackChunkName: "rooms" */ '@/views/Rooms.vue')
  },
  {
    meta: {
      title: 'Facilities'
    },
    path: '/facilities',
    name: 'facilities',
    component: () => import(/* webpackChunkName: "facilities" */ '@/views/Facilities.vue')
  },
  {
    meta: {
      title: 'FoodOrders'
    },
    path: '/foodorders',
    name: 'foodorders',
    component: () => import(/* webpackChunkName: "foodorders" */ '@/views/FoodOrders.vue')
  },
  {
    meta: {
      title: 'Profile'
    },
    path: '/profile',
    name: 'profile',
    component: () => import(/* webpackChunkName: "profile" */ '@/views/Profile.vue')
  },
  {
    meta: {
      title: 'Roomsbooking'
    },
    path: '/roombooking',
    name: 'roombooking',
    component: () => import(/* webpackChunkName: "roombooking" */ '@/views/RoomBookings.vue')
  },
  {
    meta: {
      title: 'Eventsbooking'
    },
    path: '/eventbooking',
    name: 'eventbooking',
    component: () => import(/* webpackChunkName: "eventbooking" */ '@/views/EventBookings.vue')
  },
  {
    meta: {
      title: 'Events'
    },
    path: '/events',
    name: 'events',
    component: () => import(/* webpackChunkName: "events" */ '@/views/Events.vue')
  },
  {
    meta: {
      title: 'Foods'
    },
    path: '/foods',
    name: 'foods',
    component: () => import(/* webpackChunkName: "foods" */ '@/views/Foods.vue')
  },
  {
    meta: {
      title: 'AddBooking'
    },
    path: '/addbooking',
    name: 'addbooking',
    component: () => import(/* webpackChunkName: "addroom" */ '@/views/AddBooking.vue')
  },
  {
    meta: {
      title: 'AddRoom'
    },
    path: '/addroom',
    name: 'addroom',
    component: () => import(/* webpackChunkName: "addroom" */ '@/views/AddRoom.vue')
  },
  {
    meta: {
      title: 'AddEvent'
    },
    path: '/addevent',
    name: 'addevent',
    component: () => import(/* webpackChunkName: "addevent" */ '@/views/AddEvent.vue')
  },
  {
    meta: {
      title: 'AddFood'
    },
    path: '/addfood',
    name: 'addfood',
    component: () => import(/* webpackChunkName: "addfood" */ '@/views/AddFood.vue')
  },
  {
    meta: {
      title: 'EditEvent'
    },
    path: '/editevent',
    name: 'editevent',
    component: () => import(/* webpackChunkName: "editevent" */ '@/views/EditEvent.vue')
  },
  {
    meta: {
      title: 'EditRoom'
    },
    path: '/editroom',
    name: 'editroom',
    component: () => import(/* webpackChunkName: "editroom" */ '@/views/EditRoom.vue')
  },
  {
    meta: {
      title: 'EditTickets'
    },
    path: '/edittickets',
    name: 'edittickets',
    component: () => import(/* webpackChunkName: "edittickets" */ '@/views/EditTickets.vue')
  },
  {
    meta: {
      title: 'EditRoomBooking'
    },
    path: '/editroombooking',
    name: 'editroombooking',
    component: () => import(/* webpackChunkName: "editroombooking" */ '@/views/EditRoombooking.vue')
  },
  {
    meta: {
      title: 'EditFood'
    },
    path: '/editfood',
    name: 'editfood',
    component: () => import(/* webpackChunkName: "editfood" */ '@/views/EditFood.vue')
  },
  {
    meta: {
      title: 'Error',
      fullScreen: true
    },
    path: '/error',
    name: 'error',
    component: () => import(/* webpackChunkName: "error" */ '@/views/Error.vue')
  },
  {
    meta: {
      title: 'UI'
    },
    path: '/ui',
    name: 'ui',
    component: () => import(/* webpackChunkName: "ui" */ '@/views/Ui.vue')
  },
  {
    meta: {
      title: 'Tickets'
    },
    path: '/tickets',
    name: 'tickets',
    component: () => import(/* webpackChunkName: "tickets" */ '@/views/Tickets.vue')
  }
]

const router = createRouter({
  history: createWebHashHistory(),
  routes,
  scrollBehavior (to, from, savedPosition) {
    return savedPosition || { top: 0 }
  }
})

export default router
