<script setup>
import { computed } from 'vue'
import { useStore } from 'vuex'
import Level from '@/components/Level.vue'

const store = useStore()

const year = computed(() => new Date().getFullYear())

const isFooterBarVisible = computed(() => !store.state.isFullScreen)
</script>

<template>
  <footer
    v-show="isFooterBarVisible"
    class="bg-white py-2 px-6 dark:bg-gray-900/70"
  >
    <level>
      <div class="text-center md:text-left">
        <b>&copy; {{ year }}, <a
          href="https://www.tunvita.com/"
          target="_blank"
        >About us</a> </b>
        Made with <a
          href="https://www.tunvita.com/"
          target="_blank"
          class="text-blue-600"
        >Tunvita</a>
      </div>
      <div class="md:py-2">
        for a better web.
      </div>
    </level>
  </footer>
</template>
