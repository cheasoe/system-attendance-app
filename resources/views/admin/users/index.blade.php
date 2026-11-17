<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="d-flex">
    <!-- Sidebar -->
    @include('sidebar')

    <!-- Main Content -->
    <main class="flex-fill p-4">
        <div class="container-fluid py-3">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>គ្រប់គ្រងអ្នកប្រើប្រាស់ (User Management)</h2>
                <!-- ប៊ូតុងហៅ Modal បន្ថែម User -->
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                    <i class="bi bi-person-plus-fill me-1"></i> បន្ថែម User ថ្មី
                </button>
            </div>

            <!-- បង្ហាញសារជោគជ័យ ឬកំហុស -->
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <!-- តារាងបង្ហាញបញ្ជី User -->
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>ឈ្មោះ (Name)</th>
                                <th>អ៊ីមែល (Email)</th>
                                <th>សិទ្ធិ (Role)</th>
                                <th class="text-end">សកម្មភាព (Actions)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $u)
                            <tr>
                                <td>{{ $u->id }}</td>
                                <td class="fw-bold">{{ $u->name }}</td>
                                <td>{{ $u->email }}</td>
                                <td>
                                    @if($u->role == 1)
                                        <span class="badge bg-danger">Admin (1)</span>
                                    @else
                                        <span class="badge bg-secondary">Staff (2)</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <!-- ប៊ូតុង Edit -->
                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $u->id }}">
                                        <i class="bi bi-pencil-square"></i> កែប្រែ
                                    </button>

                                    <!-- ប៊ូតុង Delete -->
                                    <form action="{{ route('admin.users.destroy', $u->id) }}" method="POST" class="d-inline" onsubmit="return confirm('តើអ្នកពិតជាចង់លុប User នេះមែនទេ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i> លុប
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal កែប្រែ User (Edit Modal) -->
                            <div class="modal fade" id="editUserModal{{ $u->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <form action="{{ route('admin.users.update', $u->id) }}" method="POST" class="modal-content">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title">កែប្រែព័ត៌មាន User: {{ $u->name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body text-start">
                                            <div class="mb-3">
                                                <label class="form-label">ឈ្មោះ (Name)</label>
                                                <input type="text" name="name" value="{{ $u->name }}" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">អ៊ីមែល (Email)</label>
                                                <input type="email" name="email" value="{{ $u->email }}" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">ពាក្យសម្ងាត់ថ្មី (ទុកទទេបើមិនចង់ដូរ)</label>
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">សិទ្ធិ (Role)</label>
                                                <select name="role" class="form-select" required>
                                                    <option value="1" {{ $u->role == 1 ? 'selected' : '' }}>Admin (1)</option>
                                                    <option value="2" {{ $u->role == 2 ? 'selected' : '' }}>Staff (2)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">បោះបង់</button>
                                            <button type="submit" class="btn btn-primary">រក្សាទុកការកែប្រែ</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Modal បន្ថែម User ថ្មី (Add User Modal) -->
<div class="modal fade" id="addUserModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('admin.users.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">បន្ថែម User ថ្មី</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 text-start">
                    <label class="form-label">ឈ្មោះ (Name)</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3 text-start">
                    <label class="form-label">អ៊ីមែល (Email)</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3 text-start">
                    <label class="form-label">ពាក្យសម្ងាត់ (Password)</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3 text-start">
                    <label class="form-label">សិទ្ធិ (Role)</label>
                    <select name="role" class="form-select" required>
                        <option value="2">Staff (2)</option>
                        <option value="1">Admin (1)</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">បោះបង់</button>
                <button type="submit" class="btn btn-primary">រក្សាទុក</button>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>