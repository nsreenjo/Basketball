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
                            <h2 class="mb-0">Edit Students</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- Form start -->
        <div class="col-md-6">
            <form method="POST" action="{{ route('students.update', $student->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Gender -->
                <div class="mb-3">
                    <label class="form-label" for="gender">Gender</label>
                    <select name="gender" class="form-control" id="gender">
                        <option value="male" {{ old('gender', $student->gender) == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender', $student->gender) == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>

                <!-- Nationality -->
                <div class="mb-3">
                    <label class="form-label" for="Nationality">Nationality</label>
                    <input type="text" name="Nationality" class="form-control" id="Nationality" value="{{ old('Nationality', $student->Nationality) }}" placeholder="Enter Nationality">
                </div>

                <!-- Birthday -->
                <div class="mb-3">
                    <label class="form-label" for="Birthday">Birthday</label>
                    <input type="date" name="Birthday" class="form-control" id="Birthday" value="{{ old('Birthday', $student->Birthday) }}" placeholder="Enter Birthday">
                </div>

                <!-- Level of Player -->
                <div class="mb-3">
                    <label class="form-label" for="levelOfPlayer">Level of Player</label>
                    <input type="text" name="levelOfPlayer" class="form-control" id="levelOfPlayer" value="{{ old('levelOfPlayer', $student->levelOfPlayer) }}" placeholder="Enter Level of Player">
                </div>

                <!-- Position -->
                <div class="mb-3">
                    <label class="form-label" for="position">Position</label>
                    <input type="text" name="position" class="form-control" id="position" value="{{ old('position', $student->position) }}" placeholder="Enter Position">
                </div>

                <!-- Weight -->
                <div class="mb-3">
                    <label class="form-label" for="weight">Weight</label>
                    <input type="number" name="weight" class="form-control" id="weight" value="{{ old('weight', $student->weight) }}" placeholder="Enter Weight">
                </div>

                <!-- Height -->
                <div class="mb-3">
                    <label class="form-label" for="height">Height</label>
                    <input type="number" name="height" class="form-control" id="height" value="{{ old('height', $student->height) }}" placeholder="Enter Height">
                </div>

                <!-- School Name -->
                <div class="mb-3">
                    <label class="form-label" for="schoolName">School Name</label>
                    <input type="text" name="schoolName" class="form-control" id="schoolName" value="{{ old('schoolName', $student->schoolName) }}" placeholder="Enter School Name">
                </div>

                <!-- Age Category -->
                <div class="mb-3">
                    <label class="form-label" for="ageCategory">Age Category</label>
                    <select name="ageCategory" class="form-control" id="ageCategory">
                        <option value="under 18" {{ old('ageCategory', $student->ageCategory) == 'under 18' ? 'selected' : '' }}>Under 18</option>
                        <option value="under 12" {{ old('ageCategory', $student->ageCategory) == 'under 12' ? 'selected' : '' }}>Under 12</option>
                        <option value="under 9" {{ old('ageCategory', $student->ageCategory) == 'under 9' ? 'selected' : '' }}>Under 9</option>
                    </select>
                </div>

                <!-- Address -->
                <div class="mb-3">
                    <label class="form-label" for="address">Address</label>
                    <input type="text" name="address" class="form-control" id="address" value="{{ old('address', $student->address) }}" placeholder="Enter Address">
                </div>

                <!-- User ID -->
                <div class="mb-3">
                    <label class="form-label" for="user_id">User</label>
                    <select name="user_id" class="form-control" id="user_id">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id', $student->user_id) == $user->id ? 'selected' : '' }}>{{ $user->firstName }} {{ $user->lastName }}</option>
                        @endforeach
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
