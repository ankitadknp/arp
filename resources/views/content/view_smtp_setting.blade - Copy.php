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
                                    <th>User Name</th>
                                    <th>Host</th>
                                    <th>Port</th>
                                    <th>Encryption</th>
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
                <h5 class="modal-title text-white" id="exampleModalLabel">Smtp Setting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="form" name="form" enctype="multipart/form-data">
                    <div class="form-group">

                        <input type="text" name="host" class="form-control" id="host" placeholder="Host"><br>
                        <input type="text" name="port" class="form-control" id="port" placeholder="Port"><br>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username"><br>
                        <input type="text" name="password" class="form-control" id="password" placeholder="Password"><br>
                        <select name="encryption" class="form-control" id="encryption">
                            <option value="">Please select encryption</option>
                            <option value="tls">tls</option>
                            <option value="ssl">ssl</option>
                        </select><br>
                        <var><input type="text" name="from_email_address" class="form-control" id="from_email_address" placeholder="From Email Address"><br>
                        <input type="text" name="from_name" class="form-control" id="from_name" placeholder="From Name"><br></var>
                       
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
                //'copy', 'excel', 'pdf'
            ],
            ajax: "{{ route('smtp-setting.index') }}",
            columns: [{
                    data: 'username',
                    name: 'username'
                },
                {
                    data: 'host',
                    name: 'host'
                },
                {
                    data: 'port',
                    name: 'port'
                },
                {
                    data: 'encryption',
                    name: 'encryption'
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
            $('#saveBtn').val("create smtp setting");
            $('#id').val('');
            $('#form').trigger("reset");
            $('#modal').modal('show');
        });
        // initialize btn edit
        $('body').on('click', '.edit', function () {
            var id = $(this).data('id');
            $.get("{{route('smtp-setting.index')}}" + '/' + id + '/edit', function (data) {
                $('#saveBtn').val("edit");
                $('#modal').modal('show');
                $('#id').val(data.id);
                $('#host').val(data.host);
                $('#port').val(data.port);
                $('#username').val(data.username);
                $('#encryption').val(data.encryption);
                $('#from_email_address').val(data.from_email_address);
                $('#from_name').val(data.from_name);
                $('#introduction').val(data.introduction);
            })
        });
        // initialize btn save
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Save');
            $.ajax({
                data: $('#form').serialize(),
                url: "{{ route('smtp-setting.store') }}",
                type: "POST",
                dataType: 'json',
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
                        url: "{{route('smtp-setting.store')}}" + '/' + id,
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
