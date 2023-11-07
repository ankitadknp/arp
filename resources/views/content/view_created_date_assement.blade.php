<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>{{$title}}</h2>
                <div class="d-flex flex-row-reverse"><button
                    class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder" id="createNew"><i
                        class="fas fa-search"></i>Search</button>
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table" id="table">
                            <thead class="font-weight-bold text-center">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <!-- <th>Visa Type</th> -->
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
                <h5 class="modal-title text-white" id="exampleModalLabel">Create Assement PDF</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="form" name="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="search_email" class="form-control" id="search_email" value=""><br>
                        <div class="crm_email">
                            <span>Email <span class="label-title">*</sapn></span>
                            <input type="email" name="email" class="form-control" id="email" value=""><br> 
                        </div>
                        <div class="crm_data" style="display: none;">
                            <span>Name <span class="label-title">*</sapn></span>
                            <input type="text" name="name" class="form-control" id="name" value="" ><br>
                            <span>Languages <span class="label-title">*</sapn></span><br>
                            <select name="language_code" class="form-control" id="language_code">
                            <option value="">Please select Language</option>
                            @foreach($languages as $language)
                            <option value="{{$language->code}}">{{$language->name}}</option>
                            @endforeach
                            </select><br>
                            <span>Visa Type <span class="label-title">*</sapn></span>
                            <select name="visa_type_id[]" class="form-control" id="visa_type_id" multiple>
                                @foreach($visatypes as $visatype)
                                <option value="{{$visatype->id}}">{{$visatype->name}}</option>
                                @endforeach
                            </select><br><br>
                            <span>Recommended Visa Type <span class="label-title">*</sapn></span>
                            <select name="recommended_visa_type" class="form-control" id="recommended_visa_type">
                                <option value="">Please select Recommended Visa Type</option>
                                @foreach($visatypes as $visatype)
                                <option value="{{$visatype->id}}">{{$visatype->name}}</option>
                                @endforeach
                            </select><br>
                            <span>Credit Score <span class="label-title">*</sapn></span>
                            <input type="text" name="credit_score" class="form-control" id="credit_score" value=""><br>
                            <span>National Occupational Classification (NOC) <span class="label-title">*</sapn></span>
                            <input type="text" name="noc" class="form-control" id="noc" value=""><br>
                            <span>Teer Category <span class="label-title">*</sapn></span>
                            <input type="text" name="teer_category" class="form-control" id="teer_category" value=""><br>
                            <span style="display:none;">City <span class="label-title">*</span></span>
                            <input style="display:none;" type="text" name="city" class="form-control" id="city" value=""><br>
                            <span>Country <span class="label-title">*</sapn></span>
                            <input type="text" name="country" class="form-control" id="country" value=""><br>
                            <span>Education Level <span class="label-title">*</sapn></span>
                            <input type="text" name="education_level" class="form-control" id="education_level" value=""><br>
                            <span>Occupation <span class="label-title">*</sapn></span>
                            <input type="text" name="occupation" class="form-control" id="occupation" value=""><br>
                            <span>Case Number <span class="label-title">*</sapn></span>
                            <input type="text" name="case_number" class="form-control" id="case_number" value=""><br>
                            <span>Age <span class="label-title">*</sapn></span>
                            <input type="text" name="age" class="form-control" id="age" value=""><br>
                            <span>Phone No <span class="label-title">*</sapn></span>
                            <input type="text" name="phone_no" class="form-control" id="phone_no" value="" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'><br>
                            <span style="display:none;">Conclusion <span class="label-title">*</span></span>
                            <textarea style="display:none;" name="conclusion" class="form-control" id="conclusion" placeholder="Conclusion">-</textarea><br>
                            <div id="salaryInputs">
                            </div>
                            <input type="hidden" name="id" id="id" value="">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary font-weight-bold" id="saveBtn" style="display: none;">Save</button>
                <button type="button" class="btn btn-primary font-weight-bold" id="search">Search</button><br> 
            </div>
        </div>
    </div>
</div>

