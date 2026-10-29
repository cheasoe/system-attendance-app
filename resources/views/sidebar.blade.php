<!-- resources/views/layouts/sidebar.blade.php -->
<aside class="sidebar p-3">
    <!-- <h4 class="mb-4 fw-bold text-primary">Admin</h4> -->
 <!-- Profile & Direct Logout Button -->
<div class="sidebar-profile-container mb-4 text-center">
    <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('តើអ្នកពិតជាចង់ចាកចេញមែនទេ?');">
        @csrf
        
        <!-- ធ្វើឱ្យប៊ូតុង ឬតំណភ្ជាប់មើលទៅដូចជា Profile ធម្មតា -->
        <button type="submit" class="profile-logout-btn border-0 bg-transparent p-0 d-flex flex-column align-items-center mx-auto text-decoration-none">
            <!-- រូប Profile -->
            <img src="{{ asset('imgs/boy.png') }}" alt="profile" class="rounded-circle profile-img mb-2">
            
            <!-- ឈ្មោះអ្នកប្រើប្រាស់ -->
            <span class="profile-name">
                {{ Auth::user()->name ?? 'Account' }}
            </span>
        </button>
    </form>
</div>



    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}" href="{{ url('dashboard') }}">
                <i class="bi bi-grid me-2"></i>
                <span data-en="Dashboard" data-km="ផ្ទាំងគ្រប់គ្រង">Dashboard</span>
            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link {{ request()->is('viewcoustomer*') ? 'active' : '' }}" href="{{ url('viewcoustomer') }}">
                <i class="bi bi-people me-2"></i>
                <span data-en="View Customer" data-km="មើលអតិថិជន">View Customer</span>
            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link {{ request()->is('list*') ? 'active' : '' }}" href="{{ url('list') }}">
                <i class="bi bi-people me-2"></i>
                <span data-en="View Customer" data-km="បញ្ជីឈ្មោះភ្ញៀវ">បញ្ជីឈ្មោះភ្ញៀវ</span>
            </a>
        </li>
        
    </ul>
</aside>
<style>
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

    /* Fixed/Sticky Sidebar */
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

    /* Main Content */
    main {
        min-width: 0; /* ការពារ Overflow លើអេក្រង់តូច */
    }
/* រចនាប័ទ្មសម្រាប់ Profile Container */
.sidebar-profile-container {
    padding: 15px 10px;
}

/* ទំហំនិងរចនារូបភាព Profile ឱ្យមូលស្អាត */
.sidebar-profile-container .profile-img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border: 2px solid #fff;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    transition: transform 0.2s ease;
}

/* រចនាប័ទ្មអត្ថបទឈ្មោះ */
.sidebar-profile-container .profile-name {
    font-size: 16px;
    font-weight: 600;
    color: #333;
}

/* បន្ថែមបែបផែន Mouse Hover ឱ្យដឹងថាអាចចុចបាន */
.profile-logout-btn:hover .profile-img {
    transform: scale(1.05);
}

.profile-logout-btn:hover .profile-name {
    color: #0d6efd; /* ប្តូរពណ៌ខៀវពេលเอา mouse ដាក់លើ (អាចប្តូរតាមចំណូលចិត្ត) */
}
</style>