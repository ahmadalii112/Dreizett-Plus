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
                ajax: "{{ route('tickets.index') }}",
                columns: [
                    {data: 'full_name', name: 'full_name'},
                    {data: 'location', name: 'location'},
                    {data: 'ticket_type', name: 'ticket_type'},
                    {data: 'ticket_status', name: 'ticket_status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
            });
        });
    </script>

@endpush