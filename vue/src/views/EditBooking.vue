<script setup>
/*  import { ref, reactive } from "vue";
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
      editBookingForm: {
        title: '',
        start: '',
        end: '',
        allDay: '',
      },
    }
  },
  props: {
    booking: {
      type: Object,
      required: true,
      default: null,
    },
  },
  created() {
    this.editBookingForm.title = this.booking.title
    this.editBookingForm.start = this.booking.start
    this.editBookingForm.end = this.booking.end
    this.editBookingForm.allDay = this.booking.allDay
  },
}
</script>

<template>
  <div>
    <title-bar :title-stack="titleStack" />
    <main-section>
      <card-component
        title="Edit Booking"
        :icon="mdiBallot"
        form
        @submit.prevent="submit"
      >
        <field label="Title">
          <control v-model="editBookingForm.title" />
        </field>
        <field label="Start">
          <control v-model="editBookingForm.start" />
        </field>
        <field label="End">
          <control v-model="editBookingForm.end" />
        </field>
        <field label="AllDay">
          <control v-model="editBookingForm.allDay" />
        </field>
        <jb-buttons>
          <jb-button type="submit" color="info" label="Submit" />
          <jb-button type="reset" color="info" outline label="Reset" />
        </jb-buttons>
      </card-component>
    </main-section>
  </div>
</template>
