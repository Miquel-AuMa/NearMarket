import isBefore from 'date-fns/isBefore'

/**
 * Partial aplication of a route config generator
 *
 * @param {boolean} requireAuth
 *
 * @returns {(route, component, meta) => routeConfig}
 *
 * @example routify(true)
 */
function routify (requireAuth) {
  return (route, component, meta = {}) => {
    const pathToComponent = `../views/${component}.vue`

    return {
      ...route,
      component: () => import(pathToComponent),
      meta: {
        ...meta,
        requireAuth
      }
    }
  }
}

/**
 * Private route generator
 *
 * @example route({ path: '/home', name: 'home' }, 'Home', { metaValue: 42 })
 *
 * @param {object} route
 * @param {string} component
 * @param {object} meta
 *
 * @returns {object} It retrieves an private route config for the router
 */
export const route = routify(true)

/**
 * Public route generator
 *
 * @example publicRoute({ path: '/home', name: 'home' }, 'Home', { metaValue: 42 })
 *
 * @param {object} route
 * @param {string} component
 * @param {object} meta
 *
 * @returns {object} It retrieves an public route config for the router
 */
export const publicRoute = routify(false)

/**
 * WIP - session guardian
 * @param to
 * @param from
 * @param next
 */
export function guardian (to, _, next) {
  if (!to.meta.requiresAuth) return next()
  if (!checkLocalAuth()) return next({ path: '/login' })
  return next()
}

/**
 * Helper that resume the propper session checking
 */
export function checkLocalAuth () {
  // if (process.env.DEV) return true

  const authToken = localStorage.getItem('access_token')
  if (!authToken) {
    localStorage.clear()
    return false
  }

  const expireSession = new Date((localStorage.getItem('expiration_at')))
  if (!expireSession) return false

  return isBefore(Date.now(), expireSession)
}
