<script setup>
/* import { computed, ref } from 'vue'
import { useStore } from 'vuex'
import { mdiEye, mdiTrashCan } from '@mdi/js'
import ModalBox from '@/components/ModalBox.vue'
import CheckboxCell from '@/components/CheckboxCell.vue'
import Level from '@/components/Level.vue'
import JbButtons from '@/components/JbButtons.vue'
import JbButton from '@/components/JbButton.vue'
defineProps({
  checkable: Boolean
})

const store = useStore()

const lightBorderStyle = computed(() => store.state.lightBorderStyle)

const lightBgStyle = computed(() => store.state.lightBgStyle)

const tableTrStyle = computed(() => store.state.tableTrStyle)

const tableTrOddStyle = computed(() => store.state.tableTrOddStyle)

const darkMode = computed(() => store.state.darkMode)

const items = computed(() => store.state.clients)

const isModalDangerActive = ref(false)

const perPage = ref(10)

const currentPage = ref(0)

const checkedRows = ref([])

const itemsPaginated = computed(
  () => items.value.slice(perPage.value * currentPage.value, perPage.value * (currentPage.value + 1))
)

const numPages = computed(() => Math.ceil(items.value.length / perPage.value))

const currentPageHuman = computed(() => currentPage.value + 1)

const pagesList = computed(() => {
  const pagesList = []

  for (let i = 0; i < numPages.value; i++) {
    pagesList.push(i)
  }

  return pagesList
})

const remove = (arr, cb) => {
  const newArr = []

  arr.forEach(item => {
    if (!cb(item)) {
      newArr.push(item)
    }
  })

  return newArr
}

const checked = (isChecked, client) => {
  if (isChecked) {
    checkedRows.value.push(client)
  } else {
    checkedRows.value = remove(checkedRows.value, row => row.id === client.id)
  }
} */
</script>
<script>
import { mdiEye, mdiTrashCan } from '@mdi/js'
import ModalBox from '@/components/ModalBox.vue'
import CheckboxCell from '@/components/CheckboxCell.vue'
import Level from '@/components/Level.vue'
import JbButtons from '@/components/JbButtons.vue'
import JbButton from '@/components/JbButton.vue'
import EditFood from '@/views/EditFood.vue'
import axios from 'axios'
export default {
  name: 'FoodsTable',
  components: {
    CheckboxCell,
    ModalBox,
    Level,
    JbButtons,
    JbButton,
    EditFood,
  },
  data() {
    return {
      showEditFoodModal: false,
      food: undefined,
    }
  },
  props: { foods: { type: Array, required: true, default: [] } },
  created() {
    console.log(this.foods)
  },
  methods: {
    deleteFood(id) {
      axios.delete(`http://127.0.0.1:8000/api/food/${id}`).then(() => {
        this.$emit('refresh-list')
      })
    },
    editFood(food) {
      this.food = food
      this.showEditFoodModal = true
    },
  },
}
</script>

<template>
  <div v-if="!showEditFoodModal">
    <!-- <modal-box
      v-model="isModalDangerActive"
      large-title="Please confirm"
      button="danger"
      has-cancel
    >
      <p>Do you want to delete</p>
    </modal-box> -->

    <div
      v-if="true"
      class="bg-opacity-50 p-3 dark:bg-gray-800"
      :class="lightBgStyle"
    >
      <span
        v-for="checkedRow in checkedRows"
        :key="checkedRow.id"
        class="inline-block px-2 py-1 rounded-sm mr-2 text-sm dark:bg-gray-700"
        :class="lightBgStyle"
      >
        {{ checkedRow.name }}
      </span>
    </div>

    <table>
      <thead>
        <tr>
          <th v-if="true" />
          <th>Name</th>
          <th>Description</th>
          <th>Status</th>
          <th>Type</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="(food, index) in foods"
          :key="food.id"
          :class="[tableTrStyle, index % 2 === 0 ? tableTrOddStyle : '']"
        >
          <checkbox-cell v-if="true" @checked="checked($event, food)" />
          <td data-label="Name">
            {{ food.Name }}
          </td>
          <td data-label="Description">
            {{ food.Description }}
          </td>
          <td data-label="Status">
            {{ food.status }}
          </td>
          <td data-label="Type">
            {{ food.type }}
          </td>
          <td data-label="Price">
            {{ food.price }}
          </td>
          <td class="actions-cell">
            <jb-buttons type="justify-start lg:justify-end" no-wrap>
              <jb-button color="info" :icon="mdiEye" @click="editFood(food)" />
              <jb-button
                color="danger"
                :icon="mdiTrashCan"
                @click="deleteFood(food.id)"
              />
            </jb-buttons>
          </td>
        </tr>
      </tbody>
    </table>
    <div
      :class="lightBorderStyle"
      class="p-3 lg:px-6 border-t dark:border-gray-800"
    ></div>
  </div>
  <edit-food v-else :food="food"></edit-food>
</template>
