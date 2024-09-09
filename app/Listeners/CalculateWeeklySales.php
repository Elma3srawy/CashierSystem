<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Events\InvoiceProcessed;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CalculateWeeklySales
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(InvoiceProcessed $event):void
    {
        Carbon::setLocale('ar');
        $date = Carbon::parse($event->invoice->return_date ?? $event->invoice->created_at);

        $startWeek = $date->startOfWeek(Carbon::SATURDAY)->format('Y-m-d');
        $endWeek = $date->endOfWeek(Carbon::FRIDAY)->format('Y-m-d');

        $weekOfMonth = $date->weekOfMonth;


        $yearNumber = $date->format('Y');
        $monthName = $date->translatedFormat('F');



        $resultsQuery = DB::table('invoices')
        ->leftJoin('orders', 'orders.invoice_id', '=', 'invoices.id')
        ->selectRaw('SUM(orders.price) AS total_price')
        ->selectRaw('SUM(orders.payment) AS total_payment')
        ->selectRaw('GROUP_CONCAT(orders.id) AS order_ids');

        if($event->invoice->status == 'pending'){
            $resultsQuery->where('status' , $event->invoice->status)->whereBetween('invoices.return_date', [$startWeek, $endWeek]);
        }else{
            $resultsQuery->where('status' , $event->invoice->status)->whereBetween(DB::raw("DATE_FORMAT(invoices.created_at, '%Y-%m-%d')"), [$startWeek, $endWeek]);
        }
        $results = $resultsQuery->first();

        DB::table('sales')->updateOrInsert(
            [
                'number_of_week' => $weekOfMonth,
                'number_of_year' => $yearNumber,
                'month_name'     => $monthName,
                'status'        => $event->invoice->status,
            ],
            [
                'total_price'  => $results->total_price,
                'payments'     => $results->total_payment,
                'order_ids'    => $results->order_ids,
            ]
        );
    }
}
