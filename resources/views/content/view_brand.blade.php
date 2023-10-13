<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>{{$title}}</h2>
                <div class="d-flex flex-row-reverse"><button
                        class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder" id="createNew"><i
                            class="fas fa-plus"></i>Add</button></div>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table" id="table">
                            <thead class="font-weight-bold text-center">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone No.</th>
                                    <th>Logo</th>
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
                <h5 class="modal-title text-white" id="exampleModalLabel">Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="form" name="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <span>Name <span class="label-title">*</sapn></span>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Name"><br>
                        <span>Email <span class="label-title">*</sapn></span>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email"><br>
                        <span>Phone Number <span class="label-title">*</sapn></span>
                        <input type="text" name="phone_no" class="form-control" id="phone_no" placeholder="Phone Number" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'><br>
                        <span>Website <span class="label-title">*</sapn></span>
                        <input type="text" name="website" class="form-control" id="website" placeholder="Website"><br>
                        <span>Logo <span class="label-title">*</sapn></span><br>
                        <input required type="file" name="logo" class="form-control" id="logo" placeholder="Logo"><br>
                        <span>Languages <span class="label-title">*</sapn></span><br>
                        <select name="language_id[]" class="form-control" id="language_id" multiple>
                            <option value="">Please Select Language</option>
                            @foreach($languages as $language)
                            <option value="{{$language->code}}">{{$language->name}}</option>
                            @endforeach
                        </select><br>
                        <!-- @foreach ($languages as $l_data)
                        <span class="aboutLabel">About Us ({{$l_data->name}})</span>
                        <textarea class="form-control ckeditor-field" name="about_{{$l_data->code}}" id="ckeditor_{{$l_data->code}}" placeholder="About {{$l_data->name}}"></textarea><br>
                        @endforeach -->
                        <span id="aboutLabel"></span>
                        <textarea class="form-control ckeditor-field" name="about_en" id="ckeditor_en" placeholder="About English"></textarea><br>
                        <span id="FrenchLabel"></span>
                        <textarea class="form-control ckeditor-field" name="about_fr" id="ckeditor_fr" placeholder="About French"></textarea>
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

<!-- PipeDrive setting Modal-->
<div class="modal fade" id="pipedrive_setting" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Pipedrive Setting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="pipe_form" name="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <span>URL <span class="label-title">*</sapn></span>
                        <input type="text" name="url" class="form-control" id="url" placeholder="URL"><br>
                        <span>Token <span class="label-title">*</sapn></span>
                        <input type="text" name="token" class="form-control" id="token" placeholder="Token"><br>
                        <input type="hidden" name="id" id="pipe_id" value="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary font-weight-bold" id="savePipeBtn">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- SMTP Modal-->
<div class="modal fade" id="smtp_modal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Smtp Setting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="smtp_form" name="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <span>Host <span class="label-title">*</sapn></span>
                        <input type="text" name="host" class="form-control" id="host" placeholder="Host"><br>
                        <span>Port <span class="label-title">*</sapn></span>
                        <input type="text" name="port" class="form-control" id="port" placeholder="Port"><br>
                        <span>Username <span class="label-title">*</sapn></span>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username"><br>
                        <span>Password <span class="label-title">*</sapn></span>
                        <input type="text" name="password" class="form-control" id="password" placeholder="Password"><br>
                        <span>Encryption <span class="label-title">*</sapn></span>
                        <select name="encryption" class="form-control" id="encryption">
                            <option value="">Please select encryption</option>
                            <option value="tls">tls</option>
                            <option value="ssl">ssl</option>
                        </select><br>
                        <span>From Email Address <span class="label-title">*</sapn></span>
                        <input type="text" name="from_email_address" class="form-control" id="from_email_address" placeholder="From Email Address"><br>
                        <span>From Name <span class="label-title">*</sapn></span>
                        <input type="text" name="from_name" class="form-control" id="from_name" placeholder="From Name"><br>
                        <input type="hidden" name="id" id="smtp_id" value="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary font-weight-bold" id="smtp_saveBtn">Save changes</button>
            </div>
        </div>
    </div>
</div>



