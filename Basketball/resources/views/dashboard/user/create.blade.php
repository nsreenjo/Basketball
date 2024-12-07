<div class="modal fade" id="user-add-modal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <form class="modal-content" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h5 class="mb-0" id="modal-title">Add New User</h5>
                <a href="#" class="avtar avtar-s btn-link-danger btn-pc-default ms-auto" data-bs-dismiss="modal">
                    <i class="ti ti-x f-20"></i>
                </a>
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
                            <div class="col-md-4 mb-3">
                                <label class="form-label" id="first-name-label">First Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Name"
                                    name="firstName"
                                    required
                                />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" id="mid-name-label">Mid Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="middle name"
                                    name="midName"
                                    required
                                />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" id="last-name-label">Last Name</label>
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
                            <div class="col-md-4 mb-3">
                                <label class="form-label" id="first-name-ar-label">First Name AR</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="الاسم الأول"
                                    name="firstName_ar"
                                    required
                                />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" id="mid-name-ar-label">Mid Name AR</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="الاسم الثاني"
                                    name="midName_ar"
                                    required
                                />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" id="last-name-ar-label">Last Name AR</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="الاسم الأخير"
                                    name="lastName_ar"
                                    required
                                />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" id="email-label">Email</label>
                            <input
                                type="email"
                                class="form-control"
                                placeholder="Email"
                                name="email"
                                required
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" id="phone-label">Phone</label>
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Phone"
                                name="phone"
                                required
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" id="role-label">Role</label>
                            <select
                                class="form-select"
                                name="role"
                                required
                            >
                                <option value="" disabled selected>Select Role</option>
                                <option value="superAdmin">Super Admin</option>
                                <option value="coaches">Coach</option>
                                <option value="student">Student</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" id="password-label">Password</label>
                            <input
                                type="password"
                                class="form-control"
                                placeholder="Enter Password"
                                name="password"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-link-danger btn-pc-default" data-bs-dismiss="modal" id="cancel-btn">Cancel</button>
                <button type="submit" class="btn btn-primary" id="add-user-btn">Add User</button>
            </div>
        </form>
    </div>
</div>
<script>
    const modalTranslations = {
        "Add New User": "إضافة مستخدم جديد",
        "First Name": "الاسم الأول",
        "Mid Name": "الاسم الثاني",
        "Last Name": "الاسم الأخير",
        "First Name AR": "الاسم الأول (عربي)",
        "Mid Name AR": "الاسم الثاني (عربي)",
        "Last Name AR": "الاسم الأخير (عربي)",
        "Email": "البريد الإلكتروني",
        "Phone": "رقم الهاتف",
        "Role": "الدور",
        "Password": "كلمة المرور",
        "Cancel": "إلغاء",
        "Add User": "إضافة المستخدم"
    };

    function translateModalToArabic() {
        document.getElementById("modal-title").textContent = modalTranslations["Add New User"];
        document.getElementById("first-name-label").textContent = modalTranslations["First Name"];
        document.getElementById("mid-name-label").textContent = modalTranslations["Mid Name"];
        document.getElementById("last-name-label").textContent = modalTranslations["Last Name"];
        document.getElementById("first-name-ar-label").textContent = modalTranslations["First Name AR"];
        document.getElementById("mid-name-ar-label").textContent = modalTranslations["Mid Name AR"];
        document.getElementById("last-name-ar-label").textContent = modalTranslations["Last Name AR"];
        document.getElementById("email-label").textContent = modalTranslations["Email"];
        document.getElementById("phone-label").textContent = modalTranslations["Phone"];
        document.getElementById("role-label").textContent = modalTranslations["Role"];
        document.getElementById("password-label").textContent = modalTranslations["Password"];
        document.getElementById("cancel-btn").textContent = modalTranslations["Cancel"];
        document.getElementById("add-user-btn").textContent = modalTranslations["Add User"];
    }

    if (localStorage.getItem('rtl') === 'true') {
        document.documentElement.setAttribute('dir', 'rtl'); // Set RTL direction for proper layout
        translateModalToArabic();
    }
</script>
