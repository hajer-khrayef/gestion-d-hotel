<script setup>
import { ref } from 'vue'
import MainSection from '@/components/MainSection.vue'
import FoodordersTable from '@/components/FoodordersTable.vue'
import CardComponent from '@/components/CardComponent.vue'
import TitleBar from '@/components/TitleBar.vue'
import HeroBar from '@/components/HeroBar.vue'

const titleStack = ref(['Admin', 'FoodOrders'])
</script>
<script>
import axios from 'axios'
export default {
  data() {
    return {
      foodorders: [],
    }
  },
  methods: {
    loadFoodOrdersList() {
      this.foodorders = []
      axios
        .get('http://127.0.0.1:8000/api/foodorder')
        .then((data) => {
          console.log('data', data)
          this.foodorders = data.data
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
    this.loadFoodOrdersList()
  },
}
</script>

<template>
  <title-bar :title-stack="titleStack" />
  <hero-bar>List of Food Orders</hero-bar>
  <main-section>
    <card-component class="mb-6">
      <foodorders-table
        :foodorders="foodorders"
        @refresh-list="loadFoodOrdersList"
      />
    </card-component>
  </main-section>
</template>
