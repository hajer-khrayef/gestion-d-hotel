import {
  mdiAccountCircle,
  mdiDesktopMac,
  mdiMonitorShimmer,
  mdiSquareEditOutline,
  mdiTable,
  mdiViewList,
  mdiTelevisionGuide
} from '@mdi/js'

export default [
  'General',
  [
    {
      to: '/dashboard',
      icon: mdiDesktopMac,
      label: 'Dashboard'
    }
  ],
  'Examples',
  [
    {
      to: '/booking',
      label: 'booking',
      icon: mdiTable
    },
    {
      to: '/roombooking',
      label: 'Room Bookings',
      icon: mdiTable
    },
    {
      to: '/rooms',
      label: 'Rooms',
      icon: mdiSquareEditOutline
    },
    {
      to: '/Events',
      label: 'Events',
      icon: mdiSquareEditOutline
    },
    {
      to: '/eventbooking',
      label: 'Event Bookings',
      icon: mdiSquareEditOutline
    },
    {
      to: '/foods',
      label: 'Foods',
      icon: mdiSquareEditOutline
    },
    {
      to: '/foodorders',
      label: 'Food Orders',
      icon: mdiSquareEditOutline
    },
    {
      to: '/Facilities',
      label: 'Facilities',
      icon: mdiSquareEditOutline
    },
    {
      to: '/tickets',
      label: 'Tickets',
      icon: mdiSquareEditOutline
    },
    {
      to: '/calendar',
      label: 'Calendar',
      icon: mdiTelevisionGuide
    },
    {
      to: '/profile',
      label: 'Profile',
      icon: mdiAccountCircle
    },
    {
      label: 'Submenus',
      subLabel: 'Submenus Example',
      icon: mdiViewList,
      menu: [
        {
          label: 'Add Booking',
          to: '/addbooking'
        },
        {
          label: 'Add Room',
          to: '/addroom'
        },
        {
          label: 'Add Event',
          to: '/addevent'
        },
        {
          label: 'Add Food',
          to: '/addfood'
        }
      ]
    }
  ],
  'About',
  [
    {
      href: 'https://www.tunvita.com/',
      label: 'about us',
      icon: mdiMonitorShimmer,
      target: '_blank'
    }
  ]
]
