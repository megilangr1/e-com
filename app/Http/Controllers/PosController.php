<?php

namespace App\Http\Controllers;

use App\PosDetail;
use App\PosHeader;
use App\Product;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\DB;
use PDF;

class PosController extends Controller
{
	public function index()
	{
		$cart = Cart::instance('pos');
		$product = Product::orderBy('name', 'asc')->where('stock', '>', 0)->get();
		return view('pos.index', compact('cart', 'product'));
	}

	public function store(Request $request)
	{
		try {
			$cart = Cart::instance('pos');
			if ($cart->count() > 0) {
				DB::beginTransaction();

				try {
					$header = PosHeader::create([
						'transaction_date' => date('Y-m-d'),
						'total' => $cart->total(0, '', ''),
						'user_id' => auth()->user()->id
					]);
				} catch (\Exception $e) {
					DB::rollBack();
				}
				
				try {
					foreach ($cart->content() as $item) {
						$detail = PosDetail::create([
							'pos_header_id' => $header->id,
							'product_id' => $item->id,
							'qty' => $item->qty,
							'price' => $item->price,
						]);

						$product = Product::where('id', '=', $item->id)->first();
						$product->update([
							'stock' => $product->stock - $item->qty
						]);
					}
				} catch (\Exception $e) {
					DB::rollBack();
				}

				DB::commit();

				$cart->destroy();

				session()->flash('success', 'Selesai !');

        $pdf = PDF::loadView('pos.print', compact('header'));
				return $pdf->stream('pos.pdf');
				// return redirect(url('/pos'));
			} else {
				session()->flash('warning', 'Keranjang Kosong !');
				return redirect()->back();
			}
		} catch (\Exception $e) {
			dd($e);
			session()->flash('error', 'Terjadi Kesalahan !');
			return redirect()->back();
		}
	}

	public function data()
	{
		$pos = PosHeader::orderBy('transaction_date', 'DESC')->get();
		return view('pos.data', compact('pos'));
	}
}
