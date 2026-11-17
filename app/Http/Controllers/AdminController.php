<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    // ១. បង្ហាញបញ្ជី User ទាំងអស់ ដើម្បីឱ្យ Admin ងាយស្រួលគ្រប់គ្រង
    public function index()
    {
        $users = User::all(); // ទាញយក User ទាំងអស់ពី Database
        return view('users', compact('users'));
    }

    // ២. មុខងារសម្រាប់ធ្វើបច្ចុប្បន្នភាពសិទ្ធិ (Role) របស់ User ម្នាក់ៗ
    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:admin,staff', // ធានាថាជ្រើសរើសបានតែ admin ឬ staff ប៉ុណ្ណោះ
        ]);

        $user = User::findOrFail($id);
        
        // ការពារកុំឱ្យ Admin เผลอลบសិទ្ធិខ្លួនឯង (Optional ប៉ុន្តែសំខាន់)
        if ($user->id === auth()->id() && $request->role !== 'admin') {
            return redirect()->back()->with('error', 'អ្នកមិនអាចដកសិទ្ធិ Admin របស់ខ្លួនឯងបានទេ!');
        }

        $user->role = $request->role;
        $user->save();

        return redirect()->back()->with('success', "បានកែប្រែសិទ្ធិរបស់ {$user->name} ទៅជា {$request->role} ដោយជោគជ័យ!");
    }
}