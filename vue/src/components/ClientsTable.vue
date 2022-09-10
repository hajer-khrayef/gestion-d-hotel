<script setup>
/* import { computed, ref } from 'vue'
import { useStore } from 'vuex'
import { mdiEye, mdiTrashCan } from '@mdi/js'
import ModalBox from '@/components/ModalBox.vue'
import CheckboxCell from '@/components/CheckboxCell.vue'
import Level from '@/components/Level.vue'
import JbButtons from '@/components/JbButtons.vue'
import JbButton from '@/components/JbButton.vue'
import EditRoombooking from "@/views/EditRoombooking.vue";

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
}, */
</script>
<script>
import { mdiEye, mdiTrashCan } from '@mdi/js'
import ModalBox from '@/components/ModalBox.vue'
import CheckboxCell from '@/components/CheckboxCell.vue'
import Level from '@/components/Level.vue'
import JbButtons from '@/components/JbButtons.vue'
import JbButton from '@/components/JbButton.vue'
import UserAvatar from '@/components/UserAvatar.vue'
import EditBooking from '@/views/EditBooking.vue'
import axios from 'axios'

export default {
  name: 'ClientsTable',
  components: {
    ModalBox,
    CheckboxCell,
    Level,
    JbButtons,
    JbButton,
    EditBooking,
  },
  data() {
    return {
      showEditBookingModal: false,
      booking: undefined,
    }
  },
  props: {
    bookings: {
      type: Array,
      required: true,
      default: [],
    },
  },

  created() {
    console.log(this.bookings)
  },
  methods: {
    deleteBooking(id) {
      axios.delete(`http://127.0.0.1:8000/api/booking/${id}`).then(() => {
        this.$emit('refresh-list')
      })
    },
    editBooking(booking) {
      this.booking = booking
      this.showEditBookingModal = true
    },
  },
}
</script>

<template>
  <div v-if="!showEditBookingModal">
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
          <th>Title</th>
          <th>Start</th>
          <th>End</th>
          <th>AllDay</th>
          <th />
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="(booking, index) in bookings"
          :key="booking.id"
          :class="[tableTrStyle, index % 2 === 0 ? tableTrOddStyle : '']"
        >
          <checkbox-cell v-if="true" @checked="checked($event, booking)" />

          <td data-label="Title">
            {{ booking.title }}
          </td>
          <td data-label="Start">
            {{ booking.start }}
          </td>
          <td data-label="End">
            {{ booking.end }}
          </td>
          <td data-label="AllDay">
            {{ booking.allDay }}
          </td>
          <td class="actions-cell">
            <jb-buttons type="justify-start lg:justify-start" no-wrap>
              <jb-button
                color="info"
                :icon="mdiEye"
                @click="editBooking(booking)"
              />
              <jb-button
                color="danger"
                :icon="mdiTrashCan"
                @click="deleteBooking(booking.id)"
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
  <edit-booking v-else :booking="booking"></edit-booking>
</template>
