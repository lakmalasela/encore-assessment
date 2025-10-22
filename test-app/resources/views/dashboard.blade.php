@extends('layouts.app')

@section('content')
    @include('partials.filters')
    @include('partials.table')
    
    <script>
        // Select all checkbox functionality
        document.getElementById('selectAll').addEventListener('change', function() {
            document.querySelectorAll('#tableBody input[type="checkbox"]').forEach(cb => {
                cb.checked = this.checked;
            });
        });
    </script>
@endsection
