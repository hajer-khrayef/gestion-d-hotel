<script setup>
import { ref } from 'vue'
import MainSection from '@/components/MainSection.vue'
import FoodsTable from '@/components/FoodsTable.vue'
import CardComponent from '@/components/CardComponent.vue'
import TitleBar from '@/components/TitleBar.vue'
import HeroBar from '@/components/HeroBar.vue'

const titleStack = ref(['Admin', 'Food'])
</script>
<script>
import axios from 'axios'
export default {
  data() {
    return {
      foods: [],
    }
  },
  methods: {
    loadFoodsList() {
      this.foods = []
      axios
        .get('http://127.0.0.1:8000/api/food')
        .then((data) => {
          console.log('data', data)
          this.foods = data.data
        })
        .catch((error) => {
          // this.errorMessage = error.message;
          console.error('There was an error!')
        })
      axios.put('http://127.0.0.1:8000/api/food/${id}').then((data) => {
        console.log('data', data)
        this.food = data.data
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
    this.loadFoodsList()
  },
}
</script>

<template>
  <title-bar :title-stack="titleStack" />
  <hero-bar>List of Foods</hero-bar>
  <main-section>
    <card-component class="mb-6">
      <foods-table :foods="foods" @refresh-list="loadFoodsList" />
    </card-component>
  </main-section>
</template>
