<script setup>
/* import { ref, reactive } from "vue";
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
import JbButtons from "@/components/JbButtons.vue"; */
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
  data() { return { editEventbookingForm:{ 
    Number_of_tickets:'', 
    Total_cost:'', 
    Payement:'',
    Status:'',
    Created:'',
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
  created() { // console.log(this.room); 
  this.editEventbookingForm.Number_of_tickets =this.event.Number_of_tickets;
  this.editEventbookingForm.Total_cost = this.event.Total_cost;
  this.editEventbookingForm.Payement = this.event.Payement;
  this.editEventbookingForm.Status= this.event.Status;
  this.editEventbookingForm.Created = this.event.Created;
  

}

}
</script>

<template>
  <title-bar :title-stack="titleStack" />
  <main-section>
    <card-component
      title="Edit Event booking"
      :icon="mdiBallot"
      form
      @submit.prevent="submit"
    >
      <field label="Number_of_tickets">
        <control v-model="editEventbookingForm.Number_of_tickets" />
        </field>
        <field label="Total_cost ">
          <control v-model="editEventbookingForm.Total_cost" />
        </field>
        <field label="Payement">
          <control v-model="editEventbookingForm.Payement" />
        </field>
        <field label="Status">
          <control v-model="editEventbookingForm.Status" />
        </field>

        <field label="Created">
          <control v-model="editEventbookingForm.Created" />
        </field>
        <jb-buttons>
          <jb-button type="submit" color="info" label="Submit" />
          <jb-button type="reset" color="info" outline label="Reset" />
        </jb-buttons>
      
    </card-component>
  </main-section>
</template>
