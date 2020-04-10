class Service {
  static getToken () {
    return localStorage.getItem('access_token')
  }

  static authHeader () {
    return {
      Authorization: this.getToken(),
      'Content-Type': 'application/json'
    }
  }

  static commonHeader () {
    return { 'Content-Type': 'application/json' }
  }
}

export default Service
