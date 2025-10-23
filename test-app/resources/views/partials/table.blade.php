<style>
    .inventory-table thead {
        background-color: #C0C0C0 !important;
    }

    .inventory-table thead th {
        background-color: #d9d9d9 !important;
        color: #000 !important;
        border-color: #bfbfbf !important;
        font-weight: 600 !important;
    }

    /* Variant Row Styles */
    .variant-header-row {
        background-color: #f3f4f6 !important;
    }

    .variant-header-row td {
        padding: 10px 16px !important;
        font-size: 12px !important;
        font-weight: 600 !important;
        color: #6b7280 !important;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        border-bottom: 1px solid #e5e7eb !important;
    }

    .variant-item-row {
        background-color: #f9fafb !important;
    }

    .variant-item-row td {
        padding: 12px 16px !important;
        font-size: 13px !important;
        color: #374151 !important;
        border-bottom: 1px solid #f3f4f6 !important;
    }

    .variant-item-row:hover {
        background-color: #f3f4f6 !important;
    }

    .variant-name {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .color-indicator {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        flex-shrink: 0;
    }
</style>


<div class="inventory-table">
    <table class="table">
        <thead>
            <tr>
                <th style="width: 40px;">
                    <input type="checkbox" id="selectAll">
                </th>
                <th></th>
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
                <tr class="product-row" data-product-id="{{ $product['id'] }}">
                    <td>
                        <input type="checkbox" value="{{ $product['id'] }}">
                    </td>
                    <td>
                        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="product-image">
                    </td>
                    <td>
                        <div class="product-cell">
                            
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
                        <button class="action-btn toggle-details" title="View details" onclick="toggleVariants({{ $product['id'] }})">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </td>
                </tr>
                @if(count($product['variants']) > 0)
                    <!-- Variant Header Row -->
                    <tr class="variant-header-row" id="variants-{{ $product['id'] }}" style="display: none;">
                        <td></td>
                        <td></td>
                        <td class="variant-header-cell"><strong>Variants</strong></td>
                        <td class="variant-header-cell"><strong>Size</strong></td>
                        <td class="variant-header-cell"><strong>Stock</strong></td>
                        <td class="variant-header-cell" colspan="2"><strong>Prices</strong></td>
                        <!-- <td class="variant-header-cell"><strong>Category</strong></td> -->
                        <td class="variant-header-cell"><strong>Discount</strong></td>
                        <td></td>
                    </tr>
                    @foreach($product['variants'] as $variant)
                        <tr class="variant-item-row" data-parent="{{ $product['id'] }}" style="display: none;">
                            <td></td>
                            <td></td>
                            <td>
                                <div class="variant-name">
                                    <span class="color-indicator" style="background-color: {{ $variant['color'] }}; {{ $variant['color'] == '#FFFFFF' ? 'border: 1px solid #ddd;' : '' }}"></span>
                                    {{ $variant['name'] }}
                                </div>
                            </td>
                            <td>{{ $variant['size'] }}</td>
                            <td>
                                <div>{{ $variant['stock'] }}</div>
                                <span class="last-update">Last Update - {{ $variant['last_update'] }}</span>
                            </td>
                            <td colspan="2">{{ $variant['price'] }}</td>
                            <!-- <td>{{ $product['category'] }}</td> -->
                            <td>{{ $variant['discount'] }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                @endif
            @empty
                <tr>
                    <td colspan="10" class="loading">No products found.</td>
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
