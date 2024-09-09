<?php

namespace App\Http\Controllers\Notification;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

class NotificationController extends Controller
{
     /**
     * Mark a specific notification as read.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function markAsRead(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:notifications,id',
        ]);

        // Find the notification by ID
        $notification = Auth::user()->notifications()->find($request->id);

        if ($notification) {
            $notification->markAsRead();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

    /**
     * Clear all notifications for the authenticated user.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function clearAll()
    {
        $notifications = Auth::user()->unreadNotifications;


        foreach ($notifications as $notification) {
            $notification->markAsRead();
        }

        return response()->json(['success' => true]);
    }

    public function update()
    {
        DB::table('notifications')->delete();
        Artisan::call('reminders:send');
        return back();
    }
}
