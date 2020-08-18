<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;
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
			if (!auth()->check()) {
				return redirect(route('login'));
			}

        $product = Product::find($id);
        Cart::add(
            [
                'id'    =>$product->id,
                'name'  =>$product->name,
                'qty'   =>1,
								'price' =>$product->price,
								'options' =>['image' => $product->image, 'weight' => $product->weight],
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

		public function changePassword()
		{
			if (auth()->check()) {
				$user = auth()->user();
				$category = Category::orderBy('name', 'ASC')->get();
				return view('front.change_password', compact('user', 'category'));
			} else {
				return redirect(route('login'));
			}
		}

		public function updatePassword(Request $request)
		{
			if (auth()->check()) {
				$user = auth()->user();
				$this->validate($request ,[
					'old_password' => 'required|string',
					'password' => 'required|confirmed|string|min:8'
				]);

				$cek = Auth::attempt(['email' => $user->email, 'password' => $request->old_password]);
				if ($cek) {
					try {
						$user = User::findOrFail(auth()->user()->id);
						$user->update([
							'password' => bcrypt($request->password)
						]);
						session()->flash('status', 'Password Berhasil di-Ubah !');
						return redirect('/change-password');
					} catch (\Exception $th) {
						session()->flash('old-password', 'Terjadi Kesalahan ! Coba Lagi Nanti !');
						return redirect()->back();
					}
				} else {
					session()->flash('old_password', 'Password Lama Anda Salah !');
					return redirect()->back();
				}
			} else {
				return redirect(route('login'));
			}
		}
}
