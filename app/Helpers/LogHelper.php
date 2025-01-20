<?php

use App\Models\Log;

if (!function_exists('createLog')) {
    function createLog($action, $details = null, $before = null, $after = null)
    {
        Log::create([
            'user_id' => auth()->id() ?? 'Guest',
            'action' => $action,
            'details' => $details,
            'ip_address' => request()->ip(),
            'before' => $before ? json_encode($before) : null,
            'after' => $after ? json_encode($after) : null,
        ]);
    }
}