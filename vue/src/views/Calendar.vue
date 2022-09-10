<template>
  <FullCalendar :options="options" />
</template>
<script setup>
import { ref, reactive, watch } from 'vue'

import '@fullcalendar/core/vdom'
import FullCalendar from '@fullcalendar/vue3'
import dayGridPlugin from '@fullcalendar/daygrid'
import listPlugin from '@fullcalendar/list'
// import axios from 'axios'
import timeGridPlugin from '@fullcalendar/timegrid'
import interactionPlugin from '@fullcalendar/interaction'
import useEvents from '../composables/useEvents.js'
const id = ref(0)

const { getEvents, createEvent, updateEvent, deleteEvent } = useEvents()
const options = reactive({
  plugins: [dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin],
  initialView: 'dayGridMonth',
  headerToolbar: {
    left: 'prev,next today',
    center: 'title',
    right: 'dayGridMonth,timeGridWeek,listDay',
  },

  editable: true,
  selectable: true,
  weekends: true,
  select: (arg) => {
    id.value = id.value + 1
    const cal = arg.view.calendar
    cal.unselect()
    cal.addEvent({
      /* id: `${id.value}`,` New event ${id.value}` */
      title: arg.title,
      start: arg.start,
      end: arg.end,
      allDay: true,
    })
  },
  //  var booking = @JSON($event),
  //      event: booking,
  eventClick: (arg) => {
    if (arg.event) {
      arg.event.remove()
    }
  },
  events: [],
  eventAdd: (arg) => {
    createEvent({
      title: arg.event.title,
      start: arg.event.start,
      end: arg.event.end,
      allDay: arg.event.allDay,
    })
  },
  eventChange: (arg) => {
    updateEvent(
      {
        id: arg.event.id,
        title: arg.event.title,
        start: arg.event.start,
        end: arg.event.end,
        allDay: arg.event.allDay,
      },
      arg.event.id,
    )
  },
  eventRemove: (arg) => {
    deleteEvent(arg.event.id)
  },
})
options.events = getEvents.value
watch(getEvents, () => {
  options.events = getEvents.value
})
</script>
