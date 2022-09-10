<script setup>
/* import { ref, reactive } from 'vue'
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

const titleStack = ref(['Admin', 'Edit Event'])
const selectOptions = [
  { id: 1, label: 'available' },
  { id: 2, label: 'not available' }
]
const event = reactive({
  name: 'event 001',
  price: '80',
  status: selectOptions[0],
  description: 'describe your event',
  capacity: '0 ',
  image: null
})
const submit = () => {
  //
} */
</script>
<script>
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
  data() { return { editEventForm:{ 
    Name:'', 
    Description:'', 
    Status:'',
    date:'',
    price:'',
    capacity:'',
    } 
    } 
    },

   props: {
    event: {
      type: Object,
      required: true,
      default: null,
    },
  }, 
  created() {
  this.editEventForm.Name =this.event.Name;
  this.editEventForm.Description = this.event.Description;
  this.editEventForm.Status = this.event.Status;
  this.editEventForm.date= this.event.date;
  this.editEventForm.price = this.event.price;
  this.editEventForm.capacity = this.event.capacity;

  

}

}
</script>

<template>
  <title-bar :title-stack="titleStack" />
  <main-section>
    <card-component
      title="Edit Event"
      :icon="mdiBallot"
      form
      @submit.prevent="submit"
    >
      <field label="Name">
        <control v-model="editEventForm.Name" />
      </field>
      <field label="Description ">
        <control v-model="editEventForm.Description" />
      </field>
      <field label="Status">
        <control v-model="editEventForm.Status" />
      </field>
      <field label="date">
        <control v-model="editEventForm.date" />
      </field>
      <field label="price">
        <control v-model="editEventForm.price" />
      </field>

      <field label="capacity">
        <control v-model="editEventForm.capacity" />
      </field>
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
