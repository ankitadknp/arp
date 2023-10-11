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
                                    <th>Name</th>
                                    <th>Brand</th>
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
                <h5 class="modal-title text-white" id="exampleModalLabel">Visa Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="form" name="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <span>Name <span class="label-title">*</sapn></span>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Name"><br>
                        <span>Brand <span class="label-title">*</sapn></span>
                        <select name="brand_id" class="form-control" id="brand_id">
                            <option value="">Please select brand</option>
                            @foreach($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select><br>
                        @foreach ($language_data as $l_data)
                            <!-- <textarea name="description" class="form-control description" id="ckeditor" placeholder="Description"></textarea><br> -->
                            <span>Description_{{$l_data->code}}</span>
                            <textarea name="description" class="form-control description" id="description" placeholder="Description"></textarea><br>

                            <span>How does This Program work?_{{$l_data->code}}</span>
                            <textarea name="description" class="form-control description" id="description" placeholder="Description"></textarea><br>

                            <span>Candidate Score:</span><br>
                            <input required type="file" name="image[]" class="form-control" id="image" placeholder="Image" multiple=""><br>
                        @endforeach
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
<script type="text/javascript" src="{{asset("/plugins/ckeditor/ckeditor.js")}}"></script>
<script>
    var brand_name = <?php echo json_encode($menu_brand); ?>; 
    $('#selectedBrandLabel').text(brand_name.name);
</script>
<script>
    CKEDITOR.replace('ckeditor', {
        filebrowserUploadMethod: 'form'
    });
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
            msgs = String(msgs).split(',').join('<br>');
            Swal.fire({
                position: 'centered',
                icon: 'error',
                title: msgs,
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
            ajax: "{{ route('visa-type.index') }}",
            columns: [{
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'brand.name',
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
            $('#image_preview').remove();
            $('.avatar-badge').hide();
            $('#modal').find('.modal-body img').remove();
            CKEDITOR.instances.ckeditor.setData('');
            $('#form').trigger("reset");
            $('#modal').modal('show');
        });
   
        // initialize btn edit
        $('body').on('click', '.edit', function () {
            var id = $(this).data('id');
            $('#image_preview').remove();
            $('#modal').find('.modal-body img').remove();
            $('.text-danger').remove();
            $.get("{{route('visa-type.index')}}" + '/' + id + '/edit', function (data) {
                $('#saveBtn').val("edit");
                $('#modal').modal('show');
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#brand_id').val(data.brand_id);
                $('#image').after(data.image);

                CKEDITOR.instances.ckeditor.setData(data.description);
            })
        });
        
        // initialize btn save
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            
            $(this).html('Save');
            
            var form_data = new FormData($('#form')[0]);
            var files = $('#image')[0].files;
            if (files.length > 0) {
                for (var i = 0; i < files.length; i++) {
                    console.log(files[i]);
                    form_data.append('image[]', files[i]);
                }
            }
            
            form_data.append('description', CKEDITOR.instances.ckeditor.getData());
            $.ajax({
                data: form_data,
                url: "{{ route('visa-type.store') }}",
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
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
                        url: "{{route('visa-type.store')}}" + '/' + id,
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

        $('body').on('click', '.delete_data_button', function () {
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
                        data: {
                            'id': id,
                        },
                        url: "{{route('visa-image-delete')}}" ,
                        success: function (data) {
                            swal_success();
                            $('#modal').modal('hide');
                            table.draw();
                            location.reload();
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
