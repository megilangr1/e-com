<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Cart;
use Session;

class BerandaController extends Controller
{
    public function index()
    {
				$products = Product::orderBy('id','desc')->where('type', '=', 'Barang')->where('status','publish')->get();
				$category = Category::orderBy('name', 'ASC')->get();
        return view('front.home2', compact('products', 'category'));
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        Cart::add(
            [
                'id'    =>$product->id,
                'name'  =>$product->name,
                'qty'   =>1,
								'price' =>$product->price,
								'options' =>['image' => $product->image],
            ]);
        Session::flash('status','Product berhasil dimasukkan ke keranjang');
        return redirect()->back();
    }

    public function category($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $products = $category->products()->where('status','publish')->orderBy('updated_at','desc')->paginate(18);
        return view('front.product_category', compact('products'));
    }

    public function detail($id)
    {
				$category = Category::orderBy('name', 'ASC')->get();
        $product = Product::findOrFail($id);
        return view('front.detail_product2', compact('category', 'product'));
    }

		public function listProduct(Request $request)
		{
			$req = count($request->all());
			if ($req > 0) {
				$products = Product::orderBy('id', 'desc')->where('type', '=', 'Barang');
				if ($request->has('category')) {
					$this->request = $request;
					if (is_array($request->category)) {
						$products = $products->whereHas('category', function($q) {
							$q->whereIn('slug', $this->request->category);
						});
					} else {
						$products = $products->whereHas('category', function($q) {
							$q->where('slug', $this->request->category);
						});
					}
				}

				if ($request->has('harga_awal')) {
					if ($request->has('harga_akhir')) {
						if ($request->harga_awal != null && $request->harga_akhir != null) {
							$products = $products->whereBetween('price', [$request->harga_awal, $request->harga_akhir]);
						}
					}
				}

				if ($request->has('search')) {
					$products = $products->where('name', 'like', '%'.$request->search.'%');
				}

				$products = $products->get();
			} else {
				$products = Product::orderBy('id','desc')->where('type', '=', 'Barang')->where('status','publish')->get();
			}

			$category = Category::orderBy('name', 'ASC')->get();
			return view('front.product_list', compact('products', 'category'));
		}

		public function about()
		{
			$category = Category::orderBy('name', 'ASC')->get();
			return view('front.about', compact('category'));
		}
}