<!-- View Modal-->
<div class="modal fade" id="view_modal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">View Create Assement PDF</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="view_form" name="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="search_email" class="form-control" id="search_email" value=""><br>
                        <span>Email :</span>
                        <input  name="email" class="form-control" id="view_email" value=""><br> 
                        <span>Name :</span>
                        <input type="text" name="name" class="form-control" id="v_name" value="" ><br>
                        <span>Languages :</span><br>
                        <select name="language_code" class="form-control" id="v_language_code">
                        <option value="">Please select Language</option>
                        @foreach($languages as $language)
                        <option value="{{$language->code}}">{{$language->name}}</option>
                        @endforeach
                        </select><br>
                        <span>Visa Type :</span>
                        <select name="visa_type_id[]" class="form-control" id="v_visa_type_id" multiple>
                            @foreach($visatypes as $visatype)
                            <option value="{{$visatype->id}}">{{$visatype->name}}</option>
                            @endforeach
                        </select><br><br>
                        <span>Recommended Visa Type :</span>
                        <select name="recommended_visa_type" class="form-control" id="v_recommended_visa_type">
                            <option value="">Please select Recommended Visa Type</option>
                            @foreach($visatypes as $visatype)
                            <option value="{{$visatype->id}}">{{$visatype->name}}</option>
                            @endforeach
                        </select><br>
                        <span>Credit Score :</span>
                        <input type="text" name="credit_score" class="form-control" id="v_credit_score" value=""><br>
                        <span>National Occupational Classification (NOC) :</span>
                        <input type="text" name="noc" class="form-control" id="v_noc" value=""><br>
                        <span>Teer Category :</span>
                        <input type="text" name="teer_category" class="form-control" id="v_teer_category" value=""><br>
                        <span style="display:none;">City :</span>
                        <input style="display:none;" type="text" name="city" class="form-control" id="v_city" value=""><br>
                        <span>Country :</span>
                        <input type="text" name="country" class="form-control" id="v_country" value=""><br>
                        <span>Education Level :</span>
                        <input type="text" name="education_level" class="form-control" id="v_education_level" value=""><br>
                        <span>Occupation :</span>
                        <input type="text" name="occupation" class="form-control" id="v_occupation" value=""><br>
                        <span>Case Number :</span>
                        <input type="text" name="case_number" class="form-control" id="v_case_number" value=""><br>
                        <span>Age :</span>
                        <input type="text" name="age" class="form-control" id="v_age" value=""><br>
                        <span>Phone No :</span>
                        <input type="text" name="phone_no" class="form-control" id="v_phone_no" value="" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'><br>
                        <span style="display:none;">Conclusion :</span>
                        <textarea style="display:none;" name="conclusion" class="form-control" id="v_conclusion" placeholder="Conclusion"></textarea><br>
                        <input type="hidden" name="id" id="v_id" value="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="loader-overlay" class="loader-overlay">
    <div class="loader">
        <!-- You can use any loading animation here, e.g., a spinner -->
        <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

@if (count($brands) > 1)
<script type="text/javascript" src="{{asset('js/brand-selector.js')}}">
</script>
@else
<script>
    var brands = <?php echo json_encode($brand); ?>; 
    $('#selectedBrandLabel').text(brands.name);
</script>
@endif

