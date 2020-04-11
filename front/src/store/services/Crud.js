import GenericService from './Generic'
import { PLACES_URL, PRODUCTS_URL } from './api'

export class PlaceService extends GenericService {
  static _url = PLACES_URL
}

export class ProductService extends GenericService {
  static _url = PRODUCTS_URL
}
