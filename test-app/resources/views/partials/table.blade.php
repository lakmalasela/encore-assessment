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
            <tr>
                <td colspan="9" class="loading">Loading inventory data...</td>
            </tr>
        </tbody>
    </table>
    
    <div class="pagination-container">
        <div class="pagination-info">
            Showing <span id="showingStart">0</span> - <span id="showingEnd">0</span> of <span id="totalRecords">0</span> results
        </div>
        <div class="pagination-controls" id="paginationControls">
            <button class="page-btn" id="prevBtn" disabled>&lt;</button>
            <div id="pageNumbers"></div>
            <button class="page-btn" id="nextBtn" disabled>&gt;</button>
        </div>
    </div>
</div>
