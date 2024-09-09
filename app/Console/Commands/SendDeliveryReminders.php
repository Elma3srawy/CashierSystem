<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Invoice;
use Illuminate\Console\Command;
use App\Notifications\DeliveryReminder;


class SendDeliveryReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminders:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminders for deliveries one day before the delivery date';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tomorrow = Carbon::tomorrow('Africa/Cairo')->toDateString();
        $user = User::first();
        $invoices = Invoice::leftJoin('clients' , 'clients.id' , 'invoices.client_id')->whereDate('date_of_receipt', $tomorrow)->select('clients.name' , 'clients.id')->get();
        if(count($invoices) > 0){
            $user->notify(new DeliveryReminder($invoices, $tomorrow));
        }
        $this->info('Reminders sent successfully.' .$tomorrow);
    }

}
