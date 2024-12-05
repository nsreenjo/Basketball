<div class="modal fade" id="user-select-modal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <form class="modal-content" method="POST" action="{{ route('users.assignCoach') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h5 class="mb-0" id="modal-title">Assign Coach Role</h5>
                <a href="#" class="avtar avtar-s btn-link-danger btn-pc-default ms-auto" data-bs-dismiss="modal">
                    <i class="ti ti-x f-20"></i>
                </a>
            </div>
            <div class="modal-body" style="max-height: 750px; overflow-y: auto;">
                <div class="row">
                    <div class="mb-3">
                        <label class="form-label" id="role-label">Select User to Assign Coach Role</label>
                        <select class="form-select" name="user_id" required>
                            <option value="" disabled selected>Select User</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->firstName }} {{ $user->midName }} {{ $user->lastName }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-link-danger btn-pc-default" data-bs-dismiss="modal" id="cancel-btn">Cancel</button>
                <button type="submit" class="btn btn-primary" id="assign-coach-btn">Assign Coach</button>
            </div>
        </form>
    </div>
</div>

<script>
    const modalTranslations = {
        "Assign Coach Role": "تعيين دور المدرب",
        "Select User to Assign Coach Role": "اختار المستخدم لتعيين دور المدرب",
        "Select User": "اختر المستخدم",
        "Cancel": "إلغاء",
        "Assign Coach": "تعيين المدرب"
    };

    function translateModalToArabic() {
        document.getElementById("modal-title").textContent = modalTranslations["Assign Coach Role"];
        document.getElementById("role-label").textContent = modalTranslations["Select User to Assign Coach Role"];
        document.querySelector("option[value='']").textContent = modalTranslations["Select User"];
        document.getElementById("cancel-btn").textContent = modalTranslations["Cancel"];
        document.getElementById("assign-coach-btn").textContent = modalTranslations["Assign Coach"];
    }

    if (localStorage.getItem('rtl') === 'true') {
        document.documentElement.setAttribute('dir', 'rtl'); // Set RTL direction for proper layout
        translateModalToArabic();
    }
</script>
