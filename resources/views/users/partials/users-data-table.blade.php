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
                ajax: "{{ route('users.index') }}",
                columns: [
                    {data: 'full_name', name: 'full_name',},
                    {data: 'username', name: 'username'},
                    {data: 'email', name: 'email', orderable: true,  searchable: true,},
                    {data: 'mobile_number', name: 'mobile_number', orderable: true,  searchable: true},
                    {data: 'role', name: 'role', orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
            });
        });
    </script>

@endpush