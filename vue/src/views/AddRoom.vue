<script setup>
/* import { ref, reactive, onMounted } from "vue";
import axios from "axios";
import { mdiBallot } from "@mdi/js";
import MainSection from "@/components/MainSection.vue";
import TitleBar from "@/components/TitleBar.vue";
import CardComponent from "@/components/CardComponent.vue";
import CheckRadioPicker from "@/components/CheckRadioPicker.vue";
import FilePicker from "@/components/FilePicker.vue";
import Field from "@/components/Field.vue";
import Control from "@/components/Control.vue";
import Divider from "@/components/Divider.vue";
import JbButton from "@/components/JbButton.vue";
import JbButtons from "@/components/JbButtons.vue";

const titleStack = ref(["Admin", "Room"]);

const selectOptions = [
  { id: 1, label: "Standard" },
  { id: 2, label: "Standard vue Mer" },
  { id: 3, label: "Deluxe vue Jardin" },
  { id: 3, label: "Deluxe vue Mer" },
];

const room = reactive({
  label: "",
  price: "",
  type: selectOptions[0],
  description: "",
  available: ["Yes"],
  image: null,
});
/* const FormData = require('form-data')
const data = new FormData()
data.append('RoomNumber', '001')
data.append('Description', 'the best')
data.append('Status', 'standard')
data.append('Available', 'yes')
data.append('Created', '21-6-2022')
const config = {
  method: 'post',
  url: '127.0.0.1:8000/api/room',
  headers: {
    ...data.getHeaders()
  },
  data: data
}

axios(config)
  .then(function (response) {
    console.log(JSON.stringify(response.data))
  })
  .catch(function (error) {
    console.log(error)
  }) */
// const {ref} = require("vue")
// const axios = require('axios')
/* const infos = ref([]);
onMounted(async () => {
  await axios.post("127.0.0.1:8000/api/room").then((response) => {
    infos.value = response.data;
  });
});

const submit = () => {}; */
</script>
<script>
import { ref } from 'vue'

import axios from 'axios'
import { mdiBallot } from '@mdi/js'
import MainSection from '@/components/MainSection.vue'
import TitleBar from '@/components/TitleBar.vue'
import CardComponent from '@/components/CardComponent.vue'
import CheckRadioPicker from '@/components/CheckRadioPicker.vue'
import FilePicker from '@/components/FilePicker.vue'
import Field from '@/components/Field.vue'
import Toast from '@/components/Toast.vue'
import Control from '@/components/Control.vue'
import Divider from '@/components/Divider.vue'
import JbButton from '@/components/JbButton.vue'
import JbButtons from '@/components/JbButtons.vue'

export default {
  data() {
    return {
      room: {
        RoomNumber: '',
        RoomType: '',
        RoomPrice: '',
        Description: '',
        Available: false,
        RoomPhoto: '',
      },
      addWithSuccess: false,
      showToast: false,
      state: '',
      message: '',
    }
  },
  methods: {
    addRoom() {
      // console.log('Error here', this.room)
      const params = {
        RoomNumber: this.room.RoomNumber,
        RoomType: this.room.RoomType,
        RoomPrice: this.room.RoomPrice,
        Description: this.room.Description,
        Available: this.room.Available,
        RoomPhoto: this.room.RoomPhoto,
      }
      axios
        .post('http://127.0.0.1:8000/api/room', params)
        .then(() => {
          this.state = 'success'
          this.message = 'Room added with successfly'
          this.showToast = true
        })
        .catch(() => {
          this.state = 'error'
          this.showToast = true
          this.message = 'error to add a room'
        })
    },
  },
  components: { Toast },
}
</script>

<template>
  <title-bar :title-stack="titleStack" />
  <main-section>
    <toast v-if="showToast" :state="state" :message="message" />
    <card-component
      title="Add Room"
      :icon="mdiBallot"
      form
      @submit.prevent="addRoom()"
    >
      <field label="Room number">
        <control v-model="room.RoomNumber" />
      </field>
      <field label="Room Type">
        <control v-model="room.RoomType" :options="selectOptions" />
      </field>
      <field label="Room price">
        <control v-model="room.RoomPrice" label="Price" />
      </field>
      <divider />
      <field label="Description">
        <control v-model="room.Description" />
      </field>

      <!--  <field
        v-model="room.Description"
        label="Room description"
        help="Your description. Max 255 characters"
      >
        <control type="textarea" placeholder="Describe your room" />
      </field> -->

      <field label="Available">
        <check-radio-picker
          v-model="room.Available"
          name="Available"
          type="switch"
          :options="{ one: 'Oui' }"
        />
      </field>

      <divider />
      <field label="Room photo">
        <file-picker v-model="room.RoomPhoto" />
      </field>
      <divider />
      <jb-buttons>
        <jb-button type="submit" color="info" label="Submit" />
        <jb-button type="reset" color="info" outline label="Reset" />
      </jb-buttons>
    </card-component>
  </main-section>
  <div class="addroom">
    <Todos @badValue="triggerToast" />
  </div>
  <div id="app">
    {{ infos }}
  </div>
</template>

<style></style>