<script>
    $('document').ready(function () {
        var bName = $('#selectedBrandLabel').text()

        if (bName.trim() == "" ) {
            window.location.href = "{{ route('logout') }}";
        }

        $('#visa_type_id').select2();
        var isEditMode = false;

        var salaryInputsContainer = document.getElementById("salaryInputs");
        $('#visa_type_id').on('change', function() {
            salaryInputsContainer.innerHTML = "";

            $(this).find('option:selected').each(function () {
                var selectedValue = $(this).val();
                var selectedName = $(this).text();

                var nameWithoutSpaces = selectedName.replace(/\s/g, '_'); // Remove spaces

                var inputField = document.createElement("div");
                inputField.innerHTML = `
                    <label for="visa_salary_${selectedValue}">${selectedName} Salary:</label>
                    <input type="file" name="${nameWithoutSpaces}${selectedValue}_salary[]" id="${nameWithoutSpaces}_salary" class="form-control" multiple>
                    <div id="image_preview_${selectedValue}">
                    </div>
                `;

                salaryInputsContainer.appendChild(inputField);
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

        // csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#recommended_visa_type').on('change', function() {
            var selectedValue = $(this).val();
            var selectedVisaTypes = $('#visa_type_id').val();

            if (selectedValue && selectedVisaTypes) {
                var selectedVisaTypesArray = String(selectedVisaTypes).split(',');// Convert to an array
                
                if (selectedValue && Array.isArray(selectedVisaTypesArray)) {
                    if (selectedVisaTypesArray.includes(selectedValue)) {
                    } else {
                        Swal.fire({
                            position: 'centered',
                            icon: 'error',
                            title: 'Recommended Visa Type does not match selected Visa Types',
                            showConfirmButton: true,
                        })
                    }
                }
            } 
        });

        var table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            ordering: false,
            dom: 'Bfrtip',
            buttons: [
            ],
            language: {
                emptyTable: "No data available in table"
            },

            ajax: {
                url: "{{ route('search_list') }}",
                type: "POST",
                data: function(data) {
                data.search_email_filters= $('#email').val()
                },
            
            },
            columns: [{
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                // {
                //     data: 'visa_type',
                //     name: 'visa_type'
                // },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
        
        // initialize btn add
        $('#createNew').click(function () {
            $('#id').val('');
            $('#form').trigger("reset");
            $('#modal').modal('show');
            $('.crm_data').hide();
            $('#saveBtn').hide();
            $('#search').show();
            $('#email').prop('disabled', false);
            $('#visa_type_id').val(null).trigger('change');
        });

        // initialize btn edit
        $('body').on('click', '.edit', function () {
            var id = $(this).data('id');
     
            $.get("{{route('created_date_assement.index')}}" + '/' + id + '/edit', function (data) {
                isEditMode = true;
                $('#modal').modal('show');
                $('.crm_data').show();
                $('#email').prop('disabled', true);
                $('#saveBtn').show();
                $('#search').hide();
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#credit_score').val(data.credit_score);
                $('#noc').val(data.noc);
                $('#teer_category').val(data.teer_category);
                $('#country').val(data.country);
                $('#education_level').val(data.education_level);
                $('#occupation').val(data.occupation);
                $('#age').val(data.age);
                $('#case_number').val(data.case_number);
                $('#phone_no').val(data.phone_no);
                $('#city').val(data.city);
                $('#recommended_visa_type').val(data.recommended_visa_type);
                $('#language_code').val(data.language_code);
                $('#conclusion').val(data.conclusion);

                var selectedVisaIds = data.visa_type_id.split(',');

                $('#visa_type_id option').each(function () {
                    if (selectedVisaIds.includes($(this).val())) {
                        $(this).prop('selected', true);
                    }
                });

                $('#visa_type_id').trigger('change');

                var imagesByVisaType = {};

                // Assuming data.image_data is an array of image objects
                data.image_data.forEach(function (image) {
                    if (!imagesByVisaType[image.visa_type_id]) {
                        imagesByVisaType[image.visa_type_id] = [];
                    }
                    imagesByVisaType[image.visa_type_id].push(image);
                });


                for (var i = 0; i < selectedVisaIds.length; i++) {
                    var selectedValue = selectedVisaIds[i];
                    var baseUrl = '{{ asset("") }}';

                    var containerId = `image_preview_${selectedValue}`;
                    var container = document.getElementById(containerId);

                    if (container) {
                        var imagesForCurrentVisaType = imagesByVisaType[selectedValue];
                        if (imagesForCurrentVisaType) {
                            imagesForCurrentVisaType.forEach(function (image) {
                                var imageElement = document.createElement('img');
                                var fullImageUrl = baseUrl + image.value;
                                imageElement.src = fullImageUrl;
                                imageElement.width = 100; // Set the width here
                                imageElement.height = 100;
                                imageElement.style.marginRight = '10px';
                                container.appendChild(imageElement);
                            });
                        }
                    }
                }
            })
        });

        // initialize btn save
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            var form_data = new FormData($('#form')[0]);
            form_data.append('email', $('#email').val());
            form_data.append('name', $('#name').val());
            form_data.append('credit_score', $('#credit_score').val());
            form_data.append('teer_category', $('#teer_category').val());
            form_data.append('noc', $('#noc').val());
            form_data.append('recommended_visa_type', $('#recommended_visa_type').val());
            form_data.append('language_code', $('#language_code').val());
            form_data.append('country', $('#country').val());
            form_data.append('education_level', $('#education_level').val());
            form_data.append('occupation', $('#occupation').val());
            form_data.append('age', $('#age').val());
            form_data.append('case_number', $('#case_number').val());
            var selectedLanguages = $('#visa_type_id').val();
            form_data.append('visa_type_id', selectedLanguages.join(','));

            $(this).find('option:selected').each(function () {
                var selectedName = $(this).text();
                var visa_id = $(this).val();
                var nameWithoutSpaces = selectedName.replace(/\s/g, '_'); // Remove spaces

                // Access the dynamically generated input field by name
                var inputFieldName = nameWithoutSpaces+visa_id + '_salary[]';
                var inputValue = $(`input[name="${inputFieldName}"]`).val();

                // Append the value to the FormData object
                form_data.append(inputFieldName, inputValue);
            });

            $.ajax({
                data: form_data,
                url: "{{ route('created_date_assement.store') }}",
                type: "POST",
                processData: false,  // Important for FormData
                contentType: false,  // Important for FormData
                success: function (data) {
                    if(typeof data.error != 'undefined' && data.error!='' && data.error!=null){
                        swal_errorMsg(data.error);
                    }else{
                        $('#modal').modal('hide');
                        swal_success();
                        table.draw();
                        location.reload();
                    }
                },
                error: function (data) {
                    swal_error();
                }
            });
        });

        $('#search').click(function (e) {
            var email = $('#email').val();
            
            var selectedBrandLabel = document.getElementById("selectedBrandLabel");
            if (selectedBrandLabel) {
                var brand_name = selectedBrandLabel.textContent;
            } else {
                Swal.fire({
                    position: 'centered',
                    icon: 'error',
                    title: 'Brand name is empty',
                    showConfirmButton: true,
                })
            }
            $.ajax({
                data: { email :email,brand_name:brand_name},
                url: "{{ route('search_email') }}",
                type: "POST",
                success: function (data) {
                    if(typeof data.error != 'undefined' && data.error!='' && data.error!=null){
                        swal_errorMsg(data.error);
                    }else{
                        // var responseData = JSON.parse(data.na);
                        // var name = responseData.data.items[0].item.name;
                        console.log("search email data: " + data);
                        $('.crm_data').show();
                        $('#name').val(data.name);
                        $('#country').val(data.country);
                        $('#education_level').val(data.education_level);
                        $('#occupation').val(data.occupation);
                        $('#age').val(data.age);
                        $('#case_number').val(data.case_number);
                        $('#phone_no').val(data.phone_no);
                        $('#saveBtn').show();
                        $('#search').hide();
                    }
                },
                error: function (data) {
                    swal_error();
                }
            });
        });

        $('body').on('click', '.sent_mail', function () {

            var id = $(this).data('id');
            var selectedBrandLabel = document.getElementById("selectedBrandLabel");
            var loaderOverlay = $('#loader-overlay'); // Select the loader overlay

            if (selectedBrandLabel) {
                var brandName = selectedBrandLabel.textContent;
            } else {
                Swal.fire({
                    position: 'centered',
                    icon: 'error',
                    title: 'Brand name is empty',
                    showConfirmButton: true,
                })
            }

            loaderOverlay.show();  // Show the loader
            $.ajax({
                data: {id:id,brandName:brandName},
                url: "{{ route('sent_mail') }}",
                type: "POST",
                success: function (data) {
                    loaderOverlay.hide();
                    if(typeof data.error != 'undefined' && data.error!='' && data.error!=null){
                        swal_errorMsg(data.error);
                    }else{
                        $('#mail_modal').modal('hide');
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Sent Mail successfully',
                            showConfirmButton: false,
                            timer: 1000
                        })
                        table.draw();
                    }
                },
                error: function (data) {
                    loaderOverlay.hide();
                    swal_error();
                    $('#saveBtn').html('Save Changes');
                }
            });
        });

        $('body').on('click', '.view', function () {
            var id = $(this).data('id');
     
            $.get("{{route('created_date_assement.index')}}" + '/' + id + '/edit', function (data) {
                $('#view_modal').modal('show');
                $('#view_email').prop('disabled', true);
                $('#v_name').prop('disabled', true);
                $('#v_credit_score').prop('disabled', true);
                $('#v_noc').prop('disabled', true);
                $('#v_teer_category').prop('disabled', true);
                $('#v_country').prop('disabled', true);
                $('#v_education_level').prop('disabled', true);
                $('#v_occupation').prop('disabled', true);
                $('#v_age').prop('disabled', true);
                $('#v_case_number').prop('disabled', true);
                $('#v_phone_no').prop('disabled', true);
                $('#v_city').prop('disabled', true);
                $('#v_recommended_visa_type').prop('disabled', true);
                $('#v_language_code').prop('disabled', true);
                $('#v_conclusion').prop('disabled', true);
                $('#v_visa_type_id').prop('disabled', true);

                $('#v_id').val(data.id);
                $('#v_name').val(data.name);
                $('#view_email').val(data.email);
                $('#v_credit_score').val(data.credit_score);
                $('#v_teer_category').val(data.teer_category);
                $('#v_noc').val(data.noc);
                $('#v_country').val(data.country);
                $('#v_education_level').val(data.education_level);
                $('#v_occupation').val(data.occupation);
                $('#v_age').val(data.age);
                $('#v_case_number').val(data.case_number);
                $('#v_phone_no').val(data.phone_no);
                $('#v_city').val(data.city);
                $('#v_recommended_visa_type').val(data.recommended_visa_type);
                $('#v_language_code').val(data.language_code);
                $('#v_conclusion').val(data.conclusion);

                var selectedVisaIds = data.visa_type_id.split(',');

                $('#v_visa_type_id option').each(function () {
                    if (selectedVisaIds.includes($(this).val())) {
                        $(this).prop('selected', true);
                    }
                });

                $('#v_visa_type_id').trigger('change');
            })
        });
    });

</script>


@endpush
