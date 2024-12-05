<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    use WithPagination, WithFileUploads;

    public $firstName, $midName, $lastName, $firstName_ar, $midName_ar, $lastName_ar;
    public $email, $phone, $role, $password, $image, $user_id;
    public $isEditMode = false; // Controls whether it's edit or create mode

    protected $rules = [
        'firstName' => 'required|string|max:255',
        'midName' => 'nullable|string|max:255',
        'lastName' => 'required|string|max:255',
        'firstName_ar' => 'required|string|max:255',
        'midName_ar' => 'nullable|string|max:255',
        'lastName_ar' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string|max:15',
        'role' => 'required|in:superAdmin,coaches,student',
        'password' => 'sometimes|min:6',

    ];

    public function render()
    {
        return view('livewire.users', [
            'users' => User::paginate(10),
        ]);
    }

    public function resetFields()
    {
        $this->reset([
            'firstName',
            'midName',
            'lastName',
            'firstName_ar',
            'midName_ar',
            'lastName_ar',
            'email',
            'phone',
            'role',
            'password',
            'image',
            'user_id',
            'isEditMode'
        ]);
    }

    public function create()
    {
        $this->resetFields(); // Clear fields for new user
        $this->isEditMode = false; // Set to create mode
    }

    public function store()
    {
        $data = $this->validate();
        $data['password'] = Hash::make($this->password);
        $data['image'] = $this->image ? $this->image->store('user-images', 'public') : null;

        User::create($data);

        session()->flash('message', 'User created successfully.');
        $this->resetFields();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->fill($user->toArray());
        $this->user_id = $id;
        $this->isEditMode = true; // Set to edit mode
    }

    public function update()
    {
        $data = $this->validate();
        $user = User::findOrFail($this->user_id);

        if ($this->image) {
            $data['image'] = $this->image->store('user-images', 'public');
        }

        $user->update($data);

        session()->flash('message', 'User updated successfully.');
        $this->resetFields();
    }

    public function delete($id)
    {
        User::destroy($id);

        session()->flash('message', 'User deleted successfully.');
    }
}
