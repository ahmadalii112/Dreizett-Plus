<x-slot name="styles">
    {{--Data Tables--}}
    <!-- BootsTrap 5-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <!-- Select 2-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</x-slot>


@push('scripts')
    <script type="text/javascript">
        $(function () {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                searchDelay: 750,
                ajax: "{{ route('transactions.index') }}",
                columns: [
                    {data: 'payment_partner_name', name: 'payment_partner_name'},
                    {data: 'reference_purpose', name: 'reference_purpose'},
                    {data: 'details', name: 'details'},
                    {data: 'transaction_date', name: 'transaction_date', searchable: false},
                    {data: 'tenant', name: 'tenant'},
                ],
            });
        });
    </script>

@endpush