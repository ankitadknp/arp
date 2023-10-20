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
                                    <th>Bio</th>
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
                <h5 class="modal-title text-white" id="exampleModalLabel">Legal Representative Profile</h5>
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
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" disabled><br>
                        <span>Password <span class="label-title">*</sapn></span>
                        <input type="text" name="password" class="form-control" placeholder="Password" id="password"><br>
                        <span>Bio <span class="label-title">*</sapn></span>
                        <textarea type="text" name="bio" class="form-control" id="bio" placeholder="Bio"></textarea><br>
                        <span>Brand <span class="label-title">*</sapn></span>
                        <select name="brand_id[]" class="form-control" id="brand_id" multiple>
                            <option value="">Please Select Brand</option>
                            @foreach($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select><br><br>
                        <span>Linkedin Id <span class="label-title">*</sapn></span>
                        <input type="text" name="linkedin_id" class="form-control" id="linkedin_id" placeholder="Linkedin Id"><br>
                        <span>License Number <span class="label-title">*</sapn></span>
                        <input type="text" name="license_number" class="form-control" id="license_number" placeholder="License Number"><br>
                        <span>CBA Member Number <span class="label-title">*</sapn></span>
                        <input type="text" name="cba_number" class="form-control" id="cba_number" placeholder="CBA Member Number"><br>
                        <input type="hidden" name="id" id="id" value="{{$user_id}}">
                        <span>Signature Photo <span class="label-title">*</sapn></span><br>
                        <input required type="file" name="signature_photo" class="form-control" id="signature_photo"><br>
                        <span>Photo <span class="label-title">*</sapn></span><br>
                        <input required type="file" name="photo" class="form-control" id="photo" placeholder="Photo"><br>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $('#brand_id').select2();

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
                //'copy', 'excel', 'pdf'
            ],
            ajax: "{{ route('representative_profile.index') }}",
            columns: [{
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'bio',
                    name: 'bio'
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
            var id = $('#id').val();
            $('#image_preview').remove();
            $('#signature_preview').remove();
            $('#signature_delete').hide();
            $('#photo_delete').hide();
            $('#form').trigger("reset");
            $('#modal').modal('show');

            $.get("{{route('representative_profile.index')}}" + '/' + id + '/edit', function (data) {
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#bio').val(data.bio);
                $('#signature_photo').after(data.signature_photo);
                $('#photo').after(data.photo);
                $('#linkedin_id').val(data.linkedin_id);
                $('#email').val(data.email);
                $('#license_number').val(data.license_number);
                $('#cba_number').val(data.cba_number);
                 var selectedBrandIds = data.brand_id.split(',');
                $('#brand_id option').each(function () {
                    if (selectedBrandIds.includes($(this).val())) {
                        $(this).prop('selected', true);
                    }
                });
                $('#brand_id').trigger('change');
            })
        });
      
        // initialize btn save
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Save');
            var form_data = new FormData();
            var photo = (typeof $('#photo')[0].files[0] != 'undefined') ? $('#photo')[0].files[0] : '';
            form_data.append("photo", photo);
            var signature_photo = (typeof $('#signature_photo')[0].files[0] != 'undefined') ? $('#signature_photo')[0].files[0] : '';
            form_data.append("signature_photo", signature_photo);
            form_data.append('name', $('#name').val());
            form_data.append('email', $('#email').val());
            form_data.append('password', $('#password').val());
            form_data.append('bio', $('#bio').val());
            var selectedBrand = $('#brand_id').val();
            form_data.append('brand_id', selectedBrand);
            form_data.append('linkedin_id', $('#linkedin_id').val());
            form_data.append('license_number', $('#license_number').val());
            form_data.append('cba_number', $('#cba_number').val());
            form_data.append('id', $('#id').val());
            $.ajax({
                data: form_data,
                url: "{{ route('representative_profile.store') }}",
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

        $('body').on('click', '.signature_delete', function () {
            var id = $(this).data('id');
            $.ajax({
                data: {id:id},
                url: "{{ route('signature_delete') }}",
                type: "POST",
                success: function (data) {
                    if(typeof data.error != 'undefined' && data.error!='' && data.error!=null){
                        swal_errorMsg(data.error);
                    }else{
                        $('#image_preview').remove();
                        $('#signature_delete').hide();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Signature was deleted successfully!',
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

        $('body').on('click', '.photo_delete', function () {
            var id = $(this).data('id');
            $.ajax({
                data: {id:id},
                url: "{{ route('photo_delete') }}",
                type: "POST",
                success: function (data) {
                    if(typeof data.error != 'undefined' && data.error!='' && data.error!=null){
                        swal_errorMsg(data.error);
                    }else{
                        $('#image_preview').remove();
                        $('#photo_delete').hide();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Photo was deleted successfully!',
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
