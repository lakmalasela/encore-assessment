<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: #f5f5f7;
            overflow-x: hidden;
        }
        
        /* Sidebar Styles */
        .sidebar {
            width: 220px;
            height: 100vh;
            position: fixed;
            background-color: #1f2937;
            color: white;
            display: flex;
            flex-direction: column;
            z-index: 1000;
        }
        
        .sidebar-brand {
            padding: 24px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .sidebar-brand h5 {
            font-size: 16px;
            font-weight: 700;
            letter-spacing: 0.5px;
            color: white;
        }
        
        .sidebar-brand .brand-subtitle {
            font-weight: 300;
            font-style: italic;
        }
        
        .sidebar-nav {
            padding: 20px 0;
            flex: 1;
        }
        
        .sidebar-nav .nav-item {
            margin-bottom: 4px;
        }
        
        .sidebar-nav .nav-link {
            color: #9ca3af;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.2s;
            border-left: 3px solid transparent;
            font-size: 14px;
        }
        
        .sidebar-nav .nav-link:hover {
            color: white;
            background-color: rgba(255, 255, 255, 0.05);
        }
        
        .sidebar-nav .nav-link.active {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
            border-left-color: #3b82f6;
        }
        
        .sidebar-nav .nav-link svg {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
        }
        
        /* Main Content */
        .main-content {
            width: 101rem;
            margin-left: 16rem;
            min-height: 100vh;
            background-color: #f9fafb;
        }
        
        /* Header */
        .page-header {
            /* background-color: white;
            padding: 20px 32px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center; */
            position: relative; /* make it the parent reference */
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            padding: 20px 32px;
            border-bottom: 1px solid #e5e7eb;
        }

        .inventory-header{
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }
        
        .page-header h1 {
            font-size: 24px;
            font-weight: 600;
            color: #111827;
            margin: 0;
        }
        
        .header-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .notification-bell {
            position: relative;
            background: none;
            border: none;
            cursor: pointer;
            padding: 8px;
        }
        
        .notification-badge {
            position: absolute;
            top: 4px;
            right: 4px;
            background-color: #ef4444;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6b7280;
            font-weight: 500;
        }
        
        .user-name {
            font-size: 14px;
            color: #6b7280;
        }
        
        /* Content Container */
        .content-container {
            padding: 24px 32px;
        }
        
        /* Filter Controls */
        .filter-section {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .filter-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }
        
        .filter-group {
            display: flex;
            gap: 12px;
            align-items: center;
        }
        
        .filter-label {
            font-size: 13px;
            color: #6b7280;
            margin-right: 8px;
        }
        
        .filter-select {
            padding: 6px 32px 6px 12px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 13px;
            background-color: white;
            color: #374151;
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236b7280' d='M6 8L2 4h8z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 10px center;
        }
        
        .btn-action {
            padding: 8px 16px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 13px;
            background-color: white;
            color: #374151;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .btn-action:hover {
            background-color: #f9fafb;
        }
        
        /* Tabs */
        .status-tabs {
            display: flex;
            gap: 8px;
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 0;
        }
        
        .status-tab {
            padding: 10px 16px;
            font-size: 13px;
            color: #6b7280;
            background: none;
            border: none;
            cursor: pointer;
            position: relative;
            transition: color 0.2s;
        }
        
        .status-tab:hover {
            color: #111827;
        }
        
        .status-tab.active {
            color: #111827;
            font-weight: 500;
        }
        
        .status-tab.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
            height: 2px;
            background-color: #3b82f6;
        }
        
        /* Search Bar */
        .search-container {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .search-input {
            padding: 8px 12px 8px 36px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 13px;
            width: 280px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16' fill='%236b7280'%3E%3Cpath d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: 12px center;
        }
        
        .search-input:focus {
            outline: none;
            border-color: #3b82f6;
        }
        
        /* Table Styles */
        .inventory-table {
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .table {
            margin-bottom: 0;
        }
        
        .table thead th {
            background-color: #f9fafb;
            border-bottom: 1px solid #e5e7eb;
            color: #6b7280;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 12px 16px;
        }
        
        .table tbody td {
            padding: 16px;
            vertical-align: middle;
            border-bottom: 1px solid #f3f4f6;
            font-size: 13px;
            color: #374151;
        }
        
        .table tbody tr:hover {
            background-color: #f9fafb;
        }
        
        .product-cell {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .product-image {
            width: 48px;
            height: 48px;
            border-radius: 6px;
            object-fit: cover;
            background-color: #f3f4f6;
        }
        
        .product-info h6 {
            font-size: 13px;
            font-weight: 500;
            color: #111827;
            margin: 0 0 4px 0;
        }
        
        .product-info p {
            font-size: 12px;
            color: #6b7280;
            margin: 0;
        }
        
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .status-badge.draft {
            background-color: #e0e7ff;
            color: #3730a3;
        }
        
        .status-badge.active {
            background-color: #d1fae5;
            color: #065f46;
        }
        
        .inventory-text {
            font-size: 13px;
            color: #111827;
        }
        
        .last-update {
            font-size: 11px;
            color: #9ca3af;
            display: block;
            margin-top: 4px;
        }
        
        .action-btn {
            background: none;
            border: none;
            color: #9ca3af;
            cursor: pointer;
            padding: 4px;
        }
        
        .action-btn:hover {
            color: #374151;
        }
        
        /* Pagination */
        .pagination-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 20px;
            background: white;
            border-top: 1px solid #e5e7eb;
        }
        
        .pagination-info {
            font-size: 13px;
            color: #6b7280;
        }
        
        .pagination-controls {
            display: flex;
            gap: 8px;
            align-items: center;
        }
        
        .page-btn {
            padding: 6px 12px;
            border: 1px solid #d1d5db;
            background: white;
            border-radius: 4px;
            font-size: 13px;
            color: #374151;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .page-btn:hover:not(:disabled) {
            background-color: #f9fafb;
        }
        
        .page-btn.active {
            background-color: #3b82f6;
            color: white;
            border-color: #3b82f6;
        }
        
        .page-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        
        /* Loading State */
        .loading {
            text-align: center;
            padding: 40px;
            color: #6b7280;
        }
        
        /* Variant Rows */
        .variant-row {
            background-color: #f9fafb;
        }
        
        .variant-cell {
            padding: 0 !important;
        }
        
        .variant-container {
            padding: 16px 20px;
        }
        
        .variant-header {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            background-color: #ffffff;
            border-radius: 6px;
            margin-bottom: 8px;
            font-size: 12px;
            font-weight: 600;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        
        .variant-header-cell {
            padding: 0 8px;
        }
        
        .variant-item {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            background-color: #ffffff;
            border-radius: 6px;
            margin-bottom: 4px;
            font-size: 13px;
            color: #374151;
        }
        
        .variant-item:hover {
            background-color: #f9fafb;
        }
        
        .variant-name {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 8px;
            font-weight: 500;
        }
        
        .color-indicator {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            flex-shrink: 0;
        }
        
        .variant-size,
        .variant-stock,
        .variant-price,
        .variant-discount,
        .variant-action {
            padding: 0 8px;
        }
        
        .variant-stock {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        
        .variant-stock .last-update {
            font-size: 11px;
            color: #9ca3af;
        }
        
        /* Mobile Menu Toggle */
        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            padding: 8px;
            cursor: pointer;
            color: #374151;
        }
        
        .mobile-menu-toggle svg {
            width: 24px;
            height: 24px;
        }
        
        /* Mobile Overlay */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
        
        .sidebar-overlay.active {
            display: block;
        }
        
        /* Responsive Styles */
        @media (max-width: 1024px) {
            .main-content {
                width: 100%;
                margin-left: 0;
            }
            
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .mobile-menu-toggle {
                display: block;
            }
            
            .page-header h1 {
                font-size: 20px;
            }
            
            .content-container {
                padding: 16px;
            }
        }
        
        @media (max-width: 768px) {
            .page-header {
                padding: 16px;
                flex-wrap: wrap;
                gap: 12px;
            }
            
            .page-header h1 {
                font-size: 18px;
                flex: 1;
            }
            
            .header-actions {
                gap: 12px;
            }
            
            .user-name {
                display: none;
            }
            
            /* Filter Section */
            .filter-section {
                padding: 16px;
            }
            
            .filter-row {
                flex-direction: column;
                gap: 12px;
                align-items: stretch;
                margin-bottom: 12px;
            }
            
            .filter-row:last-child {
                margin-bottom: 0;
            }
            
            .filter-group {
                flex-wrap: wrap;
                width: 100%;
            }
            
            .search-container {
                width: 100%;
            }
            
            .search-input {
                width: 100%;
            }
            
            .status-tabs {
                overflow-x: auto;
                flex-wrap: nowrap;
                gap: 4px;
                -webkit-overflow-scrolling: touch;
            }
            
            .status-tab {
                white-space: nowrap;
                padding: 10px 12px;
                font-size: 12px;
            }
            
            /* Table Styles */
            .inventory-table {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
            
            .table {
                min-width: 900px;
            }
            
            .table thead th {
                padding: 10px 12px;
                font-size: 11px;
            }
            
            .table tbody td {
                padding: 12px;
                font-size: 12px;
            }
            
            .product-image {
                width: 40px;
                height: 40px;
            }
            
            .product-info h6 {
                font-size: 12px;
            }
            
            .product-info p {
                font-size: 11px;
            }
            
            /* Pagination */
            .pagination-container {
                flex-direction: column;
                gap: 12px;
                padding: 12px 16px;
                align-items: flex-start;
            }
            
            .pagination-controls {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }
            
            .pagination-info {
                font-size: 12px;
            }
            
            .page-btn {
                padding: 6px 10px;
                font-size: 12px;
            }
            
            /* Variant Rows Mobile */
            .variant-container {
                padding: 12px;
                overflow-x: auto;
            }
            
            .variant-header,
            .variant-item {
                min-width: 700px;
            }
            
            .variant-header {
                font-size: 11px;
                padding: 10px 12px;
            }
            
            .variant-item {
                font-size: 12px;
                padding: 10px 12px;
            }
            
            .color-indicator {
                width: 20px;
                height: 20px;
            }
        }
        
        @media (max-width: 480px) {
            .page-header {
                padding: 12px;
            }
            
            .page-header h1 {
                font-size: 16px;
            }
            
            .content-container {
                padding: 12px;
            }
            
            .filter-section {
                padding: 12px;
            }
            
            .filter-label {
                font-size: 12px;
                width: 100%;
                margin-bottom: 4px;
            }
            
            .filter-select {
                font-size: 12px;
                padding: 6px 28px 6px 10px;
            }
            
            .btn-action {
                padding: 8px 12px;
                font-size: 12px;
                flex: 1;
            }
            
            .status-tab {
                padding: 8px 10px;
                font-size: 11px;
            }
            
            .table {
                min-width: 800px;
            }
            
            .product-cell {
                gap: 8px;
            }
            
            .product-image {
                width: 36px;
                height: 36px;
            }
            
            #pageNumbers .page-btn {
                display: none;
            }
            
            #pageNumbers .page-btn.active {
                display: inline-block;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    <div class="d-flex">
        {{-- Sidebar --}}
        @include('partials.sidebar')

        {{-- Main content --}}
        <div class="main-content">
            {{-- Header --}}
            <div class="page-header">
                <button class="mobile-menu-toggle" id="mobileMenuToggle">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 12h18M3 6h18M3 18h18"/>
                    </svg>
                </button>
                <h1 style="inventory-header">Inventory</h1>
                <div class="header-actions">
                    <button class="notification-bell">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="#6b7280">
                            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                        </svg>
                        <span class="notification-badge">3</span>
                    </button>
                    <div class="user-info">
                        <div class="user-avatar">U</div>
                        <span class="user-name">User Name</span>
                    </div>
                </div>
            </div>
            
            {{-- Content --}}
            <div class="content-container">
                @yield('content')
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mobile menu toggle
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const sidebar = document.querySelector('.sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        
        function toggleSidebar() {
            sidebar.classList.toggle('active');
            sidebarOverlay.classList.toggle('active');
        }
        
        mobileMenuToggle.addEventListener('click', toggleSidebar);
        sidebarOverlay.addEventListener('click', toggleSidebar);
        
        // Close sidebar when clicking a link (mobile)
        document.querySelectorAll('.sidebar .nav-link').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 1024) {
                    toggleSidebar();
                }
            });
        });
        
        // Close sidebar on window resize if screen is large
        window.addEventListener('resize', () => {
            if (window.innerWidth > 1024) {
                sidebar.classList.remove('active');
                sidebarOverlay.classList.remove('active');
            }
        });
    </script>
</body>
</html>
