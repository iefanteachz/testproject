<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold">Student Management</h2>

    @if (session()->has('message'))
        <div class="alert alert-important alert-info alert-dismissible" role="alert text-green-500 my-2">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="add">
        <div class="mt-4">
            <label for="name">Name</label>
            <input type="text" id="name" wire:model="name" class="border p-2 w-full">
            @error('name') <span style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            <label for="age">Age</label>
            <input type="number" id="age" wire:model="age" class="border p-2 w-full">
            @error('age') <span style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            <label for="gender">Gender</label>
            <select id="gender" wire:model="gender" class="border p-2 w-full">
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            @error('gender') <span style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" wire:click="resetdata" class="btn btn-primary">Clear</button>

        </div>
    </form>

    <button wire:click="exportPDF" class="btn btn-primary">
    <i class="fas fa-file-pdf"></i> Export PDF
    </button>
    <div class="container mx-auto p-4">
        <div class="bg-white table-responsive">
            <table class="table-auto w-full mt-4">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Age</th>
                        <th class="px-4 py-2">Gender</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td class="border px-4 py-2">{{ $student->name }}</td>
                            <td class="border px-4 py-2">{{ $student->age }}</td>
                            <td class="border px-4 py-2">{{ $student->gender }}</td>

                            <td class="border px-4 py-2">
                                <button wire:click="edit({{ $student->id }})"
                                    wire:confirm="Are you sure you want to edit this student?"
                                    class="bg-yellow-500 text-white px-2 py-1 rounded btn btn-primary">Edit</button>
                                <button wire:click="delete({{ $student->id }})"
                                    wire:confirm="Are you sure you want to delete this student?"
                                    class="bg-red-500 text-white px-2 py-1 rounded btn btn-primary">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $students->links() }}
            </div>
        </div>
    </div>
</div>