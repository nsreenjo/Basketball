<div class="modal fade" id="user-add-modal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" >
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <form class="modal-content" method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h5 class="mb-0">Add New User</h5>
                <a href="#" class="avtar avtar-s btn-link-danger btn-pc-default ms-auto" data-bs-dismiss="modal">
                    <i class="ti ti-x f-20"></i>
                </a>
            </div>
           <div>

           </div>
            <div class="modal-body" style="max-height: 750px; overflow-y: auto;">
                <div class="row">
                    <div class="col-sm-3 text-center">
                        <div class="chat-avtar d-inline-flex mx-auto">
                            <img
                                class="rounded-circle img-fluid wid-70"
                                src="../assets/images/user/avatar-5.jpg"
                                alt="User image"
                                id="userImagePreview"
                            />
                            <input
                                type="file"
                                name="image"
                                class="form-control mt-3"
                                onchange="previewImage(event)"
                            />
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="mb-3">
                            <label class="form-label">User Name</label>
                            <select
                                class="form-select"
                                name="role"
                                required
                            >
                                <option value="" disabled selected>Select Role</option>
                                <option value="superAdmin">Super Admin</option>
                                <option value="coach">Coach</option>
                                <option value="student">Student</option>
                            </select>
                        </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Mid Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="middle name"
                                    name="midName"
                                    required
                                />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Last Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="last name"
                                    name="lastName"
                                    required
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div  class="col-md-4 mb-3">
                                <label class="form-label">First Name AR</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Name"
                                    name="firstName_ar"
                                    required
                                />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Mid Name AR</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="middle name"
                                    name="midName_ar"
                                    required
                                />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Last Name AR</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="last name"
                                    name="lastName_ar"
                                    required
                                />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input
                                type="email"
                                class="form-control"
                                placeholder="Email"
                                name="email"
                                required
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Phone"
                                name="phone"
                                required
                            />
                        </div>
                      
                        <div class="mb-3">
                            <label class="form-label">password</label>
                            <input
                                type="password"
                                class="form-control"
                                placeholder="Enter Location"
                                name="password"
                            >
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-link-danger btn-pc-default" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Add User</button>
            </div>
        </form>
    </div>
</div>
<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('userImagePreview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }

</script>
