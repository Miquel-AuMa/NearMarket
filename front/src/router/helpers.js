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
 * @param from
 * @param to
 * @param next
 */
export function guardian (_, to, next) {
  const { requireAuth } = to.meta
  if (!requireAuth) return next()
}
