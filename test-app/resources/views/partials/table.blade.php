<div class="inventory-table">
    <table class="table">
        <thead>
            <tr>
                <th style="width: 40px;">
                    <input type="checkbox" id="selectAll">
                </th>
                <th>Product</th>
                <th style="width: 120px;">Status</th>
                <th>Inventory</th>
                <th style="width: 100px;">Sales channels</th>
                <th style="width: 100px;">Markets</th>
                <th>Category</th>
                <th>Vendor</th>
                <th style="width: 60px;"></th>
            </tr>
        </thead>
        <tbody id="tableBody">
            @forelse($products as $product)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $product['id'] }}">
                    </td>
                    <td>
                        <div class="product-cell">
                            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="product-image">
                            <div class="product-info">
                                <h6>{{ $product['name'] }}</h6>
                                <p>{{ $product['description'] }}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="status-badge {{ strtolower($product['status']) }}">{{ $product['status'] }}</span>
                    </td>
                    <td>
                        <div class="inventory-text">{{ $product['inventory'] }}</div>
                        @if(isset($product['last_update']) && $product['last_update'])
                            <span class="last-update">Last Update - {{ $product['last_update'] }}</span>
                        @endif
                    </td>
                    <td class="text-center">{{ $product['sales_channels'] }}</td>
                    <td class="text-center">{{ $product['markets'] }}</td>
                    <td>{{ $product['category'] }}</td>
                    <td>{{ $product['vendor'] }}</td>
                    <td>
                        <button class="action-btn" title="View details">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="loading">No products found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <div class="pagination-container">
        <div class="pagination-info">
            Showing <span id="showingStart">1</span> - <span id="showingEnd">{{ count($products) }}</span> of <span id="totalRecords">{{ count($products) }}</span> results
        </div>
        <div class="pagination-controls" id="paginationControls">
            <button class="page-btn" id="prevBtn" disabled>&lt;</button>
            <div id="pageNumbers">
                <button class="page-btn active">1</button>
            </div>
            <button class="page-btn" id="nextBtn" disabled>&gt;</button>
        </div>
    </div>
</div>
