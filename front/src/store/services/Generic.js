import Service from './Service'
import Response, { handle as h } from './Response'

export default class Generic extends Service {
  static _url = ''

  static _idProperty = 'id'

  static url (parameter) {
    return parameter
      ? `${this._url}/${parameter[this._idProperty]}`
      : this._url
  }

  static async fetch () {
    return new Response(await h(fetch(this.url(), {
      headers: this.authHeader()
    })))
  }

  static async get (payload) {
    const url = this.url(payload)
    return new Response(await h(fetch(url, {
      headers: this.authHeader()
    })))
  }

  static async create (payload) {
    return new Response(await h(fetch(this.url(), {
      headers: this.authHeader(),
      method: 'POST',
      body: JSON.stringify(payload)
    })))
  }

  static async update (payload) {
    const url = this.url(payload)

    return new Response(await h(fetch(url, {
      headers: this.authHeader(),
      method: 'PUT',
      body: JSON.stringify(payload)
    })))
  }

  static async remove (payload) {
    const url = this.url(payload)

    return new Response(await h(fetch(url, {
      headers: this.authHeader(),
      method: 'DELETE',
      body: JSON.stringify(payload)
    })))
  }
}

export class GenericTransitive extends Generic {
  static _resource = ''
  static _parentProperty = ''

  static url (parameter = {}) {
    const id = parameter[this._idProperty]
    const idParent = parameter[this._parentProperty]

    let retry = `${this._url}/${idParent}/${this._resource}`

    if (id) {
      retry += `/${id}`
    }

    return retry
  }

  static async create (payload) {
    return new Response(await h(fetch(this.url(payload), {
      headers: this.authHeader(),
      method: 'POST',
      body: JSON.stringify(payload)
    })))
  }
}
