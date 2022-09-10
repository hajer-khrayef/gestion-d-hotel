<script setup>
/* import { computed, ref } from 'vue'
import { useStore } from 'vuex'
import { mdiEye, mdiTrashCan } from '@mdi/js'
import ModalBox from '@/components/ModalBox.vue'
import CheckboxCell from '@/components/CheckboxCell.vue'
import Level from '@/components/Level.vue'
import JbButtons from '@/components/JbButtons.vue'
import JbButton from '@/components/JbButton.vue'
import EditTickets from "@/views/EditTickets.vue";

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
//import ModalBox from '@/components/ModalBox.vue'
import CheckboxCell from '@/components/CheckboxCell.vue'
import Level from '@/components/Level.vue'
import axios from 'axios'
import EditTickets from '@/views/EditTickets.vue'
import JbButtons from '@/components/JbButtons.vue'
import JbButton from '@/components/JbButton.vue'

export default {
  name: 'TicketsTable',
  components: {
    CheckboxCell,
    Level,
    JbButtons,
    JbButton,
    EditTickets,
  },
  data() {
    return {
      showEditTicketsModal: false,
      ticket: undefined,
    }
  },
  props: {
    tickets: {
      type: Array,
      required: true,
      default: [],
    },
  },
  created() {
    console.log(this.tickets)
  },
  methods: {
    deleteTickets(id) {
      axios.delete(`http://127.0.0.1:8000/api/facture/${id}`).then(() => {
        this.$emit('refresh-list')
      })
    },
    editTickets(ticket) {
      this.ticket = ticket
      this.showEditTicketsModal = true
    },
  },
}
</script>

<template>
  <div v-if="!showEditTicketsModal">
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
          <th>Facture Number</th>
          <th>User Name</th>
          <th>Room Number</th>
          <th>Room Price</th>
          <th>Company Name</th>
          <th>Check_in</th>
          <th>Check_out</th>
          <th>FoodName Prixunitaire Quantite</th>
          <th>FacilitiesName Prixunitaire</th>
          <th>Prix Total</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="(ticket, index) in tickets"
          :key="ticket.id"
          :class="[tableTrStyle, index % 2 === 0 ? tableTrOddStyle : '']"
        >
          <checkbox-cell v-if="true" @checked="checked($event, ticket)" />
          <td data-label="Facture Number">{{ ticket.FactureNumber }}</td>
          <td data-label="User Name ">{{ ticket.UserName }}</td>
          <td data-label="Room Number">{{ ticket.RoomNumber }}</td>
          <td data-label="Room Price">{{ ticket.RoomPrice }}</td>
          <td data-label="Company Name ">{{ ticket.CompanyName }}</td>
          <td data-label="Check_in">{{ ticket.Check_in }}</td>
          <td data-label="Check_out ">{{ ticket.Check_out }}</td>
          <td data-label="FoodName Prixunitaire Quantite">
            {{ ticket.FoodName_Prixunitaire_Quantite }}
          </td>
          <td data-label="FacilitiesName Prixunitaire">
            {{ ticket.FacilitiesName_Prixunitaire }}
          </td>
          <td data-label="Prix Total">{{ ticket.Prixtotal }}</td>

          <td class="actions-cell">
            <jb-buttons type="justify-start lg:justify-end" no-wrap>
              <jb-button
                color="info"
                :icon="mdiEye"
                @click="editTickets(ticket)"
              />
              <jb-button
                color="danger"
                :icon="mdiTrashCan"
                @click="deleteTickets(ticket.id)"
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
  <edit-tickets v-else :ticket="ticket"></edit-tickets>
</template>
