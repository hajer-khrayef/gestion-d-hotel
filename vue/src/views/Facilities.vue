<script setup>
import { ref } from 'vue'
import MainSection from '@/components/MainSection.vue'
import FacilitiesTable from '@/components/FacilitiesTable.vue'
import CardComponent from '@/components/CardComponent.vue'
import TitleBar from '@/components/TitleBar.vue'
import HeroBar from '@/components/HeroBar.vue'

const titleStack = ref(['Admin', 'Facilities'])
</script>
<script>
import axios from 'axios'
export default {
  data() {
    return {
      facilities: [],
    }
  },
  methods: {
    loadFacilitiesList() {
      this.facilities = []
      axios
        .get('http://127.0.0.1:8000/api/extra')
        .then((data) => {
          console.log('data', data)
          this.facilities = data.data
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
    this.loadFacilitiesList()
  },
}
</script>

<template>
  <title-bar :title-stack="titleStack" />
  <hero-bar>List of Facilities</hero-bar>
  <main-section>
    <card-component class="mb-6">
      <facilities-table
        :facilities="facilities"
        @refresh-list="loadFacilitiesList"
      />
    </card-component>
  </main-section>
</template>
