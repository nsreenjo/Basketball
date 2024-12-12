<!-- Modal for adding a new activity -->
<div class="modal fade" id="activity-add-modal" tabindex="-1" aria-labelledby="activity-add-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('activities.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="activity-add-modalLabel">Add New Activity</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Start of Activity Form -->
                    <div class="row">
                        <div class="col-sm-12">

                            <!-- Coach Selection -->
                            <div class="mb-3">
                                <label class="form-label">Coach</label>
                                <select class="form-select" name="coach_id" required>
                                    <option value="" disabled selected>Select Coach</option>
                                    @foreach($coaches as $coach)
                                        <option value="{{ $coach->id }}">{{ $coach->user->firstName }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Activity Title -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Title</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <!-- Activity Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="4" required></textarea>
                            </div>

                            <!-- Start Date -->
                            <div class="mb-3">
                                <label for="startDate" class="form-label">Start Date</label>
                                <input type="datetime-local" name="startDate" class="form-control" required>
                            </div>

                            <!-- End Date -->
                            <div class="mb-3">
                                <label for="endDate" class="form-label">End Date</label>
                                <input type="datetime-local" name="endDate" class="form-control" required>
                            </div>

                            <!-- Duration -->
                            <div class="mb-3">
                                <label for="durationHours" class="form-label">Duration (Hours)</label>
                                <input type="number" name="durationHours" class="form-control" required>
                            </div>

                            <!-- Location -->
                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" name="location" class="form-control" required>
                            </div>

                            <!-- Price -->
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" step="0.01" name="price" class="form-control" required>
                            </div>

                            <!-- Type -->
                            <div class="mb-3">
                                <label for="type" class="form-label">Type</label>
                                <select name="type" class="form-control" required>
                                    <option value="event">Event</option>
                                    <option value="course">Course</option>
                                    <option value="championship">Championship</option>
                                </select>
                            </div>

                            <!-- Status -->
                            <div class="mb-3">
                                <label for="status" class="form-label">Activity Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="inactive">Inactive</option>
                                    <option value="active">Active</option>
                                    <option value="finished">Finished</option>
                                </select>
                            </div>

                            <!-- Image Upload -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" accept="image/*" required>
                            </div>

                            <!-- Session Start Time -->
                            <div class="mb-3">
                                <label for="sessionStartTime" class="form-label">Session Start Time</label>
                                <input type="time" name="sessionStartTime" class="form-control" required>
                            </div>

                            <!-- Session End Time -->
                            <div class="mb-3">
                                <label for="sessionEndTime" class="form-label">Session End Time</label>
                                <input type="time" name="sessionEndTime" class="form-control" required>
                            </div>

                            <!-- Session Status -->
                            <div class="mb-3">
                                <label for="sessionStatus" class="form-label">Session Status</label>
                                <select name="sessionStatus" class="form-control" required>
                                    <option value="present">Present</option>
                                    <option value="absent">Absent</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <!-- End of Activity Form -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
