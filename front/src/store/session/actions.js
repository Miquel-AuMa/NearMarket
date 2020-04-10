import addSeconds from 'date-fns/addSeconds'
import addDays from 'date-fns/addDays'
import SessionService from '../services/Session'

export async function login ({ commit, dispatch }, payload) {
  const response = await SessionService.login(payload)

  if (response.isOk) {
    const { data } = response
    const loginAt = new Date()
    const expirationAt = addSeconds(loginAt, data.expires_in)
    const refreshExpirationAt = addDays(expirationAt, 7)

    commit('login', {
      accessToken: `${data.token_type} ${data.access_token}`,
      refreshToken: `${data.token_type} ${data.refresh_token}`,
      loginAt,
      expirationAt,
      refreshExpirationAt
    })

    await dispatch('fetchUser')
  }

  return response
}

export async function logout ({ commit }) {
  // await SessionService.logout()
  commit('logout')
}

export async function fetchUser ({ commit }) {
  const response = await SessionService.fetchUser()

  if (response.isOk) {
    commit('setUser', response.data)
  }

  return response
}
