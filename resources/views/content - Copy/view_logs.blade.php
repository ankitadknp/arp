<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>{{$title}}</h2>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table" id="table">
                            <thead class="font-weight-bold text-center">
                                <tr>
                                    <th>Datetime</th>
                                    <th>Ip Address</th>
                                    <th>Description</th>
                                    <th>Module</th>
                                    <th>Operation By</th>
                                    <!-- <th>Via Brand</th> -->
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@push('scripts')
<script>
    $('document').ready(function () {
        // table serverside
        var table = $('#table').DataTable({
            processing: false,
            serverSide: true,
            ordering: false,
            //"order": [0,'desc'],
            dom: 'Bfrtip',
            //dom: 'Blfrtip',
            // pageLength: 10,
            // lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
            buttons: [
                //'copy', 'excel', 'pdf'
            ],
            ajax: "{{ route('activity-logs.index') }}",
            columns: [{
                    data: 'datetime',
                    name: 'datetime',
                    // orderable: false,
                    // searchable: true
                },
                {
                    data: 'ipaddress',
                    name: 'ipaddress',
                },
                {
                    data: 'description',
                    name: 'description',
                },
                {
                    data: 'rel_type',
                    name: 'rel_type',
                },
                {
                    data: 'user_name',
                    name: 'users.name',
                },
                // {
                //     data: 'brand_name',
                //     name: 'brands.name',
                // },
            ]
        });
        
        // csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    });

</script>
@endpush
