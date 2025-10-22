@extends('layouts.app')

@section('content')
    @include('partials.filters')
    @include('partials.table')
    
    <script>
        // Toggle variant details
        function toggleVariants(productId) {
            const variantRow = document.getElementById('variants-' + productId);
            if (variantRow) {
                if (variantRow.style.display === 'none') {
                    variantRow.style.display = 'table-row';
                } else {
                    variantRow.style.display = 'none';
                }
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
