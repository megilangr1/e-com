<?php

namespace App\Http\Controllers;

use App\Confirm;
use App\Order;
use App\Product;
use Auth;
use App\Order_Product;
use Illuminate\Http\Request;
use Session;

class ConfirmAdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
        $title = 'List Konfirmasi Pembayaran Customer';
        $confirms = Confirm::where('status_order','menunggu verifikasi')->orderBy('id','desc')->get();
        return view('confirm.index2', compact('confirms', 'title'));
    }

    public function terima($order_id)
    {
        $order = Order::where('id', $order_id)->first();
        $order->status = 'dibayar';
        $order->save();

        $confirm = Confirm::where('order_id',$order_id)->first();
        $confirm->status_order = 'dibayar';
        $confirm->save();

//        $product = Order_Product::findOrFail($order_id);
        $order_product = Order_Product::where('order_id', $order_id)->get();

        foreach($order_product as $r) {
            $product = Product::findOrFail($r->product_id);
            $product->stock -= $r->qty;
            $product->update();
        }

        Session::flash('status','Berhasil di konfirmasi dengan status di terima');
        return redirect()->route('confirmAdmin');
    }

    public function tolak($order_id)
    {
        $order = Order::where('id', $order_id)->first();
        $order->status = 'ditolak';
        $order->save();

				$confirm = Confirm::where('order_id',$order_id)->first();
				$confirm->update([
					'status_order' => 'ditolak'
				]);

        Session::flash('status','Berhasil di konfirmasi dengan status di tolak');
        return redirect()->route('confirmAdmin');
    }

//    public function detail($order_id)
//    {
//        $hasilArray = array('product'=>array());
//        $order = Order::where('id',$order_id)->first();
//        $hasilArray['receiver'] = $order->receiver;
//        $hasilArray['address'] = $order->address;
//
//        $products = Order_Product::where('order_id',$order_id)->get();
//
//        foreach ($products as $key => $product){
//            $productArray = array();
//            $productArray['name']   = $product->product['name'];
//            $productArray['qty']    = $product->qty;
//            $productArray['subtotal'] = number_format($product->subtotal,0);
//
//            array_push($hasilArray['product'], $productArray);
//        }
//
//        $hasil = $hasilArray;
//        return view('confirm.detail', compact('hasil'));
//    }

    public function detail($id)
    {
			
			$order = Order::where('id', $id)->first();
			$details = Order_Product::where('order_id', $id)->get();
			return view('confirm.detail2', compact('details', 'order'));
    }
}
