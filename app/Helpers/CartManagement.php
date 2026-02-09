<?php

namespace App\Helpers;

use App\Models\Product;
use Illuminate\Support\Facades\Cookie;

class CartManagement {

    static public function getCartItemsFromCookie() {
        $cart_items = json_decode(Cookie::get('cart_items'), true);
        return is_array($cart_items) ? $cart_items : [];
    }

    static public function addCartItem($product_id, $quantity = 1) {
        $cart_items = self::getCartItemsFromCookie();
        $existing_item = null;

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                $existing_item = $key;
                break;
            }
        }

        if ($existing_item !== null) {
            $cart_items[$existing_item]['quantity'] += $quantity;
            $cart_items[$existing_item]['total_amount'] = $cart_items[$existing_item]['quantity'] * $cart_items[$existing_item]['unit_amount'];
        } else {
            $product = Product::find($product_id);
            if ($product) {
                $cart_items[] = [
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'image' => $product->image,
                    'quantity' => $quantity,
                    'unit_amount' => $product->price,
                    'total_amount' => $product->price * $quantity
                ];
            }
        }

        self::addCartItemsToCookie($cart_items);
        return self::calculateTotalQuantity($cart_items);
    }

    // NUEVO: Eliminar un producto
    static public function removeItem($product_id) {
        $cart_items = self::getCartItemsFromCookie();
        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                unset($cart_items[$key]);
            }
        }
        self::addCartItemsToCookie(array_values($cart_items));
        return self::calculateTotalQuantity($cart_items);
    }

    // NUEVO: Incrementar/Decrementar
    static public function updateQuantity($product_id, $type) {
        $cart_items = self::getCartItemsFromCookie();
        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                if ($type == 'increment') {
                    $cart_items[$key]['quantity']++;
                } elseif ($type == 'decrement' && $cart_items[$key]['quantity'] > 1) {
                    $cart_items[$key]['quantity']--;
                }
                $cart_items[$key]['total_amount'] = $cart_items[$key]['quantity'] * $cart_items[$key]['unit_amount'];
            }
        }
        self::addCartItemsToCookie($cart_items);
        return self::calculateTotalQuantity($cart_items);
    }

    static public function calculateTotalQuantity($cart_items) {
        return array_sum(array_column($cart_items, 'quantity'));
    }

    static public function addCartItemsToCookie($cart_items) {
        Cookie::queue('cart_items', json_encode($cart_items), 60 * 24 * 30);
    }

    static public function clearCartItems() {
        // Elimina la cookie del carrito
        Cookie::queue(Cookie::forget('cart_items'));
    }
}