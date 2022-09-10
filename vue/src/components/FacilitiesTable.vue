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
import axios from 'axios'
import EditFacilities from '@/views/EditFacilities.vue'
import JbButtons from '@/components/JbButtons.vue'
import JbButton from '@/components/JbButton.vue'

export default {
  name: 'FacilitiesTable',
  components: {
    CheckboxCell,
    Level,
    JbButtons,
    JbButton,
    EditFacilities,
  },
  data() {
    return {
      showEditFacilitiesModal: false,
      facilitie: undefined,
    }
  },
  props: {
    facilities: {
      type: Array,
      required: true,
      default: [],
    },
  },
  created() {
    console.log(this.facilities)
  },
  methods: {
    deleteFacilitie(id) {
      axios.delete(`http://127.0.0.1:8000/api/extra/${id}`).then(() => {
        this.$emit('refresh-list')
      })
    },
    editFacilitie(facilitie) {
      this.facilitie = facilitie
      this.showEditFacilitiesModal = true
    },
  },
}
</script>
<template>
  <div v-if="!showEditFacilitiesModal">
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
          <th>is_default</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="(facilitie, index) in facilities"
          :key="facilitie.id"
          :class="[tableTrStyle, index % 2 === 0 ? tableTrOddStyle : '']"
        >
          <checkbox-cell v-if="true" @checked="checked($event, facilitie)" />
          <td data-label="Name">
            {{ facilitie.Name }}
          </td>
          <td data-label="Description">
            {{ facilitie.Description }}
          </td>
          <td data-label="Status">
            {{ facilitie.Status }}
          </td>
          <td data-label="is default">
            {{ facilitie.is_default }}
          </td>
          <td class="actions-cell">
            <jb-buttons type="justify-start lg:justify-end" no-wrap>
              <jb-button
                color="info"
                :icon="mdiEye"
                @click="editFacilitie(facilitie)"
              />
              <jb-button
                color="danger"
                :icon="mdiTrashCan"
                @click="deleteFacilitie(facilitie.id)"
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
  <edit-facilities v-else :facilitie="facilitie"></edit-facilities>
</template>
