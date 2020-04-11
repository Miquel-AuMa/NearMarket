// import errorMessage from '../generics/errorMessage'

class Response {
  constructor (res) {
    this.isOk = res.isOk
    this.code = res.code
    this.error = res.error
    this.message = res.message
    this.data = res.data
  }
}

export default Response

async function fetchAwait (fetchPromise) {
  const load = {}

  try {
    const res = await fetchPromise
    load.isOk = res.ok
    load.code = res.status
    load.message = ''
    load.error = null
    load.data = await res.json()
  } catch (error) {
    load.isOk = false
    load.message = error.message || error.statusText
    load.error = error
    load.code = -1
    load.data = null
  }

  return load
}

export async function handle (promise) {
  return fetchAwait(promise)
}

export async function axiosAwait (axiosPromise) {
  const load = {}

  try {
    const res = await axiosPromise
    load.isOk = true
    load.code = res.status
    load.message = ''
    load.error = null
    load.data = res.data
  } catch (error) {
    load.isOk = false
    load.code = error
    load.message = error
    load.error = error
    load.data = null
  }

  return load
}
