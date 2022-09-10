<script setup>
import { ref } from 'vue'
import MainSection from '@/components/MainSection.vue'
import RoomsTable from '@/components/RoomsTable.vue'
import CardComponent from '@/components/CardComponent.vue'
import TitleBar from '@/components/TitleBar.vue'
import HeroBar from '@/components/HeroBar.vue'

const titleStack = ref(['Admin', 'Rooms'])
</script>
<script>
import axios from 'axios'
export default {
  data() {
    return {
      rooms: [],
      //room: Object,
    }
  },
  methods: {
    loadRoomsList() {
      this.rooms = []
      axios
        .get('http://127.0.0.1:8000/api/room')
        .then((data) => {
          console.log('data', data)
          this.rooms = data.data
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
    this.loadRoomsList()
  },
}
</script>

<template>
  <title-bar :title-stack="titleStack" />
  <hero-bar>List of Rooms</hero-bar>
  <main-section>
    <card-component class="mb-6">
      <rooms-table :rooms="rooms" @refresh-list="loadRoomsList" />
    </card-component>
  </main-section>
</template>
