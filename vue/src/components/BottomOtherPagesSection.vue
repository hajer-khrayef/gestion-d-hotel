<script setup>
import { useRouter } from 'vue-router'
import TitledSection from '@/components/TitledSection.vue'

const router = useRouter()

const routes = router.getRoutes()

const screens = []

for (const routeIndex in routes) {
  const path = routes[routeIndex].path
  const title = routes[routeIndex].meta && routes[routeIndex].meta.title ? routes[routeIndex].meta.title : null

  if (title) {
    screens.push({
      path,
      title
    })
  }
}
</script>

<template>
  <titled-section last>
    <h1 class="text-2xl text-gray-500 dark:text-gray-400 mb-12">
      Check out other components and layouts at<br>
      <template
        v-for="(screen, index) in screens"
        :key="screen.path"
      >
        <router-link
          :to="screen.path"
          class="text-blue-600"
        >
          {{ screen.title }}
        </router-link>
        <template v-if="index + 1 < screens.length">
          ,
        </template>
      </template>
      <br>
      screen samples
    </h1>
  </titled-section>
</template>
