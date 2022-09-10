<script setup>
import { ref } from 'vue'
import MainSection from '@/components/MainSection.vue'
import EventsTable from '@/components/EventsTable.vue'
import CardComponent from '@/components/CardComponent.vue'
import TitleBar from '@/components/TitleBar.vue'
import HeroBar from '@/components/HeroBar.vue'

const titleStack = ref(['Admin', 'Events'])
</script>

<script>
import axios from 'axios'
export default {
  data() {
    return {
      events: [],
      // events: Object,
    }
  },
  methods: {
    loadEventsList() {
      this.events = []
      axios
        .get('http://127.0.0.1:8000/api/event')
        .then((data) => {
          console.log('data', data)
          this.events = data.data
        })
        .catch((error) => {
          // this.errorMessage = error.message;
          console.error('There was an error!')
        })
      axios.put('http://127.0.0.1:8000/api/event/${id}').then((data) => {
        console.log('data', data)
        this.event = data.data
      })
    },
  },
  mounted() {
    console.log('mounted!')
  },
  updated() {
    console.log('updated!')
  },
  created() {
    this.loadEventsList()
  },
}
</script>

<template>
  <title-bar :title-stack="titleStack" />
  <hero-bar>List of Events</hero-bar>
  <main-section>
    <card-component class="mb-6" title="Event" :icon="mdiBallot" has-table>
      <events-table :events="events" @refresh-list="loadEventsList" />
    </card-component>
  </main-section>
</template>
