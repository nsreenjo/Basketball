<div class="modal fade" id="user-add-modal" tabindex="-1" aria-labelledby="user-add-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="user-add-modal-label">Add Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <!-- User ID -->
                    <div class="mb-3">
                        <label for="user_id" class="form-label">User ID</label>
                        <input type="number" name="user_id" id="user_id" class="form-control" required>
                    </div>
                    <!-- Gender -->
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select name="gender" id="gender" class="form-select" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <!-- Nationality -->
                    <div class="mb-3">
                        <label for="nationality" class="form-label">Nationality</label>
                        <input type="text" name="Nationality" id="nationality" class="form-control" required>
                    </div>
                    <!-- Birthday -->
                    <div class="mb-3">
                        <label for="birthday" class="form-label">Birthday</label>
                        <input type="date" name="Birthday" id="birthday" class="form-control" required>
                    </div>
                    <!-- Level of Player -->
                    <div class="mb-3">
                        <label for="levelOfPlayer" class="form-label">Level of Player</label>
                        <input type="text" name="levelOfPlayer" id="levelOfPlayer" class="form-control" required>
                    </div>
                    <!-- Position -->
                    <div class="mb-3">
                        <label for="position" class="form-label">Position</label>
                        <input type="text" name="position" id="position" class="form-control" required>
                    </div>
                    <!-- Weight -->
                    <div class="mb-3">
                        <label for="weight" class="form-label">Weight</label>
                        <input type="number" step="0.1" name="weight" id="weight" class="form-control" required>
                    </div>
                    <!-- Height -->
                    <div class="mb-3">
                        <label for="height" class="form-label">Height</label>
                        <input type="number" step="0.1" name="height" id="height" class="form-control" required>
                    </div>
                    <!-- School Name -->
                    <div class="mb-3">
                        <label for="schoolName" class="form-label">School Name</label>
                        <input type="text" name="schoolName" id="schoolName" class="form-control" required>
                    </div>
                    <!-- Age Category -->
                    <div class="mb-3">
                        <label for="ageCategory" class="form-label">Age Category</label>
                        <select name="ageCategory" id="ageCategory" class="form-select" required>
                            <option value="under 18">Under 18</option>
                            <option value="under 12">Under 12</option>
                            <option value="under 9">Under 9</option>
                        </select>
                    </div>
                    <!-- Address -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" id="address" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Student</button>
                </div>
            </form>
        </div>
    </div>
</div>
