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
                ajax: "{{ route('residential-communities.index') }}",
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'care_allowance', name: 'care_allowance'},
                    {data: 'household_allowance', name: 'household_allowance'},
                    {data: 'rooms', name: 'rooms', searchable: false},
                    {data: 'created_by', name: 'created_by', orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
            });
        });
    </script>

@endpush