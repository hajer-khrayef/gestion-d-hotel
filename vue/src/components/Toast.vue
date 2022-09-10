<template>
  <div v-show="showToast" class="toast-wrapper">
    <div :class="getClassState">
      {{ message }}
    </div>
  </div>
</template>
<script>
export default {
  name: 'Toast',

  props: {
    state: {
      type: String,
      default: '',
    },
    message: {
      type: String,
      default: '',
    },
  },
  data() {
    return {
      showToast: true,
    }
  },
  created() {
    setTimeout(() => (this.showToast = false), 3000)
  },
  computed: {
    getClassState() {
      if (this.state === 'success') {
        return 'toast-success'
      } else if (this.state === 'error') {
        return 'toast-error'
      } else {
        return 'toast-warning'
      }
    },
  },
}
</script>
<style>
.toast-wrapper {
  position: fixed;
  width: 100%;
  top: 55px;
  z-index: 99px;
  margin-right: 20px;
}

.toast-warning,
.toast-error,
.toast-success {
  padding: 20px;
  color: white;
  border-radius: 10px;
  box-shadow: 1px 3px 5px rgba(0, 0, 0, 0.2);
  max-width: 400px;
  margin: 0 auto;
}

.toast-warning {
  background: rgb(255, 174, 0);
}

.toast-success {
  background: rgb(0, 145, 255);
}

.toast-error {
  background: rgb(255, 0, 0);
}
</style>
