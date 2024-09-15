<?php

namespace App\Http\Controllers\Sales;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SalesController extends Controller
{
    public function index()
    {

        $sales = DB::table('sales')->paginate(PAGINATE);
        return view('sales.index', ['sales' => $sales]);
    }
    public function pending()
    {
        $sales = DB::table('sales')->where('status' , 'pending')->paginate(PAGINATE);
        return view('sales.pending', ['sales' => $sales]);
    }

    public function inactive()
    {
        $sales = DB::table('sales')->where('status' , 'inactive')->paginate(PAGINATE);
        return view('sales.inactive', ['sales' => $sales]);
    }


    public function showOrders(Request $request)
    {
        $request->validate([
            'order_ids' => 'required|string',
        ]);

        $ids = explode(',', $request->order_ids);

        $orders = Order::whereIn('id' , $ids)
        ->with(['invoice' => function($query) {
            $query->withTrashed()->select('id', 'client_id');
        }, 'product', 'addition'])
        ->select('id' , 'invoice_id','product_id' , 'addition_id','price' , 'payment')
        ->get();

        return view('sales.show' , ['orders' => $orders]);

    }

}
