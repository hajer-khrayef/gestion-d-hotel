<script setup>
import { ref } from 'vue'
import MainSection from '@/components/MainSection.vue'
import TicketsTable from '@/components/TicketsTable.vue'
import CardComponent from '@/components/CardComponent.vue'
import TitleBar from '@/components/TitleBar.vue'
import HeroBar from '@/components/HeroBar.vue'

const titleStack = ref(['Admin', 'Tickets'])
</script>
<script>
import axios from 'axios'
export default {
  data() {
    return {
      tickets: [],
    }
  },
  methods: {
    loadTicketsList() {
      this.tickets = []
      axios
        .get('http://127.0.0.1:8000/api/facture')
        .then((data) => {
          console.log('data', data)
          this.tickets = data.data
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
    this.loadTicketsList()
  },
}
</script>

<template>
  <title-bar :title-stack="titleStack" />
  <hero-bar>List of Tickets</hero-bar>
  <main-section>
    <card-component class="mb-6">
      <tickets-table :tickets="tickets" @refresh-list="loadTicketsList" />
    </card-component>
  </main-section>
</template>
