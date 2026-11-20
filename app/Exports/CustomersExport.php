<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomersExport implements FromCollection, WithHeadings
{
    protected $search;
    protected $userId;

    // ទទួលតម្លៃ search និង userId ពី Controller
    public function __construct($search, $userId)
    {
        $this->search = $search;
        $this->userId = $userId;
    }

    public function collection()
    {
        $query = DB::table('attendances')
            ->select('fullname', 'money', 'symbol', 'location', 'created_at') // រើសយកតែ Column ដែលត្រូវការ Export
            ->where('user_id', $this->userId) // ច្រោះយកតែទិន្នន័យរបស់ User នោះ
            ->where('status', 1); // យកតែទិន្នន័យដែលមិនទាន់លុប

        // ប្រសិនបើមានការ Search ឱ្យវា Export តាមលទ្ធផល Search ដែរ
        if (!empty($this->search)) {
            $search = $this->search;
            $query->where(function ($q) use ($search) {
                $q->where('fullname', 'LIKE', "%{$search}%")
                  ->orWhere('location', 'LIKE', "%{$search}%")
                  ->orWhere('money', 'LIKE', "%{$search}%");
            });
        }

        return $query->orderBy('id', 'desc')->get();
    }

    // កំណត់ក្បាលតារាង (Header) ក្នុង Excel
    public function headings(): array
    {
        return [
            'Full Name',
            'Money',
            'Currency',
            'Location',
            'Date',
        ];
    }
}