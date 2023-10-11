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
                                    <th>Visa Type</th>
                                    <th>Credit Score</th>
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
                <h5 class="modal-title text-white" id="exampleModalLabel">Created Date Assement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="form" name="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <span>Email <span class="label-title">*</sapn></span>
                        <input type="email" name="email" class="form-control" id="email" value=""><br>
                        <span>Name <span class="label-title">*</sapn></span>
                        <input type="text" name="name" class="form-control" id="name" value="" readonly><br>
                        <span>Visa Type <span class="label-title">*</sapn></span>
                        <select name="visa_type" class="form-control" id="visa_type">
                            <option value="">Please select Visa Type</option>
                            @foreach($visatypes as $visatype)
                            <option value="{{$visatype->name}}">{{$visatype->name}}</option>
                            @endforeach
                        </select><br>
                        <span>Credit Score <span class="label-title">*</sapn></span>
                        <input type="text" name="credit_score" class="form-control" id="credit_score" value=""><br>
                        <span>Country <span class="label-title">*</sapn></span>
                        <input type="text" name="country" class="form-control" id="country" value=""><br>
                        <span>Education Level <span class="label-title">*</sapn></span>
                        <input type="text" name="education_level" class="form-control" id="education_level" value=""><br>
                        <span>Occupation<span class="label-title">*</sapn></span>
                        <input type="text" name="occupation" class="form-control" id="occupation" value=""><br>
                        <span>NOC Number </span>
                        <input type="text" name="noc_number" class="form-control" id="noc_number" value=""><br>
                        <span>Age <span class="label-title">*</sapn></span>
                        <input type="text" name="age" class="form-control" id="age" value=""><br>
                        <input type="hidden" name="id" id="id" value="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary font-weight-bold" id="saveBtn">Search</button>
            </div>
        </div>
    </div>
</div>

<!-- Attech File in mail Modal-->
<div class="modal fade" id="mail_modal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Sent Mail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="form" name="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="file" name="file" class="form-control" id="file" value=""><br>
                        <input type="hidden" name="id" id="mail_id" value="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary font-weight-bold mail" id="saveBtn">Sent Mail</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
@if (count($brands) > 1)
<script type="text/javascript" src="{{asset('js/brand-selector.js')}}">
</script>
@else
<script>
    var brands = <?php echo json_encode($brand); ?>; 
    $('#selectedBrandLabel').text(brands.name);
    var brand_name = brands.name;
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
            ajax: "{{ route('created_date_assement.index') }}",
            columns: [{
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'visa_type',
                    name: 'visa_type'
                },
                {
                    data: 'credit_score',
                    name: 'credit_score'
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
            $('#form').trigger("reset");
            $('#modal').modal('show');
        });
   
        // initialize btn save
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Save');
            $.ajax({
                // data: $('#form').serialize() + '&html=' + CKEDITOR.instances.ckeditor.getData(),
                data: $('#form').serialize(),
                url: "{{ route('created_date_assement.store') }}",
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

        $('body').on('change', '#email', function () {
            var email = $('#email').val();
            <?php if(count($brands) > 1) { ?>
                var brand_name = getCookie("selectedBrand");
            <?php } else { ?>
                brand_name
            <?php }?>
            $.ajax({
                data: { email :email,brand_name:brand_name},
                url: "{{ route('search_email') }}",
                type: "POST",
                success: function (data) {
                    if(typeof data.error != 'undefined' && data.error!='' && data.error!=null){
                        swal_errorMsg(data.error);
                    }else{
                        var responseData = JSON.parse(data.response);
                        var name = responseData.data.items[0].item.name;
                        console.log("Name: " + name);
                        $('#name').val(name);
                        table.draw();
                    }
                },
                error: function (data) {
                    swal_error();
                    $('#saveBtn').html('Save Changes');
                }
            });
        });

        $('body').on('click', '.sent_mail', function () {
            // $('#mail_modal').modal('show');
            var id = $(this).data('id');
            $('#mail_id').val(id);
        });

        $('body').on('click', '.mail', function () {
            
            var form_data = new FormData();
            var file = (typeof $('#file')[0].files[0] != 'undefined') ? $('#file')[0].files[0] : '';
            form_data.append("file", file);
            form_data.append('id', $('#mail_id').val());

            $.ajax({
                data: form_data,
                url: "{{ route('sent_mail') }}",
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
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
                    swal_error();
                    $('#saveBtn').html('Save Changes');
                }
            });
        });
    });

</script>


@endpush
