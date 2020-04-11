import Service from './Service'
import Response, { handle as h } from './Response'
// import axios from 'axios'
// import Response, { axiosAwait } from './Response'
import { LOGIN, USER_URL } from './api'

class SessionService extends Service {
  static async login ({ username, password }) {
    const payload = {
      username,
      password,
      client_secret: process.env.CLIENT_SECRET,
      client_id: process.env.CLIENT_ID,
      grant_type: 'password',
      scope: '*'
    }

    const request = await h(fetch(LOGIN, {
      method: 'POST',
      headers: this.commonHeader(),
      body: JSON.stringify(payload)
    }))

    return new Response(request)
  }

  static async fetchUser () {
    const request = await h(fetch(USER_URL, {
      headers: this.commonHeader()
    }))

    return new Response(request)
  }
}

export default SessionService
