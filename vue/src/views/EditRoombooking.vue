<script>
import { mdiBallot } from '@mdi/js'
import MainSection from '@/components/MainSection.vue'
import TitleBar from '@/components/TitleBar.vue'
import CardComponent from '@/components/CardComponent.vue'
import Field from '@/components/Field.vue'
import Control from '@/components/Control.vue'
import Divider from '@/components/Divider.vue'
import JbButton from '@/components/JbButton.vue'
import JbButtons from '@/components/JbButtons.vue'
export default {
  components: {
    MainSection,
    TitleBar,
    CardComponent,
    Field,
    Control,
    JbButtons,
    Divider,
    JbButton,
  },
  data() {
    return
    {
      editRoombookingForm: {
        /*   Name:'',
     Start_date:'', 
     Cost_per_day:'',
     Status:'', 
     End_date:'',  */
      }
    }
  },
  props: { roombooking: { type: Object, required: true, default: null } },
  created() {
    this.editRoombookingForm.Name = this.roombooking.Name
    this.editRoombookingForm.Start_date = this.roombooking.Start_date
    this.editRoombookingForm.Cost_per_day = this.roombooking.Cost_per_day
    this.editRoombookingForm.Status = this.roombooking.Status
    this.editRoombookingForm.End_date = this.roombooking.End_date
  },
}
</script>

<template>
  <div>
    <title-bar :title-stack="titleStack" />
    <main-section>
      <card-component
        title="Edit Room Booking"
        :icon="mdiBallot"
        form
        @submit.prevent="submit"
      >
        <field label="Name">
          <control v-model="editRoombookingForm.Name" />
        </field>
        <field label="Start_date">
          <control v-model="editRoombookingForm.Start_date" />
        </field>
        <field label="Cost_per_day">
          <control v-model="editRoombookingForm.cost_Par_Day" />
        </field>

        <field label="Status">
          <control v-model="editRoombookingForm.Status" />
        </field>
        <field label="End_date">
          <control v-model="editRoombookingForm.End_date" />
        </field>

        <jb-buttons>
          <jb-button type="submit" color="info" label="Submit" />
          <jb-button type="reset" color="info" outline label="Reset" />
        </jb-buttons>
      </card-component>
    </main-section>
  </div>
</template>
