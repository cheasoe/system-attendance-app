<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Event; // ឬ Model ដែលអ្នកប្រើប្រាស់សម្រាប់ទិន្នន័យកម្មវិធី
use App\Models\User; // កុំភ្លេចហៅ Model User មកប្រើប្រាស់ខាងលើ Controller


class UserController extends Controller
{
    // 1. បង្ហាញទំព័រ Login
    public function Login()
    {
        return view('login');
    }

    // 2. ដំណើរការ Login
    public function LoginSubmit(Request $request)
    {
        $Username = $request->name;
        $Password = $request->password;
        
        $user = Auth::attempt(['name' => $Username, 'password' => $Password]);
        
        if ($user) {
            return redirect('/dashboard');
        } else {
            return redirect('/');
        }
    }
   public function Logout(Request $request){
    Auth::logout();
    
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login')->with('success', 'logout successfully...!');
}

    public function Register(){
        return view('register');
    }
    public function RegisterSubmit(Request $request)
{
    // ១. ផ្ទៀងផ្ទាត់ទិន្នន័យ (Validation)
    $request->validate([
        'username' => 'required|string|max:255',
        'email'    => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:3',
    ]);

    // ២. រក្សាទុកទិន្នន័យចូលក្នុង Database
    User::create([
        'name'     => $request->username, // ប្តូរទៅតាម Column ក្នុង Database របស់អ្នក (ជួនកาล 'name' ឬ 'username')
        'email'    => $request->email,
        'password' => Hash::make($request->password), // encrypt password ឱ្យមានសុវត្ថិភាព
    ]);

    // ៣. បញ្ជូនទៅកាន់ទំព័រ Login ឬ ទំព័រដើម ព្រមទាំងផ្ញើសារជោគជ័យ
    return redirect()->route('login')->with('success', 'Registration successful! Please login.');
}


    // 3. បង្ហាញបញ្ជី និង Filter តាមឈ្មោះម្ចាស់កម្មវិធី + គណនាតួលេខសរុប
    public function List(Request $request)
    {
        $query = Event::query();

        // Filter តាម ID
        if ($request->filled('id')) {
            $query->where('id', $request->id);
        }

        // Filter តាមឈ្មោះម្ចាស់ដើមកម្មវិធី (Host Name)
        if ($request->filled('host_name')) {
            $query->where('host_name', 'like', '%' . $request->host_name . '%');
        }

        // Filter តាម Status (បើមាន)
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // --- គណនាតួលេខសរុប (Summary / Totals តាមទិន្នន័យ Filter) ---
        $totalPrograms = (clone $query)->count();                 // ចំនួនកម្មវិធីសរុប
        $totalGuests   = (clone $query)->sum('guest_count');      // ចំនួនភ្ញៀវចូលរួមសរុប
        $totalAmount   = (clone $query)->sum('total_amount');     // ថវិកាសរុប

        // ទាញយកទិន្នន័យ Pagination (10 ទិន្នន័យក្នុងមួយទំព័រ)
        $getquery = $query->latest()->paginate(10);

        return view('list', compact(
            'getquery', 
            'totalPrograms', 
            'totalGuests', 
            'totalAmount'
        ));
    }
}
?>