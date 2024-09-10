<?php

namespace App\Http\Controllers;


class WhatsAppController extends Controller
{
    public function sendWhatsAppMessage()
    {
        // $twilioSid = env('TWILIO_SID');
        // $twilioToken = env('TWILIO_AUTH_TOKEN');
        // $twilioWhatsAppNumber = env('TWILIO_WHATSAPP_NUMBER');
        // $recipientNumber = 'whatsapp:+12345678910';
        // $message = "test";

        // $twilio = new Client($twilioSid, $twilioToken);

        // try {
        //     $twilio->messages->create(
        //         $recipientNumber,
        //         [
        //             "from" => $twilioWhatsAppNumber,
        //             "body" => $message,
        //         ]
        //     );

        //     return response()->json(['message' => 'WhatsApp message sent successfully']);
        // } catch (\Exception $e) {
        //     return response()->json(['error' => $e->getMessage()], 500);
        // }
    }
}
