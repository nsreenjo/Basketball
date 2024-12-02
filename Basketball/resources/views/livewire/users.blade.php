<div>
    <h2>User Management</h2>

    <!-- Success Message -->
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <!-- Create Button -->
    <button wire:click="create" class="btn btn-primary">Create User</button>

    <!-- User Table -->
    <table id="res-config" class="display table table-striped table-hover dt-responsive nowrap" style="width: 100%">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->firstName }} {{ $user->lastName }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->role }}</td>
            <td>
                <button wire:click="edit({{ $user->id }})" class="btn btn-info">Edit</button>
                <button wire:click="delete({{ $user->id }})" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
{{--    <table class="table">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th>Name</th>--}}
{{--            <th>Email</th>--}}
{{--            <th>Phone</th>--}}
{{--            <th>Role</th>--}}
{{--            <th>Actions</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @foreach ($users as $user)--}}
{{--            <tr>--}}
{{--                <td>{{ $user->firstName }} {{ $user->lastName }}</td>--}}
{{--                <td>{{ $user->email }}</td>--}}
{{--                <td>{{ $user->phone }}</td>--}}
{{--                <td>{{ $user->role }}</td>--}}
{{--                <td>--}}
{{--                    <button wire:click="edit({{ $user->id }})" class="btn btn-info">Edit</button>--}}
{{--                    <button wire:click="delete({{ $user->id }})" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--        </tbody>--}}
{{--    </table>--}}

{{--    {{ $users->links() }}--}}

    <!-- Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="userModalLabel">{{ $isEditMode ? 'Edit User' : 'Create User' }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" wire:model="firstName" placeholder="First Name">
                        @error('firstName') <span class="error">{{ $message }}</span> @enderror


                        <input type="text" wire:model="midName" placeholder="Middle Name" required>
                        @error('midName') <span class="text-danger">{{ $message }}</span> @enderror

                        <input type="text" wire:model="lastName" placeholder="Last Name" required>
                        @error('lastName') <span class="text-danger">{{ $message }}</span> @enderror

                        <input type="text" wire:model="firstName_ar" placeholder="First Name (Arabic)" required>
                        @error('firstName_ar') <span class="text-danger">{{ $message }}</span> @enderror

                        <input type="text" wire:model="midName_ar" placeholder="Middle Name (Arabic)" required>
                        @error('midName_ar') <span class="text-danger">{{ $message }}</span> @enderror

                        <input type="text" wire:model="lastName_ar" placeholder="Last Name (Arabic)" required>
                        @error('lastName_ar') <span class="text-danger">{{ $message }}</span> @enderror

                        <input  wire:model="email" placeholder="Email" required >
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror

                        @if (!$isEditMode)
                            <input type="password" wire:model.defer="password" placeholder="Password" required>
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        @endif

                        <input type="text" wire:model="phone" placeholder="Phone" required>
                        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror

                        <select wire:model="role" required>
                            <option value="">Select Role</option>
                            <option value="superAdmin">Super Admin</option>
                            <option value="coach">Coach</option>
                            <option value="student">Student</option>
                        </select>
                        @error('role') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">{{ $isEditMode ? 'Update' : 'Create' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- [Page Specific JS] start -->
<!-- datatable Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('assets/js/plugins/dataTables.min.js') }}"></script>
<script src="{{asset('assets/js/plugins/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/responsive.bootstrap5.min.js') }}"></script>
<script>
    // [ Configuration Option ]
    $('#res-config').DataTable({
        responsive: true
    });

    // [ New Constructor ]
    var newcs = $('#new-cons').DataTable();

    new $.fn.dataTable.Responsive(newcs);

    // [ Immediately Show Hidden Details ]
    $('#show-hide-res').DataTable({
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.childRowImmediate,
                type: ''
            }
        }
    });
</script>
<!-- [Page Specific JS] end -->
<script>
    window.addEventListener('open-modal', () => {
        var myModal = new bootstrap.Modal(document.getElementById('userModal'));
        myModal.show();
    });

    window.addEventListener('close-modal', () => {
        var myModalEl = document.getElementById('userModal');
        var modalInstance = bootstrap.Modal.getInstance(myModalEl);
        modalInstance.hide();
    });
</script>
