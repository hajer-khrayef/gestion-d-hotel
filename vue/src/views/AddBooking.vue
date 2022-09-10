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
      booking: {
        title: '',
        start: '',
        end: '',
        allDay: '',
      },
      addWithSuccess: false,
      showToast: false,
      state: '',
      message: '',
    }
  },
  methods: {
    addBooking() {
      const params = {
        title: this.booking.title,
        start: this.booking.start,
        end: this.booking.end,
        allDay: this.booking.allDay,
      }
      axios
        .post('http://127.0.0.1:8000/api/booking', this.booking)
        .then(() => {
          this.state = 'success'
          this.message = 'booking added with successfly'
          this.showToast = true
        })
        .catch(() => {
          this.state = 'error'
          this.showToast = true
          this.message = 'error to add a booking'
        })
      axios
        .post('http://127.0.0.1:8000/api/calendar', this.booking)
        .then(() => {
          this.state = 'success'
          this.message = 'booking added with successfly'
          this.showToast = true
        })
        .catch(() => {
          this.state = 'error'
          this.showToast = true
          this.message = 'error to add a booking'
        })

      axios
        .get('http://127.0.0.1:8000/api/booking')
        .then((data) => {
          console.log('data', data)
          this.booking = data.data
        })
        .catch((error) => {
          console.log('There was an error!')
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
      title="Add Booking"
      :icon="mdiBallot"
      form
      @submit.prevent="addBooking()"
    >
      <field label="Title">
        <control v-model="booking.title" />
      </field>
      <field label="Start">
        <input type="date" v-model="booking.start" />
      </field>
      <field label="End">
        <input type="date" v-model="booking.end" />
      </field>
      <divider />
      <field label="allDay">
        <control v-model="booking.allDay" />
      </field>

      <jb-buttons>
        <jb-button type="submit" color="info" label="Submit" />
        <jb-button type="reset" color="info" outline label="Reset" />
      </jb-buttons>
    </card-component>
  </main-section>
  <div class="addbooking">
    <Todos @badValue="triggerToast" />
  </div>
  <!-- <div id="app">
    {{ infos }}
  </div> -->
</template>

<style></style>
