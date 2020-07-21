<?php

namespace App\Http\Controllers;

use App\Exports\OrderExport;
use App\Exports\OrderExportPaid;
use App\Order;
use Illuminate\Http\Request;
use Auth;
use App\Order_Product;
use PDF;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
				$orders = Order::orderBy('id','desc')->get();
        return view('order.index2', compact('orders'));
    }

    public function detail($id)
    {
			$order = Order::where('id', $id)->first();
			$details = Order_Product::where('order_id', $id)->get();
			return view('order.detail2', compact('details', 'order'));
    }

    public function exportPDFAll()
    {
        $orders = Order::all();
        $pdf = PDF::loadView('order.OrderAllPdf', compact('orders'));
        return $pdf->stream('orders.pdf');
    }

    public function exportPDF()
    {
        $orders = Order::where('status','dibayar')->get();
        $pdf = PDF::loadView('order.OrderAllPdf', compact('orders'));
        return $pdf->stream('orders_lunas.pdf');
    }

    public function exportExcel()
    {
        return (new OrderExport())->download('orders.xlsx');
    }

    public function exportExcelPaid()
    {
        return (new OrderExportPaid())->download('orders_paid.xlsx');
    }
}
