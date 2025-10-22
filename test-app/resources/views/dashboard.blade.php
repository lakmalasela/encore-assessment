@extends('layouts.app')

@section('content')
    @include('partials.filters')
    @include('partials.table')
    
    <script>
        let currentPage = 1;
        let currentStatus = 'all';
        let currentSearch = '';
        let perPage = 10;
        
        // Fetch inventory data
        async function fetchInventory() {
            const params = new URLSearchParams({
                page: currentPage,
                status: currentStatus,
                search: currentSearch,
                per_page: perPage
            });
            
            try {
                const response = await fetch(`/api/inventory?${params}`);
                const data = await response.json();
                
                renderTable(data.data);
                renderPagination(data.pagination);
            } catch (error) {
                console.error('Error fetching inventory:', error);
                document.getElementById('tableBody').innerHTML = 
                    '<tr><td colspan="9" class="loading">Error loading data. Please try again.</td></tr>';
            }
        }
        
        // Render table rows
        function renderTable(products) {
            const tbody = document.getElementById('tableBody');
            
            if (products.length === 0) {
                tbody.innerHTML = '<tr><td colspan="9" class="loading">No products found.</td></tr>';
                return;
            }
            
            tbody.innerHTML = products.map(product => `
                <tr>
                    <td>
                        <input type="checkbox" value="${product.id}">
                    </td>
                    <td>
                        <div class="product-cell">
                            <img src="${product.image}" alt="${product.name}" class="product-image">
                            <div class="product-info">
                                <h6>${product.name}</h6>
                                <p>${product.description}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="status-badge ${product.status.toLowerCase()}">${product.status}</span>
                    </td>
                    <td>
                        <div class="inventory-text">${product.inventory}</div>
                        ${product.last_update ? `<span class="last-update">Last Update - ${product.last_update}</span>` : ''}
                    </td>
                    <td class="text-center">${product.sales_channels}</td>
                    <td class="text-center">${product.markets}</td>
                    <td>${product.category}</td>
                    <td>${product.vendor}</td>
                    <td>
                        <button class="action-btn" title="View details">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </td>
                </tr>
            `).join('');
        }
        
        // Render pagination
        function renderPagination(pagination) {
            document.getElementById('showingStart').textContent = 
                pagination.total === 0 ? 0 : ((pagination.current_page - 1) * pagination.per_page + 1);
            document.getElementById('showingEnd').textContent = 
                Math.min(pagination.current_page * pagination.per_page, pagination.total);
            document.getElementById('totalRecords').textContent = pagination.total;
            
            // Update prev/next buttons
            document.getElementById('prevBtn').disabled = pagination.current_page === 1;
            document.getElementById('nextBtn').disabled = pagination.current_page === pagination.total_pages || pagination.total_pages === 0;
            
            // Render page numbers
            const pageNumbers = document.getElementById('pageNumbers');
            const pages = [];
            
            for (let i = 1; i <= Math.min(pagination.total_pages, 6); i++) {
                pages.push(`
                    <button class="page-btn ${i === pagination.current_page ? 'active' : ''}" 
                            onclick="goToPage(${i})">${i}</button>
                `);
            }
            
            if (pagination.total_pages > 6) {
                pages.push('<button class="page-btn" disabled>...</button>');
            }
            
            pageNumbers.innerHTML = pages.join('');
        }
        
        // Navigate to page
        function goToPage(page) {
            currentPage = page;
            fetchInventory();
        }
        
        // Status tabs
        document.querySelectorAll('.status-tab').forEach(tab => {
            tab.addEventListener('click', function() {
                document.querySelectorAll('.status-tab').forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                currentStatus = this.getAttribute('data-status');
                currentPage = 1;
                fetchInventory();
            });
        });
        
        // Search functionality
        let searchTimeout;
        document.getElementById('searchInput').addEventListener('input', function(e) {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                currentSearch = e.target.value;
                currentPage = 1;
                fetchInventory();
            }, 500);
        });
        
        // Per page select
        document.getElementById('perPageSelect').addEventListener('change', function(e) {
            perPage = parseInt(e.target.value);
            currentPage = 1;
            fetchInventory();
        });
        
        // Pagination buttons
        document.getElementById('prevBtn').addEventListener('click', function() {
            if (currentPage > 1) {
                currentPage--;
                fetchInventory();
            }
        });
        
        document.getElementById('nextBtn').addEventListener('click', function() {
            currentPage++;
            fetchInventory();
        });
        
        // Select all checkbox
        document.getElementById('selectAll').addEventListener('change', function() {
            document.querySelectorAll('#tableBody input[type="checkbox"]').forEach(cb => {
                cb.checked = this.checked;
            });
        });
        
        // Initial load
        fetchInventory();
    </script>
@endsection
