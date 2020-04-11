import GenericService from './Generic'
import {
  CATEGORIES_URL,
  ORDERS_URL,
  ORDER_ITEMS_URL,
  PRODUCTS_URL,
  SHOPS_URL,
  SHOP_TYPES_URL
} from './api'

export class CategoryService extends GenericService {
  static _url = CATEGORIES_URL
}

export class OrderService extends GenericService {
  static _url = ORDERS_URL
}

export class OrderItemService extends GenericService {
  static _url = ORDER_ITEMS_URL
}

export class ProductService extends GenericService {
  static _url = PRODUCTS_URL
}

export class ShopService extends GenericService {
  static _url = SHOPS_URL
}
export class ShopTypeService extends GenericService {
  static _url = SHOP_TYPES_URL
}
