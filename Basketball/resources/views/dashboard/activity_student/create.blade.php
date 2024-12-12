@extends('layouts.dashboard')

@section('content')
    <div class="pc-container">
        <div class="pc-content">

            <!-- [ Page Header ] -->
            <div class="page-header">
                <h2>إضافة طلاب إلى النشاط</h2>
            </div>

            <!-- عرض رسائل الخطأ -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- نموذج إضافة الطلاب إلى النشاط -->
            <form action="{{ route('activity_students.store') }}" method="POST">
                @csrf

                <!-- تمرير معرّف النشاط كقيمة مخفية -->
                <input type="hidden" name="activity_id" value="{{ $activity_id }}">

                <!-- قائمة الطلاب المتاحين -->
                <div class="card">
                    <div class="card-header">
                        <h4>حدد الطلاب لإضافتهم إلى النشاط</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @forelse($students as $student)
                                <div class="col-md-3 mb-3">
                                    <div class="form-check">
                                        <input
                                            type="checkbox"
                                            name="students[]"
                                            value="{{ $student->id }}"
                                            class="form-check-input"
                                            id="student{{ $student->id }}"
                                        >
                                        <label class="form-check-label" for="student{{ $student->id }}">
                                            {{ $student->user->firstName }} {{ $student->user->lastName }}
                                        </label>
                                    </div>
                                </div>
                            @empty
                                <p class="text-danger">لا يوجد طلاب متاحين لإضافتهم إلى النشاط.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- زر الإرسال -->
                <div class="mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="ti ti-check"></i> إضافة الطلاب إلى النشاط
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
