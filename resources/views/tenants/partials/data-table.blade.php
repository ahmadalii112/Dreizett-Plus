<x-slot name="styles">
    {{--Data Tables--}}
    <!-- BootsTrap 5-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    {{--Data Tables--}}
</x-slot>

@push('scripts')
    <script type="text/javascript">
        $(function () {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                searchDelay: 750,
                ajax: "{{ isset($roomId) ? route('previous-tenants', $roomId)  : route('tenants.index') }}",
                columns: [
                    {data: 'insurance_number', name: 'insurance_number'},
                    {data: 'room_number', name: 'room_id'},
                    {data: 'full_name', name: 'full_name', orderable: false, searchable: false},
                    {data: 'address', name: 'address', orderable: false, searchable: false},
                    {data: 'status', name: 'status', orderable: false, searchable: false},
                    {data: 'contract_start', name: 'contract_start_date'},
                    {data: 'contract_end', name: 'contract_end_date'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
            });
        });
    </script>

@endpush