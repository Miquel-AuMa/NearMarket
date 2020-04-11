export function login (state, payload) {
  const { accessToken, refreshToken, loginAt, expirationAt, refreshExpirationAt } = payload

  state.accessToken = accessToken
  state.refreshToken = refreshToken
  state.loginAt = loginAt
  state.expirationAt = expirationAt
  state.refreshExpirationAt = refreshExpirationAt

  localStorage.setItem('access_token', accessToken)
  localStorage.setItem('refresh_token', refreshToken)
  localStorage.setItem('login_at', loginAt)
  localStorage.setItem('expiration_at', expirationAt)
  localStorage.setItem('refresh_expiration_at', refreshExpirationAt)
}

export function logout (state) {
  state.accessToken = null
  state.refreshToken = null
  state.loginAt = null
  state.expirationAt = null
  state.refreshExpirationAt = null

  localStorage.removeItem('access_token')
  localStorage.removeItem('refresh_token')
  localStorage.removeItem('login_at')
  localStorage.removeItem('expiration_at')
  localStorage.removeItem('refresh_expiration_at')
}

export function setUser (state, user) {
  state.user = user
}
