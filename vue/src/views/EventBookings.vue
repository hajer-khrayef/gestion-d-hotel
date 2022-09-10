<script setup>
import { ref } from 'vue'
import TitleBar from '@/components/TitleBar.vue'
import HeroBar from '@/components/HeroBar.vue'
import MainSection from '@/components/MainSection.vue'
import EventbookingsTable from '@/components/EventbookingsTable.vue'
const titleStack = ref(['Admin', 'Event Booking'])
</script>
<script>
import axios from 'axios'
export default {
  data() {
    return {
      events: [],
      //events: Object,
    }
  },
  methods: {
    loadEventsList() {
      this.events = []
      axios
        .get('http://127.0.0.1:8000/api/eventbooking')
        .then((data) => {
          console.log('data', data)
          this.events = data.data
        })
        .catch((error) => {
          // this.errorMessage = error.message;
          console.error('There was an error!')
        })
      axios.put('http://127.0.0.1:8000/api/eventbooking/${id}').then((data) => {
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

  <hero-bar>Event Booking</hero-bar>

  <main-section>
    <card-component class="mb-6" title="Event" :icon="mdiBallot" has-table>
      <eventbookings-table :events="events" @refresh-list="loadEventsList" />
    </card-component>
  </main-section>
</template>
