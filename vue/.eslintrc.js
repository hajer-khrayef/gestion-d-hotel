module.exports = {
  root: true,
  env: {
    es2021: true
  },
  globals: {
    defineProps: 'readonly',
    defineEmits: 'readonly'
  },
  extends: [
    'plugin:vue/vue3-recommended',
    '@vue/standard'
  ],
  parser: 'vue-eslint-parser',
  rules: {
    'no-console': process.env.NODE_ENV === 'production' ? 'warn' : 'off',
    'no-debugger': process.env.NODE_ENV === 'production' ? 'warn' : 'off'

  }
}