@push('scripts')
<script type="text/javascript" src="{{asset("/plugins/ckeditor/ckeditor.js")}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    $('document').ready(function () {
        $('#language_id').select2();

        $('#language_id').on('change', function () {
            var selectedLanguages = $(this).val();
            $('.ckeditor-field').hide(); // Hide all CKEditor fields
            var label = $('#aboutLabel');
            var FrenchLabel = $('#FrenchLabel');
            
            selectedLanguages.forEach(function (language) { // Initialize CKEditor for the selected languages
                $('#ckeditor_' + language).show();
                // $('.aboutLabel').show();

                if (language.includes('en')) {
                    label.text('About Us (English) *');
                } else if (language.includes('fr')) {
                    FrenchLabel.text('About Us (French) *');
                }

                // Initialize CKEditor if it's not already initialized
                if (typeof CKEDITOR.instances['ckeditor_' + language] === 'undefined') {
                    CKEDITOR.replace('ckeditor_' + language, {
                        filebrowserUploadMethod: 'form'
                    });
                }
            });

            // Hide and destroy CKEditor for deselected languages
            var allLanguages = ['en', 'fr']; // Replace with the list of all available languages
            var deselectedLanguages = allLanguages.filter(lang => !selectedLanguages.includes(lang));
            deselectedLanguages.forEach(function (language) {
                $('#ckeditor_' + language).hide(); // Hide the CKEditor field
                // $('.aboutLabel').hide();

                if (language.includes('en')) {
                    label.text('');
                } else if (language.includes('fr')) {
                    FrenchLabel.text('');
                }

                if (typeof CKEDITOR.instances['ckeditor_' + language] !== 'undefined') {
                    CKEDITOR.instances['ckeditor_' + language].destroy();
                }
            });
        });

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
                //'copy', 'excel', 'pdf'
            ],
            ajax: "{{ route('brands.index') }}",
            columns: [{
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'phone_no',
                    name: 'phone_no'
                },
                {
                    data: 'logo',
                    name: 'logo',
                    orderable: false,
                    searchable: false
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
            $('#saveBtn').val("create brand");
            $('#id').val('');
            $('#image_preview').remove();
            $('#deleteImage').hide();
            $('#language_id').val(null).trigger('change');
            // CKEDITOR.instances.ckeditor.setData('');
            $('#form').trigger("reset");
            $('#modal').modal('show');
        });

        // initialize btn edit
        $('body').on('click', '.edit', function () {
            var id = $(this).data('id');
            $('#image_preview').remove();
            $('#deleteImage').hide();
            
            $.get("{{route('brands.index')}}" + '/' + id + '/edit', function (data) {
                console.log(data);
                $('#saveBtn').val("edit");
                $('#modal').modal('show');
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#phone_no').val(data.phone_no);
                $('#language_id').val(null);
                $('#website').val(data.website);
             
                var selectedLanguageIds = data.language_id.split(',');

                $('#language_id option').each(function () {
                    if (selectedLanguageIds.includes($(this).val())) {
                        $(this).prop('selected', true);
                    }
                });

                $('#language_id').trigger('change'); // Refresh the Select2 dropdown (if you're using Select2)

                $('#logo').after(data.logo);

                CKEDITOR.instances.ckeditor_fr.setData(data.about_fr);
                CKEDITOR.instances.ckeditor_en.setData(data.about_en);

            })
        });
        
        // initialize btn save
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Save');
            var form_data = new FormData();
            var logo = (typeof $('#logo')[0].files[0] != 'undefined') ? $('#logo')[0].files[0] : '';
            form_data.append("logo", logo);
            form_data.append('name', $('#name').val());
            form_data.append('email', $('#email').val());
            form_data.append('phone_no', $('#phone_no').val());
            form_data.append('website', $('#website').val());
            form_data.append('id', $('#id').val());
            var selectedLanguages = $('#language_id').val();
            form_data.append('language_id', selectedLanguages.join(','));

            // @foreach($languages as $lang)
            //     if (selectedLanguages.includes('{{ $lang }}')) {
            //         const aboutData = CKEDITOR.instances[`ckeditor_{{ $lang }}`].getData();
            //         form_data.append(`about_{{ $lang }}`, aboutData);
            //     }
            // @endforeach

            if (selectedLanguages.includes('en')) {
                form_data.append('about_en', CKEDITOR.instances.ckeditor_en.getData());
            }

            // Check if CKEditor for French exists and get data
            if (selectedLanguages.includes('fr')) {
                form_data.append('about_fr', CKEDITOR.instances.ckeditor_fr.getData());
            }

            $.ajax({
                data: form_data,
                url: "{{ route('brands.store') }}",
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
                        url: "{{route('brands.store')}}" + '/' + id,
                        success: function (data) {
                            if (data.success) {
                                swal_success();
                                table.draw();
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: data.error,
                                    icon: 'error'
                                });
                            }
                        },
                        error: function (data) {
                            swal_error();
                        }
                    });
                }
            })
        });

        $('body').on('click', '.brand_delete', function () {
            var id = $(this).data('id');
            $.ajax({
                data: {id:id},
                url: "{{ route('brand_delete') }}",
                type: "POST",
                success: function (data) {
                    if(typeof data.error != 'undefined' && data.error!='' && data.error!=null){
                        swal_errorMsg(data.error);
                    }else{
                        $('#image_preview').remove();
                        $('#deleteImage').hide();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Brand logo was deleted successfully!',
                            showConfirmButton: false,
                            timer: 1000
                        })
                    }
                },
                error: function (data) {
                    swal_error();
                }
            });
        });

        //pipedrive setting
        $('body').on('click', '.setting', function () {
            $('#pipedrive_setting').modal('show');
            var brand_id = $(this).data('id');

            $.get("{{route('pipedeive-setting.index')}}" + '/' + brand_id + '/edit', function (data) {
                $('#savePipeBtn').val("edit");
                $('#pipedrive_setting').modal('show');
                $('#pipe_id').val(data.id);
                $('#url').val(data.url);
                $('#token').val(data.token);
            })

            $('#savePipeBtn').click(function (p) {
                p.preventDefault();
                var pipe_data = new FormData($('#pipe_form')[0]);

                pipe_data.append('brand_id', brand_id); 

                $.ajax({
                    data: pipe_data,
                    url: "{{ route('pipedeive-setting.store') }}",
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if(typeof data.error != 'undefined' && data.error!='' && data.error!=null){
                            swal_errorMsg(data.error);
                        }else{
                            $('#pipe_form').trigger("reset");
                            $('#pipedrive_setting').modal('hide');
                            swal_success();
                            table.draw();
                        }
                    },
                    error: function (data) {
                        swal_error();
                        $('#saveBtn').html('Save Changes');
                    }
                });
            })
        });

        //smtp setting
        $('body').on('click', '.smtp_setting', function () {
            $('#smtp_modal').modal('show');
            var brand_id = $(this).data('id');

            $.get("{{route('smtp-setting.index')}}" + '/' + brand_id + '/edit', function (data) {
                $('#smtp_saveBtn').val("edit");
                $('#smtp_modal').modal('show');
                $('#smtp_id').val(data.id);
                $('#host').val(data.host);
                $('#port').val(data.port);
                $('#username').val(data.username);
                $('#encryption').val(data.encryption);
                $('#from_email_address').val(data.from_email_address);
                $('#from_name').val(data.from_name);
            })

            $('#smtp_saveBtn').click(function (p) {
                p.preventDefault();
                var pipe_data = new FormData($('#smtp_form')[0]);

                pipe_data.append('brand_id', brand_id); 

                $.ajax({
                    data: pipe_data,
                    url: "{{ route('smtp-setting.store') }}",
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if(typeof data.error != 'undefined' && data.error!='' && data.error!=null){
                            swal_errorMsg(data.error);
                        }else{
                            $('#smtp_form').trigger("reset");
                            $('#smtp_modal').modal('hide');
                            swal_success();
                            table.draw();
                        }
                    },
                    error: function (data) {
                        swal_error();
                        $('#smtp_saveBtn').html('Save Changes');
                    }
                });
            })
        });
    });

</script>
@endpush
