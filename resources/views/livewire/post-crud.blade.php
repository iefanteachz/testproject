
<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold">Post Management</h2>

    @if (session()->has('message'))
        <div class="alert alert-important alert-info alert-dismissible" role="alert text-green-500 my-2">
            {{ session('message') }}
        </div>
    @endif


    <div class="container mx-auto p-4">
        <button wire:click="filterall" class="mt-4 btn btn-primary">Search</button>
        <div class="row mb-4">

            <!-- Filter Dropdown -->
            <div class="col-md-4">
                <label for="filterDropdown" class="form-label">Filter By Post:</label>
                <select id="filterDropdown" wire:model.defer="title" class="form-select">
                    <option value="">-- Post --</option>

                    @foreach($titles as $filtertitle)
                        <option value="{{$filtertitle}}">{{ $filtertitle }}</option>
                    @endforeach

                </select>
            </div>

            <!-- Search Box -->
            <div class="col-md-4">
                <label for="searchBox" class="form-label">Search:</label>
                <input id="searchBox" type="text" class="border rounded px-4 py-2 w-full mb-4"
                    placeholder="Search posts..." wire:model.defer="search" class="form-control">

            </div>

            <!-- Items Per Page -->
            <div class="col-md-4">
                <label for="perPage" class="form-label">Items Per Page:</label>
                <select id="perPage" wire:model="perPage" class="form-select">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>
            </div>

        </div>


        <div class="bg-white table-responsive">
            <!-- Table -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Location</th>
                        <th>Completed</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($result as $post)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->body }}</td>
                            <td>{{ $post->location->locatename }}</td>
                            <td>{{ $post->status }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No results found.</td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>
    </div>

    <div class="container mx-auto p-4">

        <button wire:click="openModal" class=" mt-4 btn btn-primary">Create Post</button>

        <div class="bg-white table-responsive">


            <table class="table-auto w-full mt-4">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Body</th>
                        <th class="px-4 py-2">Location(short)</th>
                        <th class="px-4 py-2">Completed</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($posts as $post)
                        <tr>
                            <td class="border px-4 py-2">{{ $post->title }}</td>
                            <td class="border px-4 py-2">{{ $post->body }}</td>
                            <td class="border px-4 py-2">{{ $post->location->locatename }}</td>
                            <td class="border px-4 py-2">
                                <button wire:click="toggleStatus({{ $post->id }})"
                                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 btn btn-primary">
                                    {{ $post->status ? 'Complete' : 'Not Complete' }}
                                </button>
                            </td>
                            <td class="border px-4 py-2">
                                <button wire:click="edit({{ $post->id }})"
                                    wire:confirm="Are you sure you want to edit this post?"
                                    class="bg-yellow-500 text-white px-2 py-1 rounded btn btn-primary">Edit</button>
                                <button wire:click="delete({{ $post->id }})"
                                    wire:confirm="Are you sure you want to delete this post?"
                                    class="bg-red-500 text-white px-2 py-1 rounded btn btn-primary">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $posts->links() }} <!-- Livewire's pagination links -->
            </div>
        </div>
    </div>

    @if($isModalOpen)
        <div class="fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white p-6 rounded shadow-lg">
                    <h2 class="text-xl font-bold">{{ $post_id ? 'Edit' : 'Create' }} Post</h2>

                    <form wire:submit.prevent="store">
                        <div class="mt-4">
                            <label for="title">Title</label>
                            <input type="text" id="title" wire:model="title" class="border p-2 w-full">
                            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div class="mt-4">
                            <label for="body">Content</label>
                            <textarea id="body" wire:model="body" class="border p-2 w-full"></textarea>
                            @error('body') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div class="mt-4">
                            <label for="location" class="form-label">Location</label>
                            <select id="location" wire:model="location_id" class="form-select">
                                <option value="">--Select Location--</option>
                                @foreach ($locations as $location)
                                    <option value="{{ $location->id }}">{{ $location->locatename }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" wire:click="closeModal" class="btn btn-primary">Cancel</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>