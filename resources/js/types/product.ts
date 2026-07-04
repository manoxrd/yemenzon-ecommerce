import type { User } from './auth';
import type { Category } from './category';

export interface Product {
  id: number;
  user_id: number;
  category_id: number;
  name: string;
  slug: string;
  description: string;
  price: number;
  stock: number;
  thumbnail_url: string;
  user?: User;
  category?: Category
}
