import axios from 'axios'
const baseURL = 'http://localhost:8000/api'
export const fetchEvents = async () => {
  const response = await fetch(` ${baseURL}/calendar`)
  return await response.json()
}
export const storeEvent = async (event) => {
  axios
    .post(`${baseURL}/calendar`, event)
    .then((response) => {
      return response
    })
    .catch((error) => {
      return error
    })
  axios
    .post(`${baseURL}/booking`, event)
    .then((response) => {
      return response
    })
    .catch((error) => {
      return error
    })
  // return await fetch(`${baseURL}/calendar/`, event, {
  //   method: 'POST',
  //   headers: {
  //     ContentType: 'application/json'
  //   },
  //   body: event
  // })
}
export const mutateEvent = async (event, id) => {
  return await fetch(`${baseURL}/calendar/${id}`, {
    method: 'PUT',
    headers: {
      ContentType: 'application/json'
    },
    body: JSON.stringify(event)
  })
}
export const destroyEvent = async (id) => {
  return await fetch(`${baseURL}/calendar/${id}`, {
    method: 'DELETE'
  })
}
