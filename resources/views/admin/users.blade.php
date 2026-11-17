<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Users & Roles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>គ្រប់គ្រងសិទ្ធិអ្នកប្រើប្រាស់ (User Roles Management)</h2>
           <a href="/admin/dashboard" class="btn btn-secondary">ត្រឡប់ក្រោយ</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>ឈ្មោះ (Name)</th>
                            <th>អ៊ីមែល (Email)</th>
                            <th>សិទ្ធិបច្ចុប្បន្ន (Current Role)</th>
                            <th>ប្តូរសិទ្ធិ (Action)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $u)
                        <tr>
                            <td>{{ $u->id }}</td>
                            <td class="fw-bold">{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>
                                @if($u->role === 'admin')
                                    <span class="badge bg-danger">Admin</span>
                                @else
                                    <span class="badge bg-primary">Staff</span>
                                @endif
                            </td>
                            <td>
                                <!-- Form សម្រាប់ប្តូរ Role តាមរយៈ Dropdown -->
                                <form action="{{ route('admin.users.updateRole', $u->id) }}" method="POST" class="d-flex gap-2">
                                    @csrf
                                    @method('PUT')
                                    
                                    <select name="role" class="form-select form-select-sm w-auto">
                                        <option value="staff" {{ $u->role === 'staff' ? 'selected' : '' }}>Staff</option>
                                        <option value="admin" {{ $u->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                    </select>

                                    <button type="submit" class="btn btn-sm btn-success">កែប្រែ</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>