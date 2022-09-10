<script setup>
import { ref } from 'vue'
import { mdiAccountMultiple } from '@mdi/js'
import MainSection from '@/components/MainSection.vue'
import ClientsTable from '@/components/ClientsTable.vue'
import CardComponent from '@/components/CardComponent.vue'
import TitleBar from '@/components/TitleBar.vue'
import HeroBar from '@/components/HeroBar.vue'

const titleStack = ref(['Admin', 'Booking'])
</script>
<script>
import axios from 'axios'
export default {
  data() {
    return {
      bookings: [],
      //bookings: Object,
    }
  },
  methods: {
    loadBookingsList() {
      this.bookings = []
      axios
        .get('http://127.0.0.1:8000/api/booking')
        .then((data) => {
          console.log('data', data)
          this.bookings = data.data
        })
        .catch((error) => {
          // this.errorMessage = error.message;
          console.error('There was an error!')
        })
      axios
        .post('http://127.0.0.1:8000/api/booking')
        .then((data) => {
          console.log('data', data)
          this.bookings = data.data
        })
        .catch((error) => {
          // this.errorMessage = error.message;
          console.error('There was an error!')
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
    this.loadBookingsList()
  },
}
</script>

<template>
  <title-bar :title-stack="titleStack" />
  <hero-bar>Booking</hero-bar>
  <main-section>
    <card-component class="mb-6" title="bookings" :icon="mdiTable" has-table>
      <Clients-table :bookings="bookings" @refresh-list="loadBookingsList" />
    </card-component>
  </main-section>
</template>
