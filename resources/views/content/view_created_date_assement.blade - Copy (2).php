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
                            <span>City <span class="label-title">*</sapn></span>
                            <input type="text" name="city" class="form-control" id="city" value=""><br>
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
                            <span>Conclusion <span class="label-title">*</sapn></span>
                            <textarea name="conclusion" class="form-control" id="conclusion" placeholder="Conclusion"></textarea><br>
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

        $('#visa_type_id').select2();

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
                $('#modal').modal('show');
                $('.crm_data').show();
                $('#email').prop('disabled', true);
                $('#saveBtn').show();
                $('#search').hide();
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#credit_score').val(data.credit_score);
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
            })
        });
   
        // initialize btn save
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            var form_data = new FormData($('#form')[0]);
            form_data.append('email', $('#email').val());
            form_data.append('name', $('#name').val());
            form_data.append('credit_score', $('#credit_score').val());
            form_data.append('recommended_visa_type', $('#recommended_visa_type').val());
            form_data.append('language_code', $('#language_code').val());
            form_data.append('country', $('#country').val());
            form_data.append('education_level', $('#education_level').val());
            form_data.append('occupation', $('#occupation').val());
            form_data.append('age', $('#age').val());
            form_data.append('case_number', $('#case_number').val());
            var selectedLanguages = $('#visa_type_id').val();
            form_data.append('visa_type_id', selectedLanguages.join(','));
            $.ajax({
                // data: $('#form').serialize() + '&html=' + CKEDITOR.instances.ckeditor.getData(),
                data: form_data,
                url: "{{ route('created_date_assement.store') }}",
                type: "POST",
                processData: false,  // Important for FormData
                contentType: false,  // Important for FormData
                success: function (data) {
                    if(typeof data.error != 'undefined' && data.error!='' && data.error!=null){
                        swal_errorMsg(data.error);
                    }else{
                        // $('#form').trigger("reset"); 
                        $('#modal').modal('hide');
                        swal_success();
                        table.draw();
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
                        // table.draw();
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
       
    });

</script>


@endpush
