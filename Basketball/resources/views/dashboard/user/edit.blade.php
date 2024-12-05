@extends('layouts.dashboard')
@section('content')

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Back</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Users</a></li>
                            <li class="breadcrumb-item" aria-current="page">Edit User</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Edit User</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- Form start -->
        <div class="col-md-6">
            <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    @if($user->image)
                        <img src="{{ $user->image ? asset('storage/' . $user->image) : '../assets/images/user/avatar-5.jpg' }}"  alt="User Image" style="max-width: 100px; margin-bottom: 10px;">
                    @endif
                    <label class="form-label" for="image">Image</label>
                    <input type="file" name="image" class="form-control" id="image">

                </div>
                <div class="row">
                    <!-- First Name -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="firstName">First Name</label>
                        <input type="text" name="firstName" class="form-control" id="firstName" value="{{ old('firstName', $user->firstName) }}" placeholder="Enter First Name">
                    </div>

                    <!-- Middle Name -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="midName">Middle Name</label>
                        <input type="text" name="midName" class="form-control" id="midName" value="{{ old('midName', $user->midName) }}" placeholder="Enter Middle Name">
                    </div>

                    <!-- Last Name -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="lastName">Last Name</label>
                        <input type="text" name="lastName" class="form-control" id="lastName" value="{{ old('lastName', $user->lastName) }}" placeholder="Enter Last Name">
                    </div>
                </div>

                <div class="row">
                    <!-- First Name (Arabic) -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="firstName_ar">First Name (Arabic)</label>
                        <input type="text" name="firstName_ar" class="form-control" id="firstName_ar" value="{{ old('firstName_ar', $user->firstName_ar) }}" placeholder="Enter First Name in Arabic">
                    </div>

                    <!-- Middle Name (Arabic) -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="midName_ar">Middle Name (Arabic)</label>
                        <input type="text" name="midName_ar" class="form-control" id="midName_ar" value="{{ old('midName_ar', $user->midName_ar) }}" placeholder="Enter Middle Name in Arabic">
                    </div>

                    <!-- Last Name (Arabic) -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="lastName_ar">Last Name (Arabic)</label>
                        <input type="text" name="lastName_ar" class="form-control" id="lastName_ar" value="{{ old('lastName_ar', $user->lastName_ar) }}" placeholder="Enter Last Name in Arabic">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $user->email) }}" placeholder="Enter email">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone', $user->phone) }}" placeholder="Enter phone number">
                </div>



                <div class="mb-3">
                    <label class="form-label" for="role">Role</label>
                    <select name="role" class="form-control" id="role">
                        <option value="superAdmin" {{ old('role', $user->role) == 'superAdmin' ? 'selected' : '' }}>Super Admin</option>
                        <option value="coach" {{ old('role', $user->role) == 'coach' ? 'selected' : '' }}>Coach</option>
                        <option value="student" {{ old('role', $user->role) == 'student' ? 'selected' : '' }}>Student</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mb-4">Update</button>
            </form>
        </div>
        <!-- Form end -->
    </div>
</div>
<!-- [ Main Content ] end -->
<script>
    const translations = {
        "Back": "رجوع",
        "Users": "المستخدمين",
        "Edit User": "تعديل المستخدم",
        "First Name": "الاسم الأول",
        "Middle Name": "الاسم الثاني",
        "Last Name": "الاسم الأخير",
        "First Name (Arabic)": "الاسم الأول (بالعربية)",
        "Middle Name (Arabic)": "الاسم الثاني (بالعربية)",
        "Last Name (Arabic)": "الاسم الأخير (بالعربية)",
        "Email": "البريد الإلكتروني",
        "Phone": "الهاتف",
        "Role": "الدور",
        "Super Admin": "مدير النظام",
        "Coach": "مدرب",
        "Student": "طالب",
        "Update": "تحديث"
    };

    if (localStorage.getItem('rtl') === 'true') {
        document.documentElement.setAttribute('dir', 'rtl'); // Apply RTL
        document.querySelectorAll('label, h2, button, option').forEach(el => {
            const text = el.textContent.trim();
            if (translations[text]) {
                el.textContent = translations[text];
            }
        });
    }
</script>

@endsection
