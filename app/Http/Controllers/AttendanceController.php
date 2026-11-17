<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CustomersExport;
use App\Models\Attendance;
class AttendanceController extends Controller
{
    
   public function Dashboard()
    {
        $userId = Auth::id();

        $totalUSD = Attendance::where('user_id', $userId)
                              ->where('currency', 1)
                              ->sum('money');

        // បូកសរុបទឹកប្រាក់ជា រៀល (currency = 2) សម្រាប់តែ User ដែលកំពុង Login
        $totalKHR = Attendance::where('user_id', $userId)
                              ->where('currency', 2)
                              ->sum('money');

        return view('dashboard', compact('totalUSD', 'totalKHR'));
    }

public function ViewCoustomer(Request $request) {
   
    $userId = Auth::id(); 

    $query = DB::table('attendances')
    ->where('user_id', $userId)
    ->where('status', 1);

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('fullname', 'LIKE', "%{$search}%")
                  ->orWhere('location', 'LIKE', "%{$search}%")
                  ->orWhere('money', 'LIKE', "%{$search}%");
            });
        }

        $sql = $query->orderBy('id', 'desc')->get();

        return view('viewcoustomer', ['getquery' => $sql]);
    }

    public function ExportCustomers(Request $request)
    {
        return Excel::download(
            new CustomersExport($request->search),
            'customers.xlsx'
        );
    }

    // Submit Add Customer ពី Modal
    public function AddcoustomerSubmit(Request $request){
        $insert = DB::table('attendances')->insert([
            'user_id' => Auth::id(),
            'fullname'   => $request->fullname,
            'money'      => $request->money,
            'symbol'     => $request->symbol,
            'location'   => $request->location,
            'status'     => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        if($insert){
            return redirect()->route('viewcoustomer')->with('success', 'Customer added successfully.');
            // return redirect()->back()->with('success', 'រក្សាទុកជោគជ័យ');
        } else {
            return redirect()->route('viewcoustomer')->with('error', 'Failed to add customer.');
        }
    }

    // Submit Update Customer ពី Modal
    public function UdateCoustomerSubmit(Request $request){
        $update = DB::table('attendances')->where('id', $request->id)->update([
            'user_id' => Auth::id(),
            'fullname'   => $request->fullname,
            'money'      => $request->money,
            'symbol'     => $request->symbol,
            'location'   => $request->location,
            'status'     => 1,
            'updated_at' => now() 
        ]);

        if($update){
            return redirect()->route('viewcoustomer')->with('success', 'Customer updated successfully.');
        } else {
            
            return redirect()->route('viewcoustomer')->with('info', 'No changes were made.');
        }
    }

    // Delete Customer
    public function DeleteCustomer($id_dele){

    $delete = DB::table('attendances')
        ->where('id', $id_dele)
        ->where('user_id', Auth::id())
        ->update([
            'status' => 0,
            'updated_at' => now()
        ]);

        if($delete){
            return redirect()->route('viewcoustomer')->with('success', 'លុបទិន្នន័យបានជោគជ័យ...!');
        } else {
            return redirect()->route('viewcoustomer')->with('error', 'មិនអាចលុបទិន្នន័យនេះបានទេ (អ្នកគ្មានសិទ្ធិ ឬរកមិនឃើញ)។');
        }
    }
}
    


