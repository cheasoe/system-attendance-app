<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    // ប្រើប្រាស់ ...$roles ដើម្បីអាចรับសិទ្ធិច្រើនក្នុងពេលតែមួយ (ឧ. role:1,2)
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // ១. ពិនិត្យមើលថាតើបាន Login ហើយឬยัง
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        // ២. ຖ້າ User ជា Admin (role == 1) គឺអនុញ្ញាតឱ្យចូលបានគ្រប់ទំព័រជានិច្ច (Super User)
        if ($user->role == 1) {
            return $next($request);
        }

        // ៣. ពិនិត្យមើលថាតើសិទ្ធិរបស់ User ស្ថិតក្នុងបញ្ជី Role ដែល Route នោះអនុញ្ញាតដែរឬទេ
        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        // ៤. បើគ្មានសិទ្ធិ បង្ហាញ Error 403 (Unauthorized)
        abort(403, 'Unauthorized action. You do not have permission to access this page.');
    }
}