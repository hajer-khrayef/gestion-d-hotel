<script setup>
import { ref, reactive } from 'vue'
import { mdiBallot, mdiAccount } from '@mdi/js'
import MainSection from '@/components/MainSection.vue'
import TitleBar from '@/components/TitleBar.vue'
import CardComponent from '@/components/CardComponent.vue'
import FilePicker from '@/components/FilePicker.vue'
import Field from '@/components/Field.vue'
import Control from '@/components/Control.vue'
import Divider from '@/components/Divider.vue'
import JbButton from '@/components/JbButton.vue'
import JbButtons from '@/components/JbButtons.vue'

const titleStack = ref(['Admin', 'Food'])

const selectOptions = [
  { id: 1, label: 'Soup' },
  { id: 2, label: 'Salad' },
  { id: 3, label: 'Dessert' }
]

const submit = () => {
  //
}
const food = reactive({
  name: '',
  price: '',
  type: selectOptions[0],
  description: '',
  status: '',
  image: null
})
</script>

<template>
  <title-bar :title-stack="titleStack" />
  <main-section>
    <card-component
      title="Add Food"
      :icon="mdiBallot"
      form
      @submit.prevent="submit"
    >
      <field label="Name">
        <control
          v-model="food.label"
          :icon="mdiAccount"
        />
      </field>
      <field label="price">
        <control
          v-model="food.price"
          :icon="mdiAccount"
        />
      </field>
      <field label="status">
        <control
          v-model="food.status"
          :icon="mdiAccount"
        />
      </field>

      <field label="type">
        <control
          v-model="food.type"
          :options="selectOptions"
        />
      </field>

      <divider />

      <field
        v-model="food.description"
        label="description"
        help="Your description. Max 255 characters"
      >
        <control
          type="textarea"
          placeholder="Describe your event"
        />
      </field>

      <divider />
      <field label="image">
        <file-picker v-model="food.image" />
      </field>
      <divider />
      <jb-buttons>
        <jb-button
          type="submit"
          color="info"
          label="Submit"
        />
        <jb-button
          type="reset"
          color="info"
          outline
          label="Reset"
        />
      </jb-buttons>
    </card-component>
  </main-section>
</template>
