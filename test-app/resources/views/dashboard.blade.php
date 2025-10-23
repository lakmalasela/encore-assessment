@extends('layouts.app')

@section('content')
    @include('partials.filters')
    @include('partials.table')
    
    <script>
        // Toggle variant details
        function toggleVariants(productId) {
            const variantHeaderRow = document.getElementById('variants-' + productId);
            const variantItemRows = document.querySelectorAll('[data-parent="' + productId + '"]');
            
            if (variantHeaderRow) {
                const isHidden = variantHeaderRow.style.display === 'none';
                
                // Toggle header row
                variantHeaderRow.style.display = isHidden ? 'table-row' : 'none';
                
                // Toggle all variant item rows
                variantItemRows.forEach(row => {
                    row.style.display = isHidden ? 'table-row' : 'none';
                });
            }
        }
        
        // Select all checkbox functionality
        document.getElementById('selectAll').addEventListener('change', function() {
            document.querySelectorAll('#tableBody input[type="checkbox"]').forEach(cb => {
                cb.checked = this.checked;
            });
        });
    </script>
@endsection
