import type { User } from "./auth"

export interface Product {
  id: number,
  user_id: number,
  name: string,
  slug: string,
  description: string,
  price: number,
  stock: number
  thumbnail_url: string,
  user?: User
}