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
import { reactive } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'
var token
export default {
  data() {
    return {
      formregister: {
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
      },
    }
  },

  methods: {
    register() {
      // console.log(this.formregister)
      axios
        .post('http://127.0.0.1:8000/api/register', this.formregister)
        .then((response) => {
          console.log(response)
          if (response && response.status === 201) {
            this.$router.push({
              name: 'login',
            })
          }
        })
        .catch((error) => {
          console.log('Error here', error)
        })
    },
  },
}
</script>

<template>
  <main-section>
    <!-- <div class="grid grid-cols-1 lg:grid-cols-2 gap-6"> -->
    <full-screen-section v-slot="{ cardClass, cardRounded }" bg="register">
      <card-component
        :class="cardClass"
        :rounded="cardRounded"
        formregister
        @submit.prevent="submit"
      >
        <field label="name" help="Please enter your name">
          <control
            v-model="formregister.name"
            :icon="mdiAccount"
            name="name"
            autocomplete="username"
          />
        </field>
        <field label="email" help="Please enter your email">
          <control
            v-model="formregister.email"
            :icon="mdiAccount"
            name="email"
          />
        </field>

        <field label="Password" help="Please enter your password">
          <control
            v-model="formregister.password"
            :icon="mdiAsterisk"
            type="password"
            name="password"
            autocomplete="current-password"
          />
        </field>
        <field
          label="Password_confirmation"
          help="Please enter your password_confirmation"
        >
          <control
            v-model="formregister.password_confirmation"
            :icon="mdiAsterisk"
            type="password"
            name="password_confirmation"
            autocomplete="current-password"
          />
        </field>

        <divider />

        <jb-buttons>
          <jb-button
            type="submit"
            color="info"
            label="register"
            @click="register"
          />
          <!--  <jb-button to="/" color="info" outline label="Reset Password" /> -->
        </jb-buttons>
      </card-component>
    </full-screen-section>
  </main-section>
</template>
