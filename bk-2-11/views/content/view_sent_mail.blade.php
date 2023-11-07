<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>{{$title}}</h2>
                <div class="d-flex flex-row-reverse"><button
                    class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder" id="createNew"><i
                        class="fas fa-plus"></i>Add</button>
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table" id="table">
                            <thead class="font-weight-bold text-center">
                                <tr>
                                    <th>Brand</th>
                                    <th>Language</th>
                                    <th style="width:90px;">Action</th>
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

<!-- Modal-->
<div class="modal fade" id="modal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Html Template</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="form" name="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <select name="brand_id" class="form-control" id="brand_id">
                            <option value="">Please select brand</option>
                            @foreach($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select><br>
                        <select name="language_id" class="form-control" id="language_id">
                            <option value="">Please select language</option>
                            @foreach($languages as $language)
                            <option value="{{$language->id}}">{{$language->name}}</option>
                            @endforeach
                        </select><br>
                        <textarea type="text" name="html" class="form-control" id="html" placeholder="HTML"></textarea><br>
                        <!-- <textarea name="html" class="form-control html" id="ckeditor" placeholder="HTML"></textarea><br> -->
                        <input type="hidden" name="id" id="id" value="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary font-weight-bold" id="saveBtn">Save changes</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<!-- <script type="text/javascript" src="{{asset("/plugins/ckeditor/ckeditor.js")}}"></script> -->
@if (count($brands) > 1)
<script type="text/javascript" src="{{asset('js/brand-selector.js')}}"></script>
@else
<script>
    var brands = <?php echo json_encode($brands); ?>; 
    $('#selectedBrandLabel').text(brands[0]);
</script>
@endif

<script>
    $('document').ready(function () {

        // success alert
        function swal_success() {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1000
            })
        }
        // error alert
        function swal_error() {
            Swal.fire({
                position: 'centered',
                icon: 'error',
                title: 'Something goes wrong !',
                showConfirmButton: true,
            })
        }

        function swal_errorMsg(msgs){
            Swal.fire({
                position: 'centered',
                icon: 'error',
                title: msgs.join(" \n "),
                showConfirmButton: true,
            })
        }
        // table serverside
        var table = $('#table').DataTable({
            processing: false,
            serverSide: true,
            ordering: false,
            dom: 'Bfrtip',
            buttons: [
            ],
            ajax: "{{ route('pdf.index') }}",
            columns: [{
                    data: 'language_name',
                    name: 'language.name'
                },
                {
                    data: 'brand_name',
                    name: 'brand.name'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
        
        // csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // initialize btn add
        $('#createNew').click(function () {
            $('#saveBtn').val("create visa type");
            $('#id').val('');
            // CKEDITOR.instances.ckeditor.setData('');
            $('#form').trigger("reset");
            $('#modal').modal('show');
        });
   
        // initialize btn edit
        $('body').on('click', '.edit', function () {
            var id = $(this).data('id');
            $.get("{{route('pdf.index')}}" + '/' + id + '/edit', function (data) {
                $('#saveBtn').val("edit");
                $('#modal').modal('show');
                $('#id').val(data.id);
                $('#brand_id').val(data.brand_id);
                $('#language_id').val(data.language_id);
                $('#html').val(data.html);
                // CKEDITOR.instances.ckeditor.setData(data.html);
            })
        });

        // initialize btn save
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Save');
            $.ajax({
                // data: $('#form').serialize() + '&html=' + CKEDITOR.instances.ckeditor.getData(),
                data: $('#form').serialize(),
                url: "{{ route('pdf.store') }}",
                type: "POST",
                success: function (data) {
                    if(typeof data.error != 'undefined' && data.error!='' && data.error!=null){
                        swal_errorMsg(data.error);
                    }else{
                        $('#form').trigger("reset");
                        $('#modal').modal('hide');
                        swal_success();
                        table.draw();
                    }
                },
                error: function (data) {
                    swal_error();
                    $('#saveBtn').html('Save Changes');
                }
            });
        });

        // initialize btn delete
        $('body').on('click', '.delete', function () {
            var id = $(this).data("id");
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{route('pdf.store')}}" + '/' + id,
                        success: function (data) {
                            swal_success();
                            table.draw();
                        },
                        error: function (data) {
                            swal_error();
                        }
                    });
                }
            })
        });

    });

</script>

@endpush
