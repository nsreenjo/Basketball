@include('include.dashboard.first')

<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->

@include('include.dashboard/sideBarMenu')



@include('include.dashboard.headerTopBar')

<!-- [ Header ] end -->



<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Users</a></li>
                            <li class="breadcrumb-item" aria-current="page">Account Profile</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Account Profile</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="tab-content">
                    <div class="tab-pane show active" id="profile-1" role="tabpanel" aria-labelledby="profile-tab-1">
                        <div class="row">
                            <div class="col-lg-4 col-xxl-3">
                                <div class="card">
                                    <div class="card-body position-relative">
                                        <div class="text-center mt-3">
                                            <div class="chat-avtar d-inline-flex mx-auto">
                                                <img class="rounded-circle img-fluid wid-70" src="{{ $user->image ? asset('storage/users/' . $user->image) : asset('assets/images/user/avatar-5.jpg') }}" alt="{{ $user->name }}" />
                                            </div>
                                            <h5 class="mb-0">{{ $user->name }}</h5>
                                            <p class="text-muted text-sm">{{ $user->role }}</p>
                                            <hr class="my-3 border border-secondary-subtle" />

                                            <div class="d-inline-flex align-items-center justify-content-start w-100 mb-3">
                                                <i class="ti ti-mail me-2"></i>
                                                <p class="mb-0">{{ $user->email }}</p>
                                            </div>
                                            <div class="d-inline-flex align-items-center justify-content-start w-100 mb-3">
                                                <i class="ti ti-phone me-2"></i>
                                                <p class="mb-0">{{ $user->phone }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-xxl-9">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Personal Details</h5>
                                    </div>


                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item px-0 pt-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">First Name</p>
                                                        <p class="mb-0">{{ $user->firstName }}</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Last Name</p>
                                                        <p class="mb-0">{{ $user->lastName }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Phone</p>
                                                        <p class="mb-0">{{ $user->phone }}</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Email</p>
                                                        <p class="mb-0">{{ $user->email }}</p>
                                                    </div>

                                                </div>
                                            </li>
                                        </ul>



                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- زر في الأسفل على الجانب الأيسر -->

                    </div>
                </div>
            </div>
        </div>

        <button class="btn btn-primary custom-button" data-bs-toggle="modal" data-bs-target="#user-edit-modal">
            Edit
        </button>

    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<!-- [ other-tabs ] -->
</div>
</div>
<!-- [ sample-page ] end -->
</div>
<!-- [ Main Content ] end -->

<!-- [ Main Content ] end -->

<!-- Required Js -->


<div class="modal fade" id="user-edit-modal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <form class="modal-content" method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="mb-0" id="modal-title">Edit User</h5>
                <a href="#" class="avtar avtar-s btn-link-danger btn-pc-default ms-auto" data-bs-dismiss="modal">
                    <i class="ti ti-x f-20"></i>
                </a>
            </div>
            <div class="modal-body" style="max-height: 750px; overflow-y: auto;">
                <div class="row">
                    <div class="col-sm-3 text-center">
                        <div class="chat-avtar d-inline-flex mx-auto">
                            <img class="rounded-circle img-fluid wid-70" src="{{ $user->image ? asset('storage/users/' . $user->image) : asset('assets/images/user/avatar-5.jpg') }}" alt="User image" id="userImagePreviewEdit" />
                            <input type="file" name="image" class="form-control mt-3" onchange="previewImageEdit(event)" />
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" name="firstName" value="{{ old('firstName', $user->firstName) }}" required />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Mid Name</label>
                                <input type="text" class="form-control" name="midName" value="{{ old('midName', $user->midName) }}" required />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="lastName" value="{{ old('lastName', $user->lastName) }}" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{ old('phone', $user->phone) }}" required />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select class="form-select" name="role" required>
                                <option value="superAdmin" {{ old('role', $user->role) == 'superAdmin' ? 'selected' : '' }}>Super Admin</option>
                                <option value="coaches" {{ old('role', $user->role) == 'coaches' ? 'selected' : '' }}>Coach</option>
                                <option value="student" {{ old('role', $user->role) == 'student' ? 'selected' : '' }}>Student</option>
                            </select>
                        </div>
                      <div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Current Password</label>
        <input type="password" class="form-control" name="current_password" placeholder="Enter your current password" />
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">New Password</label>
        <input type="password" class="form-control" name="password" placeholder="Leave empty to keep current password" />
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Confirm Password</label>
        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm your password" />
    </div>
</div>

                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-link-danger btn-pc-default" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>



<script>
    function previewImageEdit(event) {
        const reader = new FileReader();
        reader.onload = function() {
            document.getElementById('userImagePreviewEdit').src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }

</script>









<script src="../assets/js/plugins/popper.min.js">
    </>
<script src="../assets/js/plugins/simplebar.min.js">

</script>
<script src="../assets/js/plugins/bootstrap.min.js"></script>
<script src="../assets/js/fonts/custom-font.js"></script>
<script src="../assets/js/pcoded.js"></script>
<script src="../assets/js/plugins/feather.min.js"></script>
<div class="floting-button">
    <a href="https://1.envato.market/zNkqj6" class="btn btn btn-danger buynowlinks d-inline-flex align-items-center gap-2" data-bs-toggle="tooltip" title="Buy Now">
        <i class="ph-duotone ph-shopping-cart"></i>
        <span>Buy Now</span>

    </a>
</div>

<script>
    layout_change('light');

</script>

<script>
    change_box_container('false');

</script>

<script>
    layout_caption_change('true');

</script>

<script>
    layout_rtl_change('false');

</script>

<script>
    preset_change('preset-1');

</script>

<script>
    main_layout_change('vertical');

</script>



</body>
<!-- [Body] end -->
</html>
