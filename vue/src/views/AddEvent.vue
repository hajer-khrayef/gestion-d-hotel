<script setup>
import { ref, reactive } from 'vue'
import { mdiBallot } from '@mdi/js'
import MainSection from '@/components/MainSection.vue'
import TitleBar from '@/components/TitleBar.vue'
import CardComponent from '@/components/CardComponent.vue'
import FilePicker from '@/components/FilePicker.vue'
import Field from '@/components/Field.vue'
import Control from '@/components/Control.vue'
import Divider from '@/components/Divider.vue'
import JbButton from '@/components/JbButton.vue'
import JbButtons from '@/components/JbButtons.vue'

const titleStack = ref(['Admin', 'Event'])
const selectOptions = [
  { id: 1, label: 'available' },
  { id: 2, label: 'not available' }
]
const submit = () => {
  //
}
const event = reactive({
  name: '',
  price: '',
  status: selectOptions[0],
  description: '',
  capacity: '',
  image: null
})
</script>

<template>
  <title-bar :title-stack="titleStack" />
  <main-section>
    <card-component
      title="Add Event"
      :icon="mdiBallot"
      form
      @submit.prevent="submit"
    >
      <field label="Name">
        <control
          v-model="event.name"
        />
      </field>
      <field label="price">
        <control
          v-model="event.price"
        />
      </field>
      <field label="capacity">
        <control
          v-model="event.capacity"
        />
      </field>

      <field label="status">
        <control
          v-model="event.status"
          :options="selectOptions"
        />
      </field>

      <divider />

      <field
        v-model="event.description"
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
        <file-picker v-model="event.image" />
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
