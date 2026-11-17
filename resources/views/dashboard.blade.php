<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Fonts: Plus Jakarta Sans (EN) & Kantumruy Pro (KM) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">

    <style>
        :root {
            --bg-body: #f8fafc;
            --card-bg: #ffffff;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --primary-accent: #4f46e5;
        }

        body {
            background-color: var(--bg-body);
            font-family: 'Plus Jakarta Sans', 'Kantumruy Pro', sans-serif;
            color: var(--text-main);
            -webkit-font-smoothing: antialiased;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: var(--card-bg);
            border-right: 1px solid var(--border-color);
        }

        .sidebar .nav-link {
            color: var(--text-muted);
            font-weight: 500;
            border-radius: 10px;
            padding: 10px 14px;
            transition: all 0.2s ease;
        }

        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background: #eef2ff;
            color: var(--primary-accent);
        }

        /* Modern Stat Cards */
        .stat-card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.03);
            transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px -8px rgba(15, 23, 42, 0.08);
            border-color: #cbd5e1;
        }

        /* Soft Tinted Icon Containers */
        .icon-box {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }

        .icon-primary { background-color: #eef2ff; color: #4f46e5; }
        .icon-info    { background-color: #e0f2fe; color: #0284c7; }
        .icon-success { background-color: #dcfce7; color: #16a34a; }
        .icon-danger  { background-color: #ffe4e6; color: #e11d48; }

        .stat-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-muted);
            text-transform: capitalize;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-main);
            letter-spacing: -0.02em;
        }

        .trend-badge {
            font-size: 0.75rem;
            font-weight: 600;
            padding: 3px 8px;
            border-radius: 20px;
        }

        /* Language Dropdown Button */
        .btn-lang {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            color: var(--text-main);
            font-weight: 500;
            font-size: 0.875rem;
            padding: 8px 16px;
            border-radius: 10px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.03);
            transition: all 0.2s ease;
        }

        .btn-lang:hover {
            background: #f1f5f9;
            border-color: #cbd5e1;
        }

        /* Content Panels (Chart & Table) */
        .dashboard-panel {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.03);
            padding: 24px;
        }

        .avatar-initials {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            font-weight: 600;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .table > :not(caption) > * > * {
            padding: 14px 12px;
            border-bottom-color: var(--border-color);
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
                <h3 class="fw-bold mb-1" data-en="Profile Statistics" data-km="ស្ថិតិប្រវត្តិរូប">Profile Statistics</h3>
                <p class="text-muted mb-0 small" data-en="Overview of customer metrics and profile engagement" data-km="ទិដ្ឋភាពទូទៅនៃទិន្នន័យអតិថិជន និងសកម្មភាពប្រវត្តិរូប">
                    Overview of customer metrics and profile engagement
                </p>
            </div>
            
            <!-- Language Switcher -->
            <div class="dropdown">
                <button class="btn btn-lang dropdown-toggle d-flex align-items-center gap-2" type="button" id="langDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-translate text-primary"></i>
                    <span id="currentLangText">English</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3 mt-1" aria-labelledby="langDropdown">
                    <li>
                        <a class="dropdown-item rounded-2 py-2 d-flex align-items-center justify-content-between" href="#" onclick="changeLanguage('en'); return false;">
                            <span>English</span>
                            <i class="bi bi-check2 text-primary lang-check" id="check-en"></i>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item rounded-2 py-2 d-flex align-items-center justify-content-between" href="#" onclick="changeLanguage('km'); return false;">
                            <span>ភាសាខ្មែរ (Khmer)</span>
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
            <div class="card stat-card h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="icon-box icon-primary">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                        <span class="trend-badge bg-success-subtle text-success">
                            <i class="bi bi-arrow-up-short"></i>12.5%
                        </span>
                    </div>
                    <p class="stat-label mb-1">{{ Auth::user()->name ?? 'Account' }} (USD)</p>
                    <h4 class="stat-value mb-0">$ {{ number_format($totalUSD, 2) }}</h4>
                </div>
            </div>
        </a>
    </div>

    <!-- Card 2: Total KHR (៛) -->
    <div class="col-12 col-sm-6 col-xl-3">
        <a href="viewcoustomer" class="text-decoration-none">
            <div class="card stat-card h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="icon-box icon-warning">
                            <i class="bi bi-currency-exchange"></i>
                        </div>
                        <span class="trend-badge bg-success-subtle text-success">
                            <i class="bi bi-arrow-up-short"></i>8.2%
                        </span>
                    </div>
                    <p class="stat-label mb-1">{{ Auth::user()->name ?? 'Account' }} (KHR)</p>
                    <h4 class="stat-value mb-0">៛ {{ number_format($totalKHR) }}</h4>
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
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h5 class="fw-bold mb-0" data-en="Customer Growth Overview" data-km="ទិដ្ឋភាពទូទៅនៃកំណើនអតិថិជន">Customer Growth Overview</h5>
                            <small class="text-muted" data-en="Monthly profile activity comparison" data-km="ការប្រៀបធៀបសកម្មភាពប្រចាំខែ">Monthly profile activity comparison</small>
                        </div>
                        <span class="badge bg-light text-dark border px-3 py-2 rounded-pill" data-en="This Year" data-km="ឆ្នាំនេះ">This Year</span>
                    </div>
                    <div style="height: 280px;">
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
                            <a href="viewcoustomer" class="small text-decoration-none fw-semibold" data-en="View All" data-km="មើលទាំងអស់">View All</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-borderless align-middle mb-0">
                                <tbody>
                                    <tr>
                                        <td class="ps-0">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="avatar-initials icon-info">TH</div>
                                                <div>
                                                    <div class="fw-semibold">Thida</div>
                                                    <small class="text-muted" data-en="Active" data-km="សកម្ម">Active</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end pe-0 fw-bold">183,000</td>
                                    </tr>
                                    <tr>
                                        <td class="ps-0">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="avatar-initials icon-primary">SD</div>
                                                <div>
                                                    <div class="fw-semibold">Sok Dara</div>
                                                    <small class="text-muted" data-en="Active" data-km="សកម្ម">Active</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end pe-0 fw-bold">112,000</td>
                                    </tr>
                                    <tr>
                                        <td class="ps-0">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="avatar-initials icon-success">XX</div>
                                                <div>
                                                    <div class="fw-semibold">Xing Xing</div>
                                                    <small class="text-muted" data-en="Active" data-km="សកម្ម">Active</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end pe-0 fw-bold">80,000</td>
                                    </tr>
                                    <tr>
                                        <td class="ps-0 border-0">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="avatar-initials icon-danger">NN</div>
                                                <div>
                                                    <div class="fw-semibold">Nu Na</div>
                                                    <small class="text-muted" data-en="Pending" data-km="រង់ចាំ">Pending</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end pe-0 border-0 fw-bold">112</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <a href="viewcoustomer" class="btn btn-primary w-100 rounded-3 py-2 mt-3 fw-medium" style="background-color: #4f46e5; border: none;" data-en="Manage All Customers" data-km="គ្រប់គ្រងអតិថិជនទាំងអស់">
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

    // Initialize Smooth Area Chart
    const ctx = document.getElementById('profileChart').getContext('2d');
    const gradient = ctx.createLinearGradient(0, 0, 0, 280);
    gradient.addColorStop(0, 'rgba(79, 70, 229, 0.25)');
    gradient.addColorStop(1, 'rgba(79, 70, 229, 0.0)');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
            datasets: [{
                label: 'Total Reach',
                data: [65000, 92000, 115000, 140000, 210000, 295000, 375112],
                borderColor: '#4f46e5',
                backgroundColor: gradient,
                borderWidth: 2.5,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#ffffff',
                pointBorderColor: '#4f46e5',
                pointBorderWidth: 2,
                pointRadius: 4,
                pointHoverRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: { color: '#64748b' }
                },
                y: {
                    border: { display: false },
                    grid: { color: '#f1f5f9' },
                    ticks: { color: '#64748b' }
                }
            }
        }
    });
</script>
</body>
</html>