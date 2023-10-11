<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>{{$title}}</h2>
                <div class="d-flex flex-row-reverse"><button
                        class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder" id="createNew"><i
                            class="fas fa-edit"></i>Edit</button></div>
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
                <h5 class="modal-title text-white" id="exampleModalLabel">Brand Setting</h5>
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
                        <input type="text" name="email" class="form-control" id="email" placeholder="Email"><br>
                        <span>Phone Number <span class="label-title">*</sapn></span>
                        <input type="text" name="phone_no" class="form-control" id="phone_no" placeholder="Phone Number" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'><br>
                        <span>Website <span class="label-title">*</sapn></span>
                        <input type="text" name="website" class="form-control" id="website" placeholder="Website"><br>
                        <span>Logo <span class="label-title">*</sapn></span><br>
                        <input required type="file" name="logo" class="form-control" id="logo" placeholder="Logo"><br>
                        <span>Languages <span class="label-title">*</sapn></span><br>
                        <select name="language_id[]" class="form-control" id="language_id" multiple>
                            @foreach($languages as $language)
                            <option value="{{$language->code}}">{{$language->name}}</option>
                            @endforeach
                        </select><br><br>
                        <span id="aboutLabel"></span>
                        <textarea class="form-control ckeditor-field" name="about_en" id="ckeditor_en" placeholder="About English"></textarea><br>
                        <span id="FrenchLabel"></span>
                        <textarea class="form-control ckeditor-field" name="about_fr" id="ckeditor_fr" placeholder="About French"></textarea>
                        <!-- <span>About Us <span class="label-title">*</sapn></span>
                        <textarea type="text" name="introduction" class="form-control" id="ckeditor" placeholder="Introduction"></textarea><br> -->
                        <input type="hidden" name="id" id="id" value="{{$brand_setting_id}}">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    var brand_name = <?php echo json_encode($menu_brand); ?>; 
    $('#selectedBrandLabel').text(brand_name.name);
</script>
<script>
     CKEDITOR.replace('ckeditor_en', {
        filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('ckeditor_fr', {
        filebrowserUploadMethod: 'form'
    });
    $('document').ready(function () {

        $('#language_id').select2();

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
                title: msgs,
                showConfirmButton: true,
            })
        }
        // table serverside
        var table = $('#table').DataTable({
            processing: false,
            serverSide: true,
            ordering: false,
            searching: false,
            dom: 'Bfrtip',
            buttons: [
                //'copy', 'excel', 'pdf'
            ],
            ajax: "{{ route('brands_setting.index') }}",
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
            ]
        });
        
        // csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#language_id').on('change', function () {
            var selectedLanguages = $(this).val();
            $('.ckeditor-field').hide(); // Hide all CKEditor fields
            var label = $('#aboutLabel');
            var FrenchLabel = $('#FrenchLabel');
            // Initialize CKEditor for the selected languages
            selectedLanguages.forEach(function (language) {
                $('#ckeditor_' + language).show();

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
                // Hide the CKEditor field
                $('#ckeditor_' + language).hide();

                if (language.includes('en')) {
                    label.text('');
                } else if (language.includes('fr')) {
                    FrenchLabel.text('');
                }

                // Check if CKEditor instance exists before attempting to destroy it
                if (typeof CKEDITOR.instances['ckeditor_' + language] !== 'undefined') {
                    CKEDITOR.instances['ckeditor_' + language].destroy();
                }
            });
        });

        // initialize btn add
        $('#createNew').click(function () {
            $('#saveBtn').val("create brand");
            var id = $('#id').val();
            $('#image_preview').remove();
            $('#language_id').val(null).trigger('change');
            $('#form').trigger("reset");
            $('#modal').modal('show');

            $.get("{{route('brands_setting.index')}}" + '/' + id + '/edit', function (data) {
                console.log(data);
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#phone_no').val(data.phone_no);
                $('#website').val(data.website);
                $('#language_id').val(null);
             
                var selectedLanguageIds = data.language_id.split(',');

                // Select the options with matching values
                $('#language_id option').each(function () {
                    if (selectedLanguageIds.includes($(this).val())) {
                        $(this).prop('selected', true);
                    }
                });

                // Refresh the Select2 dropdown (if you're using Select2)
                $('#language_id').trigger('change');

                $('#logo').after(data.logo);

                selectedLanguageIds.forEach(function (languageId) {
                    // Show the CKEditor field for this language
                    $('#ckeditor_' + languageId).show();

                    // Initialize CKEditor if it's not already initialized
                    if (typeof CKEDITOR.instances['ckeditor_' + languageId] === 'undefined') {
                        CKEDITOR.replace('ckeditor_' + languageId, {
                            filebrowserUploadMethod: 'form'
                        });
                    }
                    // Set the data for CKEditor for this language based on data received from the server
                    CKEDITOR.instances['ckeditor_' + languageId].setData(data['about_' + languageId]);
                });

                // Hide and destroy CKEditor for languages that are not selected
                $('#language_id option').each(function () {
                    if (!selectedLanguageIds.includes($(this).val())) {
                        var languageId = $(this).val();
                        // Hide the CKEditor field for this language
                        $('#ckeditor_' + languageId).hide();
                        // If CKEditor for this language is initialized, destroy it
                        if (typeof CKEDITOR.instances['ckeditor_' + languageId] !== 'undefined') {
                            CKEDITOR.instances['ckeditor_' + languageId].destroy();
                        }
                    }
                });
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
            form_data.append('website', $('#website').val());
            form_data.append('phone_no', $('#phone_no').val());
            form_data.append('id', $('#id').val());
            var selectedLanguages = $('#language_id').val();
            form_data.append('language_id', selectedLanguages.join(','));

            if (selectedLanguages.includes('en')) {
                form_data.append('about_en', CKEDITOR.instances.ckeditor_en.getData());
            }

            // Check if CKEditor for French exists and get data
            if (selectedLanguages.includes('fr')) {
                form_data.append('about_fr', CKEDITOR.instances.ckeditor_fr.getData());
            }

            $.ajax({
                data: form_data,
                url: "{{ route('brands_setting.store') }}",
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

        $('body').on('click', '.brand_delete', function () {
            var id = $(this).data('id');
            $.ajax({
                data: {id:id},
                url: "{{ route('brand_delete') }}",
                type: "POST",
                success: function (data) {
                    if(typeof data.error != 'undefined' && data.error!='' && data.error!=null){
                        alert('id');
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
    });

</script>
@endpush
