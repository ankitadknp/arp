<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="row">
                @if (Auth::user()->level == 0 )
                <div class="col-lg-4">
                    <!--begin::Mixed Widget 1-->
                    <div class="card card-custom bg-gray-100 card-stretch gutter-b">
                        <div class="card-body p-0 position-relative overflow-hidden">
                            <div id="" class="card-rounded-bottom bg-danger" style="height: 200px"></div>
                            <div class="card-spacer mt-n25">
                                <!--begin::Row-->
                                <div class="row m-0">
                                    <div class="col bg-light-primary px-6 py-8 rounded-xl mb-7">
                                        <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <a href="{{route('users.index')}}" class="text-primary font-weight-bold font-size-h6 mt-2"><b>{{$count_user}}</b> Users</a>
                                    </div>
                                </div>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <div class="row m-0">
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 1-->
                </div>
                <div class="col-lg-4">
                    <!--begin::Mixed Widget 1-->
                    <div class="card card-custom bg-gray-100 card-stretch gutter-b">
                        <div class="card-body p-0 position-relative overflow-hidden">
                            <div id="" class="card-rounded-bottom bg-danger" style="height: 200px"></div>
                            <div class="card-spacer mt-n25">
                                <div class="row m-0">
                                    <div class="col bg-light-primary px-6 py-8 rounded-xl mb-7">
                                        <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                                            <svg class="svg-icon brand_color" style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M857.93792 516.827136 453.464064 110.406656l-389.41696 1.486848 0.587776 360.107008 418.9696 420.953088c26.268672 26.421248 68.5312 26.765312 94.364672 0.799744l280.76032-282.098688C884.580352 585.6768 884.227072 543.22688 857.93792 516.827136L857.93792 516.827136zM232.188928 344.23808c-36.553728 0-66.177024-29.766656-66.177024-66.494464 0-36.721664 29.623296-66.492416 66.177024-66.492416 36.542464 0 66.16576 29.766656 66.16576 66.492416C298.354688 314.466304 268.727296 344.23808 232.188928 344.23808L232.188928 344.23808zM232.188928 344.23808M605.950976 919.3984c-8.82688 0-17.748992-1.608704-26.331136-4.93056l4.12672-10.671104c22.515712 8.695808 47.852544 3.4816 64.54272-13.2864l280.748032-282.098688c23.596032-23.699456 23.231488-62.613504-0.78848-86.751232L525.448192 116.934656l-46.276608 0.176128-0.049152-11.447296L530.194432 105.472l1.687552 1.690624 404.476928 406.424576c28.45696 28.588032 28.802048 74.754048 0.796672 102.894592L656.403456 898.589696C642.886656 912.167936 624.64512 919.3984 605.950976 919.3984L605.950976 919.3984zM605.950976 919.3984"  /></svg>
                                        </span>
                                        <a href="{{route('brands.index')}}" class="text-primary font-weight-bold font-size-h6 mt-2"><b>{{$count_brand}}</b> Brand</a>
                                    </div>
                                </div>
                                <div class="row m-0">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!--begin::Mixed Widget 1-->
                    <div class="card card-custom bg-gray-100 card-stretch gutter-b">
                        <div class="card-body p-0 position-relative overflow-hidden">
                            <div id="" class="card-rounded-bottom bg-danger" style="height: 200px"></div>
                            <div class="card-spacer mt-n25">
                                <div class="row m-0">
                                    <div class="col bg-light-primary px-6 py-8 rounded-xl mb-7">
                                        <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                        </span>
                                        <a href="{{route('representative.index')}}" class="text-primary font-weight-bold font-size-h6 mt-2"><b>{{$representative_cnt}}</b> Representative</a>
                                    </div>
                                </div>
                                <div class="row m-0">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @elseif (Auth::user()->level == 1)
                <div class="col-lg-4">
                    <!--begin::Mixed Widget 1-->
                    <div class="card card-custom bg-gray-100 card-stretch gutter-b">
                        <div class="card-body p-0 position-relative overflow-hidden">
                            <div id="" class="card-rounded-bottom bg-danger" style="height: 200px"></div>
                            <div class="card-spacer mt-n25">
                                <div class="row m-0">
                                    <div class="col bg-light-primary px-6 py-8 rounded-xl mb-7">
                                        <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <a href="{{route('users.index')}}" class="text-primary font-weight-bold font-size-h6 mt-2"><b>{{$count_user}}</b> Users</a>
                                    </div>
                                </div>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <div class="row m-0">
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 1-->
                </div>
                <div class="col-lg-4">
                    <div class="card card-custom bg-gray-100 card-stretch gutter-b">
                        <div class="card-body p-0 position-relative overflow-hidden">
                            <div id="" class="card-rounded-bottom bg-danger" style="height: 200px"></div>
                            <div class="card-spacer mt-n25">
                                <div class="row m-0">
                                    <div class="col bg-light-primary px-6 py-8 rounded-xl mb-7">
                                        <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="48px" height="48px" fill-rule="nonzero"><g fill="#3d99ff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.33333,5.33333)"><path d="M8.5,9c-3.584,0 -6.5,2.916 -6.5,6.5v17c0,3.584 2.916,6.5 6.5,6.5h31c3.584,0 6.5,-2.916 6.5,-6.5v-17c0,-3.584 -2.916,-6.5 -6.5,-6.5zM28.1543,18.5c1.285,0 2.59961,0.51367 2.59961,0.51367l-0.44922,2.31055c0,0 -1.02683,-0.67578 -1.92383,-0.67578c-1.381,0 -1.86328,0.45259 -1.86328,1.05859c0,1.186 3.85056,1.37806 3.85156,4.03906c0,2.214 -2.75905,3.75391 -4.74805,3.75391c-1.989,0 -3.01758,-0.60742 -3.01758,-0.60742l0.48047,-2.2168c0,0 1.05806,0.60938 2.66406,0.60938c1.602,0 1.82813,-0.67294 1.82813,-0.96094c0,-1.699 -3.84961,-1.24873 -3.84961,-4.55273c0,-1.828 1.50774,-3.27148 4.42773,-3.27148zM19.77148,18.71094h2.80859l-1.67969,10.46094h-2.77539zM34.85156,18.71094h2.91992l2.15039,10.46094h-2.52734l-0.29883,-1.49414h-3.47461l-0.57031,1.49414h-2.75586zM15.70313,18.71289h2.9707l-4.22461,10.45898h-3.05859l-2.22852,-8.4707c0,0 2.34697,1.18964 3.79297,4.43164c0.061,0.394 0.20703,1.02734 0.20703,1.02734zM6.08008,18.73438h4.29492c1.098,0 1.51953,1.0293 1.51953,1.0293l0.93359,4.74609c-1.274,-4.104 -6.74805,-5.77539 -6.74805,-5.77539zM35.90234,21.72656l-1.51172,3.95313h2.30273z"></path></g></g></svg>
                                        </span>
                                        <a href="{{route('visa-type.index')}}" class="text-primary font-weight-bold font-size-h6 mt-2"><b>{{$visa_cnt}}</b> Visa Type</a>
                                    </div>
                                </div>
                                <div class="row m-0">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @elseif (Auth::user()->level == 2)
                <div class="col-lg-4">
                    <div class="card card-custom bg-gray-100 card-stretch gutter-b">
                        <div class="card-body p-0 position-relative overflow-hidden">
                            <div id="" class="card-rounded-bottom bg-danger" style="height: 200px"></div>
                            <div class="card-spacer mt-n25">
                                <div class="row m-0">
                                    <div class="col bg-light-primary px-6 py-8 rounded-xl mb-7">
                                        <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="122.879px" height="119.799px" viewBox="0 0 122.879 119.799" enable-background="new 0 0 122.879 119.799" xml:space="preserve" fill="#3d99ff"><g><path d="M49.988,0h0.016v0.007C63.803,0.011,76.298,5.608,85.34,14.652c9.027,9.031,14.619,21.515,14.628,35.303h0.007v0.033v0.04 h-0.007c-0.005,5.557-0.917,10.905-2.594,15.892c-0.281,0.837-0.575,1.641-0.877,2.409v0.007c-1.446,3.66-3.315,7.12-5.547,10.307 l29.082,26.139l0.018,0.016l0.157,0.146l0.011,0.011c1.642,1.563,2.536,3.656,2.649,5.78c0.11,2.1-0.543,4.248-1.979,5.971 l-0.011,0.016l-0.175,0.203l-0.035,0.035l-0.146,0.16l-0.016,0.021c-1.565,1.642-3.654,2.534-5.78,2.646 c-2.097,0.111-4.247-0.54-5.971-1.978l-0.015-0.011l-0.204-0.175l-0.029-0.024L78.761,90.865c-0.88,0.62-1.778,1.209-2.687,1.765 c-1.233,0.755-2.51,1.466-3.813,2.115c-6.699,3.342-14.269,5.222-22.272,5.222v0.007h-0.016v-0.007 c-13.799-0.004-26.296-5.601-35.338-14.645C5.605,76.291,0.016,63.805,0.007,50.021H0v-0.033v-0.016h0.007 c0.004-13.799,5.601-26.296,14.645-35.338C23.683,5.608,36.167,0.016,49.955,0.007V0H49.988L49.988,0z M50.004,11.21v0.007h-0.016 h-0.033V11.21c-10.686,0.007-20.372,4.35-27.384,11.359C15.56,29.578,11.213,39.274,11.21,49.973h0.007v0.016v0.033H11.21 c0.007,10.686,4.347,20.367,11.359,27.381c7.009,7.012,16.705,11.359,27.403,11.361v-0.007h0.016h0.033v0.007 c10.686-0.007,20.368-4.348,27.382-11.359c7.011-7.009,11.358-16.702,11.36-27.4h-0.006v-0.016v-0.033h0.006 c-0.006-10.686-4.35-20.372-11.358-27.384C70.396,15.56,60.703,11.213,50.004,11.21L50.004,11.21z"/></g></svg>
                                        </span>
                                        <a href="{{route('search_list')}}" class="text-primary font-weight-bold font-size-h6 mt-2"><b>0  </b>Assetment PDF</a>
                                    </div>
                                </div>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <div class="row m-0">
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 1-->
                </div>
                @endif
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@if (Auth::user()->level == 2 && count($brands) > 1)
    @php
        // Check if a cookie named "brandModalShown" exists
        $brandModalShown = isset($_COOKIE['brandModalShown']);
    @endphp

    @if (!$brandModalShown)
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="brandModalLabel" data-backdrop="static">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="brandModalLabel">Select Brand ID</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <select class="form-control" id="selectBrand">
                            <option value="">Please select brand</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand }}">{{ $brand }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                $('#modal').modal('show');
            });
        </script>
    @endif
@else
    <script>
        var brands = <?php echo json_encode($brands); ?>; 
        $('#selectedBrandLabel').text(brands[0]);
    </script>
@endif
<script type="text/javascript" src="{{asset('js/brand-selector.js')}}"></script>
<script>
    @if (Auth::user()->level == 1 )
        var brand_name = <?php echo json_encode($menu_brand); ?>; 
        $('#selectedBrandLabel').text(brand_name.name);
   @endif
</script>
<script>
    $(document).ready(function () {
        var selectedBrandLabelElement = document.getElementById("selectedBrandLabel");
        var selectedBrandLabel = selectedBrandLabelElement.textContent; // Get the text content
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        if ( selectedBrandLabel.trim() !== "" ) {
            $.ajax({
                url: "{{ route('add_login_history') }}",
                method: 'POST', 
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the headers
                },
                data: { selectedBrandLabel: selectedBrandLabel },
                success: function (response) {
                    console.log(response);
                },
                error: function () {
                }
            });
        }
    });
</script>
