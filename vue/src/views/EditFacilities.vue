<script>
import { mdiBallot } from '@mdi/js'
import MainSection from '@/components/MainSection.vue'
import TitleBar from '@/components/TitleBar.vue'
import CardComponent from '@/components/CardComponent.vue'
import CheckRadioPicker from '@/components/CheckRadioPicker.vue'
import FilePicker from '@/components/FilePicker.vue'
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
    CheckRadioPicker,
    FilePicker,
    Field,
    Control,
    JbButtons,
    Divider,
    JbButton,
  },
  data() {
    return {
      editFacilitieForm: {
        Name: '',
        Description: '',
        Status: '',
        is_default: '',
      },
    }
  },
  props: {
    facilitie: {
      type: Object,
      required: true,
      default: null,
    },
  },
  created() {
    // console.log(this.room);
    this.editFacilitieForm.Name = this.facilitie.RoomNumber
    this.editFacilitieForm.Description = this.facilitie.Description
    this.editFacilitieForm.Status = this.facilitie.Status
    this.editFacilitieForm.is_default = this.facilitie.is_default
  },
}
</script>

<template>
  <div>
    <title-bar :title-stack="titleStack" />
    <main-section>
      <card-component
        title="Edit Facilities"
        :icon="mdiBallot"
        form
        @submit.prevent="submit"
      >
        <field label="Name">
          <control v-model="editFacilitieForm.Name" />
        </field>
        <field label="Description" help="Your description. Max 255 characters">
          <control v-model="editFacilitieForm.Description" type="textarea" />
        </field>
        <field label="Status">
          <control v-model="editFacilitieForm.Status" />
        </field>
        <field label="is_default">
          <control v-model="editFacilitieForm.is_default" />
        </field>
        <jb-buttons>
          <jb-button type="submit" color="info" label="Submit" />
          <jb-button type="reset" color="info" outline label="Reset" />
        </jb-buttons>
      </card-component>
    </main-section>
  </div>
</template>
