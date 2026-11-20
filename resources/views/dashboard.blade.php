<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Fonts: Plus Jakarta Sans (EN) & Kantumruy Pro (KM) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">

    <style>
        :root {
            --bg-body: #f4f6fb;
            --card-bg: rgba(255, 255, 255, 0.92);
            --text-main: #0f172a;
            --text-muted: #64748b;
            --border-color: rgba(226, 232, 240, 0.8);
            --primary-accent: #6366f1;
            --secondary-accent: #ec4899;
            --orange-accent: #f97316;
            --emerald-accent: #10b981;
        }

        body {
            background-color: var(--bg-body);
            /* Subtle Modern Mesh Gradient Background */
            background-image: 
                radial-gradient(at 0% 0%, rgba(99, 102, 241, 0.12) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(236, 72, 153, 0.10) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(249, 115, 22, 0.08) 0px, transparent 50%);
            background-attachment: fixed;
            font-family: 'Plus Jakarta Sans', 'Kantumruy Pro', sans-serif;
            color: var(--text-main);
            -webkit-font-smoothing: antialiased;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            border-right: 1px solid var(--border-color);
        }

        .sidebar .nav-link {
            color: var(--text-muted);
            font-weight: 500;
            border-radius: 12px;
            padding: 10px 14px;
            transition: all 0.25s ease;
        }

        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.12), rgba(168, 85, 247, 0.12));
            color: var(--primary-accent);
            font-weight: 600;
        }

        /* Header Gradient Title */
        .page-title {
            background: linear-gradient(135deg, #1e1b4b 0%, #4f46e5 50%, #ec4899 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.02em;
        }

        /* Modern Vibrant Stat Cards */
        .stat-card {
            background: var(--card-bg);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.06);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            opacity: 0.85;
            transition: height 0.3s ease;
        }

        .card-usd::before {
            background: linear-gradient(90deg, #6366f1, #a855f7, #ec4899);
        }

        .card-khr::before {
            background: linear-gradient(90deg, #f59e0b, #f97316, #ef4444);
        }

        .card-customers::before {
            background: linear-gradient(90deg, #06b6d4, #3b82f6);
        }

        .card-growth::before {
            background: linear-gradient(90deg, #10b981, #14b8a6);
        }

        .stat-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 35px -10px rgba(99, 102, 241, 0.16);
        }

        .stat-card:hover::before {
            height: 6px;
        }

        /* Gradient Icon Boxes with Glow */
        .icon-box {
            width: 54px;
            height: 54px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
            flex-shrink: 0;
            color: #ffffff;
        }

        .icon-gradient-primary {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            box-shadow: 0 8px 18px -4px rgba(99, 102, 241, 0.45);
        }

        .icon-gradient-warning {
            background: linear-gradient(135deg, #f59e0b 0%, #f97316 100%);
            box-shadow: 0 8px 18px -4px rgba(249, 115, 22, 0.45);
        }

        .icon-gradient-info {
            background: linear-gradient(135deg, #06b6d4 0%, #3b82f6 100%);
            box-shadow: 0 8px 18px -4px rgba(59, 130, 246, 0.45);
        }

        .icon-gradient-success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            box-shadow: 0 8px 18px -4px rgba(16, 185, 129, 0.45);
        }

        /* Soft Avatar Badges */
        .avatar-primary { background: linear-gradient(135deg, #e0e7ff, #ede9fe); color: #4f46e5; }
        .avatar-info    { background: linear-gradient(135deg, #cffafe, #dbeafe); color: #0284c7; }
        .avatar-success { background: linear-gradient(135deg, #d1fae5, #dcfce7); color: #059669; }
        .avatar-danger  { background: linear-gradient(135deg, #ffe4e6, #fce7f3); color: #e11d48; }

        .stat-label {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: capitalize;
        }

        .stat-value {
            font-size: 1.65rem;
            font-weight: 800;
            color: var(--text-main);
            letter-spacing: -0.025em;
        }

        .trend-badge {
            font-size: 0.75rem;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            gap: 2px;
        }

        /* Language Dropdown Button */
        .btn-lang {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(8px);
            border: 1px solid var(--border-color);
            color: var(--text-main);
            font-weight: 600;
            font-size: 0.875rem;
            padding: 9px 18px;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(15, 23, 42, 0.04);
            transition: all 0.2s ease;
        }

        .btn-lang:hover {
            background: #ffffff;
            border-color: var(--primary-accent);
            transform: translateY(-1px);
        }

        /* Content Panels (Chart & Table) */
        .dashboard-panel {
            background: var(--card-bg);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.06);
            padding: 26px;
        }

        .avatar-initials {
            width: 42px;
            height: 42px;
            border-radius: 14px;
            font-weight: 700;
            font-size: 0.875rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .profile-row {
            transition: background-color 0.2s ease;
            border-radius: 12px;
        }

        .profile-row:hover {
            background-color: rgba(99, 102, 241, 0.04);
        }

        .table > :not(caption) > * > * {
            padding: 13px 10px;
            border-bottom-color: rgba(226, 232, 240, 0.6);
        }

        /* Modern Gradient Button */
        .btn-gradient-primary {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 50%, #ec4899 100%);
            background-size: 200% auto;
            color: #ffffff;
            border: none;
            box-shadow: 0 8px 20px -6px rgba(99, 102, 241, 0.5);
            transition: all 0.3s ease;
        }

        .btn-gradient-primary:hover {
            background-position: right center;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 12px 24px -6px rgba(236, 72, 153, 0.5);
        }
    </style>
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    @include('sidebar')

    <!-- Main Content -->
    <main class="flex-fill p-4 p-lg-5">
        
        <!-- Header -->
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h3 class="fw-bold mb-1 page-title" data-en="Profile Statistics" data-km="ស្ថិតិប្រវត្តិរូប">Profile Statistics</h3>
                <p class="text-muted mb-0 small" data-en="Overview of customer metrics and profile engagement" data-km="ទិដ្ឋភាពទូទៅនៃទិន្នន័យអតិថិជន និងសកម្មភាពប្រវត្តិរូប">
                    Overview of customer metrics and profile engagement
                </p>
            </div>
            
            <!-- Language Switcher -->
            <div class="dropdown">
                <button class="btn btn-lang dropdown-toggle d-flex align-items-center gap-2" type="button" id="langDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-translate" style="color: #6366f1;"></i>
                    <span id="currentLangText">English</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-4 mt-2 p-2" aria-labelledby="langDropdown">
                    <li>
                        <a class="dropdown-item rounded-3 py-2 d-flex align-items-center justify-content-between" href="#" onclick="changeLanguage('en'); return false;">
                            <span class="fw-medium">English</span>
                            <i class="bi bi-check2 text-primary lang-check" id="check-en"></i>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item rounded-3 py-2 d-flex align-items-center justify-content-between" href="#" onclick="changeLanguage('km'); return false;">
                            <span class="fw-medium">Khmer</span>
                            <i class="bi bi-check2 text-primary lang-check d-none" id="check-km"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row g-4 mb-4">
            <!-- Card 1: Total USD ($) -->
            <div class="col-12 col-sm-6 col-xl-3">
                <a href="viewcoustomer" class="text-decoration-none">
                    <div class="card stat-card card-usd h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="icon-box icon-gradient-primary">
                                    <i class="bi bi-cash-stack"></i>
                                </div>
                                
                            </div>
                            <p class="stat-label mb-1">{{ Auth::user()->name ?? 'Account' }} (USD)</p>
                            <h4 class="stat-value mb-0" style="color: #4f46e5;">$ {{ number_format($totalUSD, 2) }}</h4>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card 2: Total KHR (៛) -->
            <div class="col-12 col-sm-6 col-xl-3">
                <a href="viewcoustomer" class="text-decoration-none">
                    <div class="card stat-card card-khr h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="icon-box icon-gradient-warning">
                                    <i class="bi bi-currency-exchange"></i>
                                </div>
                                
                            </div>
                            <p class="stat-label mb-1">{{ Auth::user()->name ?? 'Account' }} (KHR)</p>
                            <h4 class="stat-value mb-0" style="color: #ea580c;">៛ {{ number_format($totalKHR) }}</h4>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card 3: Total Customers -->
            <div class="col-12 col-sm-6 col-xl-3">
                <a href="viewcoustomer" class="text-decoration-none">
                    <div class="card stat-card card-customers h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="icon-box icon-gradient-info">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                                <span class="trend-badge" style="background: #e0f2fe; color: #0369a1;">
                                    <i class="bi bi-arrow-up-short"></i>Active
                                </span>
                            </div>
                            <p class="stat-label mb-1" data-en="Total Customers" data-km="អតិថិជនសរុប">Total Customers</p>
                            <h4 class="stat-value mb-0" style="color: #0284c7;">{{ number_format($totalCustomers) }}</h4>
                        </div>
                    </div>
                </a>
            </div>

            
        </div>

        <!-- Analytics Chart & Summary Section -->
        <div class="row g-4">
            <!-- Chart Panel -->
            <div class="col-12 col-lg-8">
                <div class="dashboard-panel h-100">
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
                        <div>
                            <h5 class="fw-bold mb-0" data-en="Customer Growth Overview" data-km="ទិដ្ឋភាពទូទៅនៃកំណើនអតិថិជន">Customer Growth Overview</h5>
                            <small class="text-muted" data-en="Monthly profile activity comparison" data-km="ការប្រៀបធៀបសកម្មភាពប្រចាំខែ">Monthly profile activity comparison</small>
                        </div>
                        <span class="badge px-3 py-2 rounded-pill fw-semibold" style="background: linear-gradient(135deg, #eef2ff, #fce7f3); color: #4f46e5;" data-en="This Year" data-km="ឆ្នាំនេះ">
                            <i class="bi bi-calendar3 me-1"></i> This Year
                        </span>
                    </div>
                    <div style="height: 290px;">
                        <canvas id="profileChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Top Profiles List -->
            <div class="col-12 col-lg-4">
                <div class="dashboard-panel h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold mb-0" data-en="Top Profiles" data-km="ប្រវត្តិរូបឆ្នើម">Top Profiles</h5>
                            <a href="viewcoustomer" class="small text-decoration-none fw-bold" style="color: #6366f1;" data-en="View All" data-km="មើលទាំងអស់">View All →</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-borderless align-middle mb-0">
                                <tbody>
                                    <tr class="profile-row">
                                        <td class="ps-1">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="avatar-initials avatar-info">TH</div>
                                                <div>
                                                    <div class="fw-bold text-dark">Thida</div>
                                                    <span class="badge rounded-pill" style="background: #dcfce7; color: #15803d; font-size: 0.7rem;" data-en="Active" data-km="សកម្ម">Active</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end pe-1 fw-bold" style="color: #4f46e5;">183,000</td>
                                    </tr>
                                    <tr class="profile-row">
                                        <td class="ps-1">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="avatar-initials avatar-primary">SD</div>
                                                <div>
                                                    <div class="fw-bold text-dark">Sok Dara</div>
                                                    <span class="badge rounded-pill" style="background: #dcfce7; color: #15803d; font-size: 0.7rem;" data-en="Active" data-km="សកម្ម">Active</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end pe-1 fw-bold" style="color: #0284c7;">112,000</td>
                                    </tr>
                                    <tr class="profile-row">
                                        <td class="ps-1">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="avatar-initials avatar-success">XX</div>
                                                <div>
                                                    <div class="fw-bold text-dark">Xing Xing</div>
                                                    <span class="badge rounded-pill" style="background: #dcfce7; color: #15803d; font-size: 0.7rem;" data-en="Active" data-km="សកម្ម">Active</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end pe-1 fw-bold" style="color: #059669;">80,000</td>
                                    </tr>
                                    <tr class="profile-row">
                                        <td class="ps-1 border-0">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="avatar-initials avatar-danger">NN</div>
                                                <div>
                                                    <div class="fw-bold text-dark">Nu Na</div>
                                                    <span class="badge rounded-pill" style="background: #fef3c7; color: #b45309; font-size: 0.7rem;" data-en="Pending" data-km="រង់ចាំ">Pending</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end pe-1 border-0 fw-bold text-muted">112</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <a href="viewcoustomer" class="btn btn-gradient-primary w-100 rounded-3 py-2.5 mt-3 fw-semibold" data-en="Manage All Customers" data-km="គ្រប់គ្រងអតិថិជនទាំងអស់">
                        Manage All Customers
                    </a>
                </div>
            </div>
        </div>

    </main>
</div>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Chart.js for Modern Analytics -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Language Switcher Logic
    function changeLanguage(lang) {
        const elements = document.querySelectorAll('[data-en]');
        
        elements.forEach(el => {
            el.textContent = lang === 'km' ? el.getAttribute('data-km') : el.getAttribute('data-en');
        });

        // Update dropdown label & active checkmarks
        document.getElementById('currentLangText').textContent = lang === 'km' ? 'ភាសាខ្មែរ' : 'English';
        document.getElementById('check-en').classList.toggle('d-none', lang !== 'en');
        document.getElementById('check-km').classList.toggle('d-none', lang !== 'km');
        
        document.documentElement.lang = lang;
    }

    // Initialize Multi-Color Gradient Smooth Area Chart
    const ctx = document.getElementById('profileChart').getContext('2d');
    
    // Fill Gradient (Indigo -> Pink -> Transparent)
    const fillGradient = ctx.createLinearGradient(0, 0, 0, 290);
    fillGradient.addColorStop(0, 'rgba(99, 102, 241, 0.30)');
    fillGradient.addColorStop(0.5, 'rgba(236, 72, 153, 0.12)');
    fillGradient.addColorStop(1, 'rgba(255, 255, 255, 0.0)');

    // Line Stroke Gradient (Indigo -> Purple -> Pink -> Orange)
    const strokeGradient = ctx.createLinearGradient(0, 0, 600, 0);
    strokeGradient.addColorStop(0, '#4f46e5');
    strokeGradient.addColorStop(0.5, '#a855f7');
    strokeGradient.addColorStop(1, '#ec4899');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
            datasets: [{
                label: 'Total Reach',
                data: [65000, 92000, 115000, 140000, 210000, 295000, 375112],
                borderColor: strokeGradient,
                backgroundColor: fillGradient,
                borderWidth: 3.5,
                fill: true,
                tension: 0.42,
                pointBackgroundColor: '#ffffff',
                pointBorderColor: '#ec4899',
                pointBorderWidth: 2.5,
                pointRadius: 5,
                pointHoverRadius: 7,
                pointHoverBackgroundColor: '#ec4899',
                pointHoverBorderColor: '#ffffff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#1e1b4b',
                    titleColor: '#ffffff',
                    bodyColor: '#e0e7ff',
                    padding: 12,
                    cornerRadius: 10,
                    displayColors: false
                }
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: { color: '#64748b', font: { weight: '600' } }
                },
                y: {
                    border: { display: false },
                    grid: { color: 'rgba(226, 232, 240, 0.6)', borderDash: [4, 4] },
                    ticks: { color: '#64748b' }
                }
            }
        }
    });
</script>
</body>
</html>