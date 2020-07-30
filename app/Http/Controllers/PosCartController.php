<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Cart;

class PosCartController extends Controller
{
	public function getData(Request $request)
	{
		try {
			$cart = Cart::instance('pos')->content();
			return response()->json($cart, 200);
		} catch (\Exception $e) {
			$data = [
				'code' => 500,
				'message' => 'Terjadi Kesalahan !',
				'error' => $e,
			];
			return response()->json($data);
		}
	}

	public function check(Request $request)
	{
		try {
			$product = Product::findOrFail($request->id);
			return response()->json($product, 200);
		} catch (\Exception $e) {
			$data = [
				'code' => 500,
				'message' => 'Terjadi Kesalahan !',
				'error' => $e,
			];
			return response()->json($data);
		}
	}

	public function add(Request $request)
	{
		try {
			$product = Product::findOrFail($request->id);
			$cart = Cart::instance('pos')->add([
				'id' => $product->id,
				'name' => $product->name,
				'qty' => $request->qty,
				'price' => $product->price,
			]);

			$data = [
				'code' => 200,
				'message' => 'Berhasil Menambahkan Produk !',
			];
			return response()->json($data, 200);
		} catch (\Exception $e) {
			$data = [
				'code' => 500,
				'message' => 'Terjadi Kesalahan !',
				'error' => $e,
			];
			return response()->json($data);
		}
	}

	public function getTotal()
	{
		$cart = Cart::instance('pos')->total(0, ',', '.');
		return response()->json($cart, 200);
	}

	public function destroy()
	{
		$cart = Cart::instance('pos')->destroy();
		return redirect(url('/pos'));
	}

	public function delete(Request $request)
	{
		try {
			$cart = Cart::instance('pos')->remove($request->rowId);
			$data = [
				'code' => 200,
				'message' => 'Data Keranjang di-Hapus !',
			];
			return response()->json($data, 200);
		} catch (\Exception $e) {
			$data = [
				'code' => 500,
				'message' => 'Terjadi Kesalahan !',
				'error' => $e,
			];
			return response()->json($data);
		}
	}

	public function checkCartItem(Request $request)
	{
		try {
			$rowId = $request->rowId;
			$cart = Cart::instance('pos')->search(function ($cartItem, $rowId) {
				return $cartItem->rowId === $rowId;
			});

			$product = Product::findOrFail($cart->first()->id);

			$data = [
				'product' => $product,
				'cart' => $cart->first()
			];
			return response()->json($data, 200);
		} catch (\Exception $e) {
			$data = [
				'code' => 500,
				'message' => 'Terjadi Kesalahan !',
				'error' => $e,
			];
			return response()->json($data);
		}
	}

	public function update(Request $request)
	{
		try {
			$rowId = $request->rowId;
			$cart = Cart::instance('pos')->update($rowId, $request->qty);
			
			$data = [
				'code' => 200,
				'message' => 'Data di-Ubah !',
			];

			return response()->json($data, 200);
		} catch (\Exception $e) {
			$data = [
				'code' => 500,
				'message' => 'Terjadi Kesalahan !',
				'error' => $e,
			];
			return response()->json($data);
		}
	}
}
