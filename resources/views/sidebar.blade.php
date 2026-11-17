<!-- resources/views/layouts/sidebar.blade.php -->
<aside class="sidebar p-3">
    <!-- Profile & Direct Logout Button -->
    <div class="sidebar-profile-container mb-4 text-center">
        <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('តើអ្នកពិតជាចង់ចាកចេញមែនទេ?');">
            @csrf
            <button type="submit" class="profile-logout-btn border-0 bg-transparent p-0 d-flex flex-column align-items-center mx-auto text-decoration-none">
                <img src="{{ asset('imgs/boy.png') }}" alt="profile" class="rounded-circle profile-img mb-2">
                <span class="profile-name">
                    {{ Auth::user()->name ?? 'Account' }}
                </span>
            </button>
        </form>
    </div>

    <ul class="nav flex-column">

        {{-- 🛑 បើសិទ្ធិជា ADMIN --}}
       @if(auth()->check() && (auth()->user()->role == 1 ))
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}" href="{{ url('dashboard') }}">
                    <i class="bi bi-speedometer2 me-2"></i>
                    <span data-en="Admin Dashboard" data-km="ផ្ទាំងគ្រប់គ្រងរដ្ឋបាល">Admin Dashboard</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->is('viewcoustomer*') ? 'active' : '' }}" href="{{ url('viewcoustomer') }}">
                    <i class="bi bi-people me-2"></i>
                    <span data-en="View Customer" data-km="មើលអតិថិជន">ភ្ញៀវដែលចូលរួម</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->is('list*') ? 'active' : '' }}" href="{{ url('list') }}">
                    <i class="bi bi-journal-text me-2"></i>
                    <span data-en="Event List" data-km="បញ្ជីឈ្មោះកម្មវិធី">បញ្ជីឈ្មោះកម្មវិធី</span>
                </a>
            </li>

            {{--Admin --}}
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                    <i class="bi bi-people-fill me-2"></i>
                    <span data-en="Manage Users" data-km="គ្រប់គ្រងអ្នកប្រើប្រាស់">គ្រប់គ្រងអ្នកប្រើប្រាស់</span>
                </a>
            </li>
        
        {{--STAFF --}}
        @else
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}" href="{{ url('dashboard') }}">
                    <i class="bi bi-grid me-2"></i>
                    <span data-en="Dashboard" data-km="ផ្ទាំងគ្រប់គ្រង">Dashboard</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->is('viewcoustomer*') ? 'active' : '' }}" href="{{ url('viewcoustomer') }}">
                    <i class="bi bi-people me-2"></i>
                    <span data-en="View Customer" data-km="មើលអតិថិជន">ភ្ញៀវដែលចូលរួម</span>
                </a>
            </li>
        @endif

    </ul>
</aside>

<style>
    /* រក្សាទុក Style របស់អ្នកដដែល */
    :root {
        --primary: #0627B6;
        --bg: #f5f7fb;
        --border: #e5e7eb;
    }

    body {
        background: #ffff;
        font-family: 'Noto Sans Khmer', 'Segoe UI', sans-serif;
        margin: 0;
    }

    .sidebar {
        width: 240px;
        height: 100vh;
        position: sticky;
        top: 0;
        background: #dfdfdf85;
        border-right: 1px solid var(--border);
        overflow-y: auto;
        flex-shrink: 0;
    }

    .sidebar .nav-link {
        color: #010101;
        border-radius: 8px;
        padding: 10px 12px;
    }

    .sidebar .nav-link:hover,
    .sidebar .nav-link.active {
        background: var(--primary);
        color: #fff;
    }

    main {
        min-width: 0;
    }

    .sidebar-profile-container {
        padding: 15px 10px;
    }

    .sidebar-profile-container .profile-img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border: 2px solid #fff;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        transition: transform 0.2s ease;
    }

    .sidebar-profile-container .profile-name {
        font-size: 16px;
        font-weight: 600;
        color: #333;
    }

    .profile-logout-btn:hover .profile-img {
        transform: scale(1.05);
    }

    .profile-logout-btn:hover .profile-name {
        color: #0d6efd;
    }
</style>