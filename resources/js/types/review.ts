export interface Review {
  id: number;
  user_id: number;
  product_id: number;
  rating: number;
  title?: string;
  description?: string;
}
