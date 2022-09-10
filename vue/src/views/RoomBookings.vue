<script setup>
import { ref } from 'vue'
import TitleBar from '@/components/TitleBar.vue'
import HeroBar from '@/components/HeroBar.vue'
import MainSection from '@/components/MainSection.vue'
import RoomsbookingTable from '@/components/RoomsbookingTable.vue'
const titleStack = ref(['Admin', 'Room Booking'])

/* export default {
  methods: {
    test: function () {
      alert('test fuction called')
    }
  }
} */
</script>
<script>
import axios from 'axios'
export default {
  data() {
    return {
      roomsbooking: [],
      //room: Object,
    }
  },

  methods: {
    loadRoomsBookingList() {
      this.roomsbooking = []
      axios
        .get('http://127.0.0.1:8000/api/roombooking')
        .then((data) => {
          console.log('data', data)
          this.roomsbooking = data.data
        })
        .catch((error) => {
          // this.errorMessage = error.message;
          console.error('There was an error!')
        })
      axios.put('http://127.0.0.1:8000/api/roombooking/${id}').then((data) => {
        console.log('data', data)
        this.roomsbooking = data.data
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
    this.loadRoomsBookingList()
  },
}
</script>

<template>
  <title-bar :title-stack="titleStack" />

  <hero-bar>Room Booking</hero-bar>

  <main-section>
    <card-component
      class="mb-6"
      title="Rooms booking"
      :icon="mdiBallot"
      has-table
    >
      <roomsbooking-table
        :roomsbooking="roomsbooking"
        @refresh-list="loadRoomsBookingList"
      />
    </card-component>
  </main-section>
</template>
