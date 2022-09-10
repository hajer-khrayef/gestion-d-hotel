<script setup>
/* import { computed, ref } from 'vue'
import { useStore } from 'vuex'
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

const itemsPaginated = computed(() =>
  items.value.slice(
    perPage.value * currentPage.value,
    perPage.value * (currentPage.value + 1)
  )
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

  arr.forEach((item) => {
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
    checkedRows.value = remove(
      checkedRows.value,
      (row) => row.id === client.id
    )
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
import EditFoodOrders from '@/views/EditFoodOrders.vue'
import axios from 'axios'
export default {
  name: 'FoodordrsTable',
  components: {
    CheckboxCell,
    ModalBox,
    Level,
    JbButtons,
    JbButton,
    EditFoodOrders,
  },
  props: { foodorders: { type: Array, required: true, default: [] } },
  data() {
    return {
      showEditFoodOrdersModal: false,
      food: undefined,
    }
  },
  created() {
    console.log(this.foodorders)
  },
  methods: {
    deleteFoodOrder(id) {
      axios.delete(`http://127.0.0.1:8000/api/foodorder/${id}`).then(() => {
        this.$emit('refresh-list')
      })
    },
    editFoodOrder(foodorder) {
      this.foodorder = foodorder
      this.showEditFoodOrdersModal = true
    },
  },
}
</script>

<template>
  <div v-if="!showEditFoodOrdersModal">
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
          <th>roombooking</th>
          <th>quantity</th>
          <th>cost</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="(foodorder, index) in foodorders"
          :key="foodorder.id"
          :class="[tableTrStyle, index % 2 === 0 ? tableTrOddStyle : '']"
        >
          <checkbox-cell v-if="true" @checked="checked($event, foodorder)" />
          <td data-label="Room Booking">
            {{ foodorder.id }}
          </td>
          <td data-label="Quantity">
            {{ foodorder.quantity }}
          </td>
          <td data-label="Cost">
            {{ foodorder.cost }}
          </td>
          <td class="actions-cell">
            <jb-buttons type="justify-start lg:justify-end" no-wrap>
              <jb-button
                color="info"
                :icon="mdiEye"
                @click="editFoodOrder(foodorder)"
              />
              <jb-button
                color="danger"
                :icon="mdiTrashCan"
                @click="deleteFoodOrder(foodorder.id)"
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
  <edit-food-orders v-else :foodorder="foodorder" />
</template>
