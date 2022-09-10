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
    foodorder: {
      type: Object,
      required: true,
      default: null,
    },
  },
  data() {
    return {
      editFoodOrderForm: {
        roombooking: '',
        quantity: '',
        cost: '',
      },
    }
  },
  created() {
    this.editFoodOrderForm.roombooking = this.foodorder.roombooking
    this.editFoodOrderForm.quantity = this.foodorder.quantity
    this.editFoodOrderForm.cost = this.foodorder.cost
  },
}
</script>

<template>
  <div>
    <title-bar :title-stack="titleStack" />
    <hero-bar>Edit FoodOrder</hero-bar>
    <main-section>
      <card-component :icon="mdiBallot" form @submit.prevent="submit">
        <field label="roombooking">
          <control v-model="editFoodOrderForm.roombooking" />
        </field>
        <field label="quantity">
          <control v-model="editFoodOrderForm.quantity" />
        </field>
        <field label="cost">
          <control v-model="editFoodOrderForm.cost" />
        </field>
        <jb-buttons>
          <jb-button type="submit" color="info" label="Submit" />
          <jb-button type="reset" color="info" outline label="Reset" />
        </jb-buttons>
      </card-component>
    </main-section>
  </div>
</template>
