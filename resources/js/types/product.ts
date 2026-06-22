import type { User } from "./auth"

export interface Product {
  id: number,
  user_id: number,
  name: string,
  description: string,
  price: number,
  stock: number
  user?: User
}