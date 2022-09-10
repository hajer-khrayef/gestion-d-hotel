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
import axios from 'axios'

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
      editTicketsForm: {
        FactureNumber: '',
        UserName: '',
        RoomNumber: '',
        RoomPrice: '',
        CompanyName: '',
        Check_in: '',
        Check_out: '',
        FoodName_Prixunitaire_Quantite: '',
        FacilitiesName_Prixunitaire: '',
        PrixTotal: '',
      },
    }
  },
  props: {
    ticket: {
      type: Object,
      required: true,
      default: null,
    },
  },
  created() {
    // console.log(this.room);
    this.editTicketsForm.FactureNumber = this.ticket.FactureNumber
    this.editTicketsForm.UserName = this.ticket.UserName
    this.editTicketsForm.RoomNumber = this.ticket.RoomNumber
    this.editTicketsForm.RoomPrice = this.ticket.RoomPrice

    this.editTicketsForm.CompanyName = this.ticket.CompanyName
    this.editTicketsForm.Check_in = this.ticket.Check_in
    this.editTicketsForm.Check_out = this.ticket.Check_out
    this.editTicketsForm.FoodName_Prixunitaire_Quantite = this.ticket.FoodName_Prixunitaire_Quantite

    this.editTicketsForm.FacilitiesName_Prixunitaire = this.ticket.FacilitiesName_Prixunitaire
    this.editTicketsForm.Prixtotal = this.ticket.Prixtotal
  },
  methods: {
    editTicketsData() {
      const params = {
        FactureNumber: this.editTicketsForm.FactureNumber,
        UserName: this.editTicketsForm.UserName,
        RoomNumber: this.editTicketsForm.RoomNumber,
        RoomPrice: this.editTicketsForm.RoomPrice,
        CompanyName: this.editTicketsForm.CompanyName,
        Check_in: this.editTicketsForm.Check_in,
        Check_out: this.editTicketsForm.Check_out,
        FoodName_Prixunitaire_Quantite: this.editTicketsForm
          .FoodName_Prixunitaire_Quantite,
        FacilitiesName_Prixunitaire: this.editTicketsForm
          .FacilitiesName_Prixunitaire,
        Prixtotal: this.editTicketsForm.Prixtotal,
      }
      axios
        .put(`http://127.0.0.1:8000/api/facture/${this.ticket.id}`, params)
        .then((response) => {
          console.log(response)
        })
        .catch((error) => {
          console.log('Error here', error)
        })
    },
  },
}
</script>

<template>
  <div>
    <title-bar :title-stack="titleStack" />
    <main-section>
      <card-component
        title="Edit Tickets"
        :icon="mdiBallot"
        form
        @submit.prevent="editTicketsData()"
      >
        <field label="Facture Number">
          <control v-model="editTicketsForm.FactureNumber" />
        </field>
        <field label="User Name">
          <control v-model="editTicketsForm.UserName" />
        </field>
        <field label="Room Number">
          <control v-model="editTicketsForm.RoomNumber" />
        </field>
        <field label="Room Price">
          <control v-model="editTicketsForm.RoomPrice" />
        </field>
        <divider />
        <field label="Company Name">
          <control v-model="editTicketsForm.CompanyName" />
        </field>
        <field label="Check_in">
          <control v-model="editTicketsForm.Check_in" />
        </field>
        <field label="Check_out">
          <control v-model="editTicketsForm.Check_out" />
        </field>
        <field label="FoodName Prixunitaire Quantite">
          <control v-model="editTicketsForm.FoodName_Prixunitaire_Quantite" />
        </field>
        <field label="FacilitiesName Prixunitaire">
          <control v-model="editTicketsForm.FacilitiesName_Prixunitaire" />
        </field>
        <field label="Prix Total">
          <control v-model="editTicketsForm.Prixtotal" />
        </field>
        <jb-buttons>
          <jb-button type="submit" color="info" label="Submit" />
          <jb-button type="reset" color="info" outline label="Reset" />
        </jb-buttons>
      </card-component>
    </main-section>
  </div>
</template>
