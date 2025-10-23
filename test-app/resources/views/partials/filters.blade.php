<div class="filter-section">
    <div class="filter-row">
        <div class="filter-group">
            <div class="filter-item">
                <span class="filter-label">Number of Product</span>
                <span class="filter-separator">|</span>
                <select class="filter-select" id="perPageSelect">
                    <option value="10">All</option>
                    <option value="5">5</option>
                    <option value="10" selected>10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                </select>
            </div>
            
            <div class="filter-item">
                <span class="filter-label">Total Product</span>
                <span class="filter-separator">|</span>
                <select class="filter-select">
                    <option value="all">All</option>
                </select>
            </div>
        </div>
        
        <div class="search-container">
            <input type="text" class="search-input" id="searchInput" placeholder="Search">
        </div>
    </div>
    
    <div class="filter-row">
        <div class="status-tabs">
            <button class="status-tab active" data-status="all">All</button>
            <button class="status-tab" data-status="active">Active</button>
            <button class="status-tab" data-status="draft">Draft</button>
            <button class="status-tab" data-status="achieved">Achieved</button>
        </div>
        
        <div class="filter-group">
            <button class="btn-action">Export</button>
            <button class="btn-action">Import</button>
        </div>
    </div>
</div>
