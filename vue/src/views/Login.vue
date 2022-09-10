<script setup>
/* import { mdiAccount, mdiAsterisk } from '@mdi/js'
import FullScreenSection from '@/components/FullScreenSection.vue'
import CardComponent from '@/components/CardComponent.vue'
import CheckRadioPicker from '@/components/CheckRadioPicker.vue'
import Field from '@/components/Field.vue'
import Control from '@/components/Control.vue'
import Divider from '@/components/Divider.vue'
import JbButton from '@/components/JbButton.vue'
import JbButtons from '@/components/JbButtons.vue'
import { reactive } from 'vue'
import { useRouter } from 'vue-router' */
</script>
<script>
import { mdiAccount, mdiAsterisk } from '@mdi/js'
import FullScreenSection from '@/components/FullScreenSection.vue'
import CardComponent from '@/components/CardComponent.vue'
import CheckRadioPicker from '@/components/CheckRadioPicker.vue'
import Field from '@/components/Field.vue'
import Control from '@/components/Control.vue'
import Divider from '@/components/Divider.vue'
import JbButton from '@/components/JbButton.vue'
import JbButtons from '@/components/JbButtons.vue'
import Toast from '@/components/Toast.vue'
import { reactive } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'
export default {
  data() {
    return {
      form: {
        email: '',
        password: '',
      },
      addWithSuccess: false,
      showToast: false,
      state: '',
      message: '',
    }
  },
  /*   watch: {
    users: {
      Handler(form) {
      localStorage.users = JSON.stringify(form)
    },
  },
  mounted() {
    if (localStorage.users) {
      this.users = JSON.parse(localStorage.users)
    },
    deep: true
  }
  }, */
  methods: {
    login() {
      // console.log(this.form)
      axios
        .post('http://127.0.0.1:8000/api/login', this.form)
        .then((response) => {
          this.state = 'success'
          this.message = 'login with successfly'
          this.showToast = true
          console.log(response)
          if (response && response.status === 201) {
            this.$router.push({
              name: 'dashboard',
            })
          }
          localStorage.setItem('jwtToken', response.data.token)
          /*  let lsUsers = localStorage.users
          lsUsers = JSON.parse(lsUsers)
          let emailIndex = lsUsers.findIndex(
            (user) => user.email === form.email,
          )
          if (emailIndex > -1) {
            let passwordIndex = lsUsers.findIndex(
              (user) => user.password === form.password,
            )
          } */
        })
        .catch(() => {
          this.state = 'error'
          this.showToast = true
          this.message = 'error to login'
        })
    },
  },
  components: { Toast },
}

// const form = reactive({
//   login: 'hajer.khrayef',
//   pass: 'hajer123',
//   remember: ['remember']
// })

// const router = useRouter()

// const submit = () => {
//   router.push('/dashboard')
// }
</script>

<template>
  <main-section>
    <toast v-if="showToast" :state="state" :message="message" />
    <full-screen-section v-slot="{ cardClass, cardRounded }" bg="login">
      <card-component
        :class="cardClass"
        :rounded="cardRounded"
        form
        @submit.prevent="submit"
      >
        <field label="email" help="Please enter your email">
          <control
            v-model="form.email"
            :icon="mdiAccount"
            name="email"
            autocomplete="username"
          />
        </field>

        <field label="Password" help="Please enter your password">
          <control
            v-model="form.password"
            :icon="mdiAsterisk"
            type="password"
            name="password"
            autocomplete="current-password"
          />
        </field>

        <check-radio-picker
          v-model="form.remember"
          name="remember"
          :options="{ remember: 'Remember' }"
        />

        <divider />

        <jb-buttons>
          <jb-button type="submit" color="info" label="Login" @click="login" />
          <jb-button to="/" color="info" outline label="Reset Password" />
          <jb-button
            color="info"
            outline
            label="create an account"
            href="#/register"
          />
        </jb-buttons>
      </card-component>
    </full-screen-section>
  </main-section>
  <Todos @badValue="triggerToast" />
</template>
