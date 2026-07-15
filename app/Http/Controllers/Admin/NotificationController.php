<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminNotification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /** Return recent notifications as JSON (for the dropdown). */
    public function index(): JsonResponse
    {
        $notifications = AdminNotification::with('relatedUser')
            ->latest()
            ->take(20)
            ->get();

        $unreadCount = AdminNotification::unread()->count();

        return response()->json([
            'notifications' => $notifications,
            'unread_count'  => $unreadCount,
        ]);
    }

    /** Mark a single notification as read. */
    public function markAsRead(AdminNotification $notification): JsonResponse
    {
        $notification->update(['is_read' => true]);

        return response()->json(['success' => true]);
    }

    /** Mark all notifications as read. */
    public function markAllAsRead(): JsonResponse
    {
        AdminNotification::unread()->update(['is_read' => true]);

        return response()->json(['success' => true]);
    }
}
