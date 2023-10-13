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
                            <span>Description_{{$l_data->code}} <span class="label-title">*</sapn></span>
                            <textarea name="description[{{$l_data->code}}]" class="form-control description_{{$l_data->code}}" id="description" placeholder="Description" required></textarea><br>

                            <span>How does This Program work?_{{$l_data->code}} </span>
                            <textarea name="program_work[{{$l_data->code}}]" class="form-control" id="program_work" placeholder="How does This Program work?"></textarea><br>

                            <span>Candidate Score_{{$l_data->code}}</span><br>
                            <input required type="file" name="candidate_score[{{$l_data->code}}]" class="form-control candidate_score_{{$l_data->code}}" id="candidate_score" placeholder="Candidate Score"><br>
                            <!-- <img src="" class="image-preview" id="cost_image_preview_candidate_score[{{$l_data->code}}]" width="100" height="100" /><br> -->

                            <span>Canada Express Entry Latest Draw 2023_{{$l_data->code}} </span><br>
                            <input required type="file" name="express_image[{{$l_data->code}}]" class="form-control express_image_{{$l_data->code}}" id="express_image" placeholder="Canada Express Entry Latest Draw 2023"><br>

                            <span>Here is a step-by-step breakdown for the process with us_{{$l_data->code}} <span class="label-title">*</sapn></span>
                            <textarea name="break_down[{{$l_data->code}}]" class="form-control" id="break_down" placeholder="Here is a step-by-step breakdown for the process with us"></textarea><br>

                            <span>Main Advantages_{{$l_data->code}} <span class="label-title">*</sapn></span>
                            <textarea name="main_advantage[{{$l_data->code}}]" class="form-control" id="main_advantage" placeholder="Main Advantages"></textarea><br>

                            <span>Your salary per region in Canada_{{$l_data->code}} </span>
                            <textarea name="salary_per_region[{{$l_data->code}}]" class="form-control" id="salary_per_region" placeholder="Your salary per region in Canada"></textarea><br>

                            <span>Time Frame_{{$l_data->code}} <span class="label-title">*</sapn></span>
                            <textarea name="time_frame[{{$l_data->code}}]" class="form-control" id="time_frame" placeholder="Time Frame"></textarea><br>

                            <span>Service Cost_{{$l_data->code}} </span><br>
                            <input required type="file" name="cost_image[{{$l_data->code}}]" class="form-control cost_image_{{$l_data->code}}" id="cost_image" placeholder="Cost Image"><br>
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
    // CKEDITOR.replace('ckeditor', {
    //     filebrowserUploadMethod: 'form'
    // });
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
            // CKEDITOR.instances.ckeditor.setData('');
            $('#form').trigger("reset");
            $('#modal').modal('show');
        });
   
        $('body').on('click', '.edit', function () {
            var id = $(this).data('id');
            $('#modal').find('.modal-body img').remove();
            $('.text-danger').remove();

            $.get("{{ route('visa-type.index') }}" + '/' + id + '/edit', function (data) {
                console.log(data);
                $('#saveBtn').val("edit");
                $('#modal').modal('show');
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#brand_id').val(data.brand_id);

                try {
                    data.details.forEach(function(detail) {
                        var languageId = detail.language_id;
                        var fieldId = detail.visa_key + '['+detail.language_id+']';

                        if (detail.is_image == 0) {
                            var field = $('[name="' + fieldId + '"]');
                            field.val(detail.value);
                        }
                        if (detail.is_image == 1) {
                            var imageTag = '<img src="' + detail.value + '" width="100" height="100" class="img-fluid"/>';
                            if (fieldId == $('.candidate_score_'+languageId).attr('name')) {
                                $('.candidate_score_'+languageId).after(imageTag);
                            }

                            if (fieldId == $('.cost_image_'+languageId).attr('name')) {
                                $('.cost_image_'+languageId).after(imageTag);
                            }
                            if (fieldId == $('.express_image_'+languageId).attr('name')) {
                                $('.express_image_'+languageId).after(imageTag);
                            }
                        }
                    });
                } catch (error) {
                    console.error('Error:', error);
                }
            });
        });
        
        // initialize btn save
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Save');
            
            var form_data = new FormData($('#form')[0]);
            @foreach ($language_data as $l_data)
                form_data.append('description[{{$l_data->code}}]', $('textarea[name="description[{{$l_data->code}}]"]').val());
                form_data.append('program_work[{{$l_data->code}}]', $('textarea[name="program_work[{{$l_data->code}}]"]').val());
                form_data.append('break_down[{{$l_data->code}}]', $('textarea[name="break_down[{{$l_data->code}}]"]').val());
                form_data.append('time_frame[{{$l_data->code}}]', $('textarea[name="time_frame[{{$l_data->code}}]"]').val());
                form_data.append('salary_per_region[{{$l_data->code}}]', $('textarea[name="salary_per_region[{{$l_data->code}}]"]').val());
                form_data.append('main_advantage[{{$l_data->code}}]', $('textarea[name="main_advantage[{{$l_data->code}}]"]').val());


                var candidate_score = (typeof $('input[name="candidate_score[{{$l_data->code}}]"]')[0].files[0] != 'undefined') ? $('input[name="candidate_score[{{$l_data->code}}]"]')[0].files[0] : '';
                form_data.append("candidate_score[{{$l_data->code}}]", candidate_score);

                var express_image = (typeof $('input[name="express_image[{{$l_data->code}}]"]')[0].files[0] != 'undefined') ? $('input[name="express_image[{{$l_data->code}}]"]')[0].files[0] : '';
                form_data.append("express_image[{{$l_data->code}}]", express_image);

                var cost_image = (typeof $('input[name="cost_image[{{$l_data->code}}]"]')[0].files[0] != 'undefined') ? $('input[name="cost_image[{{$l_data->code}}]"]')[0].files[0] : '';
                form_data.append("cost_image[{{$l_data->code}}]", cost_image);

            @endforeach
            form_data.append('name', $('#name').val());
            // form_data.append('description', CKEDITOR.instances.ckeditor.getData());
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
