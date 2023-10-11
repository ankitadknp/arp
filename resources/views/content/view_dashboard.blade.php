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
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="24px" height="24px" fill-rule="nonzero"><g fill="#3d99ff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(10.66667,10.66667)"><path d="M9.66797,2l-0.49219,2.52344c-0.82076,0.31036 -1.57968,0.74397 -2.24609,1.29102l-2.42383,-0.83594l-2.33203,4.04297l1.93945,1.68555c-0.06877,0.42195 -0.11328,0.85159 -0.11328,1.29297c0,0.44138 0.04452,0.87101 0.11328,1.29297l-1.93945,1.68555l2.33203,4.04297l2.42383,-0.83594c0.66642,0.54705 1.42533,0.98065 2.24609,1.29102l0.49219,2.52344h4.66406l0.49219,-2.52344c0.82076,-0.31036 1.57968,-0.74397 2.24609,-1.29102l2.42383,0.83594l2.33203,-4.04297l-1.93945,-1.68555c0.06877,-0.42195 0.11328,-0.85159 0.11328,-1.29297c0,-0.44138 -0.04452,-0.87101 -0.11328,-1.29297l1.93945,-1.68555l-2.33203,-4.04297l-2.42383,0.83594c-0.66642,-0.54705 -1.42533,-0.98065 -2.24609,-1.29102l-0.49219,-2.52344zM12,8c2.209,0 4,1.791 4,4c0,2.209 -1.791,4 -4,4c-2.209,0 -4,-1.791 -4,-4c0,-2.209 1.791,-4 4,-4z"></path></g></g></svg>
                                        </span>
                                        <a href="{{route('created_date_assement.index')}}" class="text-primary font-weight-bold font-size-h6 mt-2"><b>1  </b>SMTP Setting</a>
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
