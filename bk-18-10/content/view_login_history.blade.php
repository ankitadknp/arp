<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>{{$title}}</h2>
            </div>
            <div class="row mb-3 brand_filter">
                <div class="col-md-3">
                    <select class="form-control" id="brandFilter">
                        <option value="">Filter by Brand</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table" id="table">
                            <thead class="font-weight-bold text-center">
                                <tr>
                                    <th>Brand</th>
                                    <th>User Name</th>
                                    <th>User Type</th>
                                    <th>Ip Address</th>
                                    <th>Country</th>
                                    <th>Datetime</th>
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
    @if ($checkAuth == 1 )
        var brand_name = <?php echo json_encode($menu_brand); ?>; 
        $('#selectedBrandLabel').text(brand_name.name);
   @endif
</script>
<script>
    $('document').ready(function () {
        // table serverside
        var table = $('#table').DataTable({
            processing: false,
            serverSide: true,
            ordering: false,
            dom: 'Bfrtip',
            buttons: [
            ],
            ajax: "{{ route('login-history.index') }}",
            columns: [{
                    data: 'brand_name',
                    name: 'brands.name',
                },
                {
                    data: 'user_name',
                    name: 'users.name',
                },
                {
                    data: 'user_type',
                    name: 'user_type',
                },
                {
                    data: 'ipaddress',
                    name: 'ipaddress',
                },
                {
                    data: 'country',
                    name: 'country',
                },
                {
                    data: 'datetime',
                    name: 'datetime',
                },
            ]
        });

        $('#brandFilter').on('change', function () {
            var selectedBrand = this.value;
            table.column(0).search(selectedBrand).draw();    // Use DataTables column search to filter by brand
        });
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

</script>
@endpush
