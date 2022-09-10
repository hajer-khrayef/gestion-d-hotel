<script setup>
/* import { ref, reactive } from 'vue'
import { mdiBallot } from '@mdi/js'
import MainSection from '@/components/MainSection.vue'
import TitleBar from '@/components/TitleBar.vue'
import CardComponent from '@/components/CardComponent.vue'
import HeroBar from '@/components/HeroBar.vue'
import FilePicker from '@/components/FilePicker.vue'
import Field from '@/components/Field.vue'
import Control from '@/components/Control.vue'
import Divider from '@/components/Divider.vue'
import JbButton from '@/components/JbButton.vue'
import JbButtons from '@/components/JbButtons.vue'

const titleStack = ref(['Admin', 'Food'])

const selectOptions = [
  { id: 1, label: 'salad' },
  { id: 2, label: 'soop' },
  { id: 3, label: 'dessert' }
]

const submit = () => {
  //
}
const food = reactive({
  name: 'food 001',
  price: '80',
  type: selectOptions[0],
  description: 'delicious salad  ',
  status: 'available',
  image: null
}) */
</script>
<script>
import { mdiBallot } from '@mdi/js'
import MainSection from '@/components/MainSection.vue'
import TitleBar from '@/components/TitleBar.vue'
import CardComponent from '@/components/CardComponent.vue'
import HeroBar from '@/components/HeroBar.vue'
import Field from '@/components/Field.vue'
import Control from '@/components/Control.vue'
import JbButton from '@/components/JbButton.vue'
import JbButtons from '@/components/JbButtons.vue'

export default {
  components: {
    MainSection,
    TitleBar,
    HeroBar,
    CardComponent,
    Field,
    Control,
    JbButtons,
    JbButton,
  },
  props: {
    food: {
      type: Object,
      required: true,
      default: null,
    },
  },
  data() {
    return {
      editFoodForm: {
        Name: '',
        Description: '',
        status: '',
        type: '',
        price: '',
      },
    }
  },
  created() {
    // console.log(this.room);
    this.editFoodForm.Name = this.food.Name
    this.editFoodForm.Description = this.food.Description
    this.editFoodForm.status = this.food.status
    this.editFoodForm.type = this.food.type
    this.editFoodForm.price = this.food.price
  },
}
</script>

<template>
  <div>
    <title-bar :title-stack="titleStack" />
    <hero-bar>Edit Food</hero-bar>
    <main-section>
      <card-component :icon="mdiBallot" form @submit.prevent="submit">
        <field label="Name">
          <control v-model="editFoodForm.Name" />
        </field>
        <field label="price">
          <control v-model="editFoodForm.price" />
        </field>
        <field label="status">
          <control v-model="editFoodForm.status" />
        </field>

        <field label="type">
          <control v-model="editFoodForm.type" :options="selectOptions" />
        </field>

        <field
          v-model="editFoodForm.Description"
          label="description"
          help="Your description. Max 255 characters"
        >
          <control type="textarea" />
        </field>
        <jb-buttons>
          <jb-button type="submit" color="info" label="Submit" />
          <jb-button type="reset" color="info" outline label="Reset" />
        </jb-buttons>
      </card-component>
    </main-section>
  </div>
</template>
