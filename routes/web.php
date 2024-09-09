<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sales\SalesController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Invoice\InvoiceController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Section\SectionsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Notification\NotificationController;
use App\Http\Controllers\WhatsAppController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::controller(AuthenticatedSessionController::class)->group(function(){
    Route::get('/login' , 'create')->middleware('guest')->name('login');
    Route::post('/login' , 'store')->middleware('guest')->name('login.store');
    Route::post('/logout' , 'destroy')->middleware('auth')->name('logout');
});


Route::middleware('auth')->group(function(){
    Route::get('/', [DashboardController::class ,'__invoke'])->name('dashboard');

    Route::resource('/section' ,SectionsController::class);

    Route::resource('/products', ProductController::class)->except(['index' , 'create']);
    Route::get('/product/{id}', [ProductController::class, 'index'])->name('products.index');
    Route::get('/product/create/{id}', [ProductController::class, 'create'])->name('products.create');
    Route::get('/products-search', [ProductController::class, 'search'])->name('product.search');

    Route::resource('/invoice', InvoiceController::class);
    Route::get('/get-products', [InvoiceController::class, 'getProductData'])->name('invoice.get.product');
    Route::get('/get-section', [InvoiceController::class, 'getSection'])->name('invoice.get.section');
    Route::put('/invoice/{id}/restore', [InvoiceController::class, 'restore'])->name('invoice.restore');
    Route::get('/invoice/{id}/print', [InvoiceController::class, 'print'])->name('invoice.print');
    Route::post('/invoice/{id}/pay', [InvoiceController::class, 'pay'])->name('invoice.pay');
    Route::get('/invoice/{id}/clients', [InvoiceController::class, 'invoiceClients'])->name('invoice.clients');
    Route::get('/invoices/search', [InvoiceController::class, 'search'])->name('invoice.search');
    Route::get('/invoices/pending', [InvoiceController::class, 'pending'])->name('invoice.pending');
    Route::get('/invoices/inactive', [InvoiceController::class, 'inactive'])->name('invoice.inactive');

    Route::get('/order/create', [InvoiceController::class, 'createOrder'])->name('order.create');
    Route::put('/order/update', [InvoiceController::class, 'updateOrder'])->name('order.update');
    Route::delete('/order/delete', [InvoiceController::class, 'destroyOrder'])->name('order.delete');

    Route::get('/sales', [SalesController::class, 'index'])->name('sales.index');
    Route::get('/sales/pending', [SalesController::class, 'pending'])->name('sales.pending');
    Route::get('/sales/inactive', [SalesController::class, 'inactive'])->name('sales.inactive');
    Route::get('/sales/orders', [SalesController::class, 'showOrders'])->name('sales.orders');



    Route::resource('/clients', ClientController::class);
    Route::post('/notifications/markAsRead', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
    Route::get('/notifications/update', [NotificationController::class, 'update'])->name('notifications.update');
    Route::post('/notifications/clearAll', [NotificationController::class, 'clearAll'])->name('notifications.clearAll');



    Route::get('/send-whatsapp', [WhatsAppController::class, 'sendWhatsAppMessage']);
});




// Route::get('/test' , function(){

//         $start = Carbon::parse('2024-08-02');
//         $end = Carbon::parse("2024-08-06");

//         $ids = Product::where('section_id', 3)
//         ->leftJoin('orders', 'orders.product_id', '=', 'products.id')
//         ->leftJoin('invoices', 'invoices.id', '=', 'orders.invoice_id')
//         ->where(function ($query) use ($start, $end) {
//             $query->whereBetween('date_of_receipt', [$start, $end])
//                 ->orWhereBetween('return_date', [$start, $end])
//                 ->orWhere(function ($query) use ($start, $end) {
//                     $query->where('date_of_receipt', '<', $start)
//                             ->where('return_date', '>', $end);
//                 });
//         })
//         ->pluck('products.id');

//         $products = Product::whereNotIn('id' , $ids)->get();
//         return $products;
// });

// ->where('products.quantity' , '>' , '0')

// ['id', 'model', 'color', 'size', 'section_id' ,'quantity']
