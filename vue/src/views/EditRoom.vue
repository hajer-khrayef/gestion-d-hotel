<script>
import { mdiBallot } from '@mdi/js'
import MainSection from '@/components/MainSection.vue'
import TitleBar from '@/components/TitleBar.vue'
import CardComponent from '@/components/CardComponent.vue'
import CheckRadioPicker from '@/components/CheckRadioPicker.vue'
import FilePicker from '@/components/FilePicker.vue'
import Field from '@/components/Field.vue'
import Control from '@/components/Control.vue'
import Divider from '@/components/Divider.vue'
import JbButton from '@/components/JbButton.vue'
import JbButtons from '@/components/JbButtons.vue'
import axios from 'axios'

const selectOptions = [
  { id: 1, label: 'Standard' },
  { id: 2, label: 'Standard vue Mer' },
  { id: 3, label: 'Deluxe vue Jardin' },
  { id: 3, label: 'Deluxe vue Mer' },
]
export default {
  components: {
    MainSection,
    TitleBar,
    CardComponent,
    CheckRadioPicker,
    FilePicker,
    Field,
    Control,
    JbButtons,
    Divider,
    JbButton,
  },
  data() {
    return {
      editRoomForm: {
        RoomNumber: '',
        RoomType: '',
        RoomPrice: '',
        Description: '',
        Available: '',
        RoomPhoto: '',
      },
    }
  },
  props: {
    room: {
      type: Object,
      required: true,
      default: null,
    },
  },
  created() {
    // console.log(this.room);
    this.editRoomForm.RoomNumber = this.room.RoomNumber
    this.editRoomForm.RoomType = this.room.RoomType
    this.editRoomForm.RoomPrice = this.room.RoomPrice
    this.editRoomForm.Description = this.room.Description
    this.editRoomForm.Available = this.room.Available
    this.editRoomForm.RoomPhoto = this.room.RoomPhoto
  },
  methods: {
    editRoomData() {
      const params = {
        RoomNumber: this.editRoomForm.RoomNumber,
        RoomType: this.editRoomForm.RoomType,
        RoomPrice: this.editRoomForm.RoomPrice,
        Description: this.editRoomForm.Description,
        Available: this.editRoomForm.Available,
        RoomPhoto: this.room.RoomPhoto,
      }
      axios
        .put(`http://127.0.0.1:8000/api/room/${this.room.id}`, params)
        .then((response) => {
          console.log(response)
        })
        .catch((error) => {
          console.log('Error here', error)
        })
    },
  },
}
</script>

<template>
  <div>
    <title-bar :title-stack="titleStack" />
    <main-section>
      <card-component
        title="Edit Room"
        :icon="mdiBallot"
        form
        @submit.prevent="editRoomData()"
      >
        <field label="Room number">
          <control v-model="editRoomForm.RoomNumber" />
        </field>
        <field label="Room type">
          <control v-model="editRoomForm.RoomType" :options="selectOptions" />
        </field>
        <field label="Room price">
          <control v-model="editRoomForm.RoomPrice" label="Price" />
        </field>
        <divider />

        <field label="Description" help="Your description. Max 255 characters">
          <control v-model="editRoomForm.Description" type="textarea" />
        </field>

        <field label="Available">
          <check-radio-picker
            v-model="editRoomForm.Available"
            name="Available"
            type="switch"
            :options="{ one: 'No' }"
          />
        </field>

        <divider />
        <field label="Room photo">
          <file-picker v-model="editRoomForm.RoomPhoto" />
        </field>
        <divider />
        <jb-buttons>
          <jb-button type="submit" color="info" label="Submit" />
          <jb-button type="reset" color="info" outline label="Reset" />
        </jb-buttons>
      </card-component>
    </main-section>
  </div>
</template>
