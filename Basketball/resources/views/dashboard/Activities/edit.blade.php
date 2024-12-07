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
                            <li class="breadcrumb-item"><a href="{{ route('activities.index') }}">Back</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Activities</a></li>
                            <li class="breadcrumb-item" aria-current="page">Edit Activity</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Edit Activity</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- Form start -->
        <div class="col-md-6">
            <form method="POST" action="{{ route('activities.update', $activity->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Activity Name -->
                <div class="mb-3">
                    <label class="form-label" for="name">Activity Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $activity->name) }}" placeholder="Enter activity name">
                </div>

                <!-- Start Date -->
                <div class="mb-3">
                    <label class="form-label" for="startDate">Start Date</label>
                    <input type="date" name="startDate" class="form-control" id="startDate" value="{{ old('startDate', $activity->startDate) }}" placeholder="Enter start date">
                </div>

                <!-- End Date -->
                <div class="mb-3">
                    <label class="form-label" for="endDate">End Date</label>
                    <input type="date" name="endDate" class="form-control" id="endDate" value="{{ old('endDate', $activity->endDate) }}" placeholder="Enter end date">
                </div>

                <!-- Location -->
                <div class="mb-3">
                    <label class="form-label" for="location">Location</label>
                    <input type="text" name="location" class="form-control" id="location" value="{{ old('location', $activity->location) }}" placeholder="Enter activity location">
                </div>

                <!-- Price -->
                <div class="mb-3">
                    <label class="form-label" for="price">Price</label>
                    <input type="number" name="price" class="form-control" id="price" value="{{ old('price', $activity->price) }}" placeholder="Enter price" min="0">
                </div>

                <!-- Activity Type -->
                <div class="mb-3">
                    <label class="form-label" for="type">Activity Type</label>
                    <input type="text" name="type" class="form-control" id="type" value="{{ old('type', $activity->type) }}" placeholder="Enter activity type (event, course, championship)">
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label class="form-label" for="status">Status</label>
                    <select name="status" class="form-control" id="status">
                        <option value="active" {{ old('status', $activity->status) == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status', $activity->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        <option value="finished" {{ old('status', $activity->status) == 'finished' ? 'selected' : '' }}>Finished</option>
                    </select>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label" for="description">Description</label>
                    <textarea name="description" class="form-control" id="description" placeholder="Enter activity description">{{ old('description', $activity->description) }}</textarea>
                </div>

                <!-- Image (optional) -->
                <div class="mb-3">
                    <label class="form-label" for="image">Image</label>
                    <input type="file" name="image" class="form-control" id="image" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary mb-4">Update</button>
            </form>
        </div>
        <!-- Form end -->
    </div>
</div>
<!-- [ Main Content ] end -->

<script>
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
