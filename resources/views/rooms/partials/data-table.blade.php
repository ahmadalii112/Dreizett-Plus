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
                ajax: "{{ route('rooms.index') }}",
                columns: [
                    {data: 'room_number', name: 'room_number'},
                    {data: 'community_id', name: 'community_id'},
                    {data: 'square_meter_room', name: 'square_meter_room'},
                    {data: 'square_meter_common_area', name: 'square_meter_common_area'},
                    {data: 'basic_rent', name: 'basic_rent'},
                    {data: 'additional_costs', name: 'additional_costs'},
                    {data: 'heating_costs', name: 'heating_costs'},
                    {data: 'electricity_costs', name: 'electricity_costs'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
            });
        });
    </script>

@endpush