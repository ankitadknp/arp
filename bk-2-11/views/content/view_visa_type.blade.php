<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>{{$title}}</h2>
                <!-- <div class="d-flex flex-row-reverse"><button
                    class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder" id="createNew"><i
                        class="fas fa-plus"></i>Add</button>
                </div> -->
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
                <button type="button" class="close visa_close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div id="visa_titile_array">
                    <!-- This is where dynamically generated elements will be appended -->
                </div>
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
                        <input type="hidden" name="id" id="id" value="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold visa_close" data-dismiss="modal">Close</button>
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
    var imageUrl = "{{asset('')}}";

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

        $('.visa_close').click(function () {
            location.reload();
        });

        // initialize btn add
        $('#createNew').click(function () {
            $('#saveBtn').val("create visa type");
            $('#id').val('');
            $('#image_preview').remove();
            $('.avatar-badge').hide();
            $('#modal').find('.modal-body img').remove();
            // CKEDITOR.instances.ckeditor.setData('');
            $('#form').trigger("reset");
            $('#modal').modal('show');
        });
   

        var textareasAppended = false;

        $('body').on('click', '.edit', function () {
            var id = $(this).data('id');
            $('#modal').find('.modal-body img').remove();

            $.get("{{ route('visa-type.index') }}" + '/' + id + '/edit', function (data) {
                console.log(data);
                $('#saveBtn').val("edit");
                $('#modal').modal('show');
                $('#id').val(id);
                $('#name').val(data.data.name);
                $('#brand_id').val(data.data.brand_id);
                $('.visa_title_div').show();
                try {
                    if (!textareasAppended && data.title) {
                        @foreach ($language_data as $l_data)

                            data.title.forEach(function (keyItem) {
                                var key = keyItem.key;
                                var input_id = keyItem.id;
                                var isImage = keyItem.is_image;

                                var container = $('#visa_titile_array');
                                var languageId = '{{$l_data->code}}';

                                var titleElement = $('<span class="visa_title"> ' + key + '_' + languageId + '<span class="label-title">*</span></span><br>');

                                if (isImage == 1) {
                                    fieldElement = '<input required type="file" name="' + key + '[' + languageId + ']" class="form-control img-container ' + key + '_' + languageId + '" id="' + key + '" placeholder="' + key + '"><br>';
                                } else {
                                    fieldElement = '<textarea name="' + key + '[' + languageId + ']" class="form-control ckeditor_visa_type ' + key + '_' + languageId + '" id="' + key + '[' + languageId + ']" placeholder="' + key + '" required></textarea><br>';
                                }

                                // Append the title and field to the container
                                container.append(titleElement);
                                container.append(fieldElement);
                                $('#form .form-group').append(container);
                            });
                            CKEDITOR.replaceAll('ckeditor_visa_type');
                            textareasAppended = true; // Set the flag to true after appending
                        @endforeach
                    } 

                    if (data.data.details) {
                        data.data.details.forEach(function (detail) {
                            var languageId = detail.language_code;
                            var fieldId = detail.visa_key + '[' + detail.language_code + ']';

                            if (detail.is_image == 1) {
                                var imageTag = '<img src="' + imageUrl + detail.value + '" width="100" height="100" class="img-fluid"/>';
                                $('[name="' + fieldId + '"]').after(imageTag);
                            }

                            if (detail.is_image == 0) {
                                CKEDITOR.on('instanceReady', function (ev) {
                                    if (ev.editor.name == fieldId) {
                                        ev.editor.setData(detail.value);
                                    }
                                });
                            }
                        });
                    }
                } catch (error) {
                    console.error('Error:', error);
                }
            });
        });

        // initialize btn save
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            // $(this).html('Save');
            
            var form_data = new FormData($('#form')[0]);
            form_data.append('name', $('#name').val());
            var hasEmptyEditor = false; 

            $('textarea.ckeditor_visa_type').each(function () {

                var $textarea = $(this);
                var editorName = $textarea.attr('name');
                var ckEditorInstance = CKEDITOR.instances[editorName];
                  // if (ckEditorInstance.checkDirty()) {
                //     ckEditorInstance.updateElement();
                //      var editorData = ckEditorInstance.getData();
                        // form_data.append(editorName, editorData);
                // }


                var editorData = ckEditorInstance.getData();
                if (!editorData.trim()) {
                    hasEmptyEditor = true;
                    Swal.fire({
                        position: 'centered',
                        icon: 'error',
                        title: editorName + 'field is required',
                        showConfirmButton: true,
                    })
                } else {
                    form_data.append(editorName, editorData);
                }
            });

            if (hasEmptyEditor) {
                return false;
            }

            console.log('form data =>' ,form_data);

            $.ajax({
                data: form_data,
                url: "{{ route('visa-type.store') }}",
                type: "POST",
                enctype: 'multipart/form-data',
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
                        location.reload();
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
