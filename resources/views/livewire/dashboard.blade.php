
<div class="container">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-3 gap-4">
                    <div class="stat p-6 text-gray-900">
                        <h2>Users</h2>
                        <p>{{ $stats['users'] }}</p>
                    </div>
                    <div class="stat p-6 text-gray-900">
                        <h2>Posts</h2>
                        <p>{{ $stats['posts'] }}</p>
                    </div>
                    <div class="stat p-6 text-gray-900">
                        <h2>Comments</h2>
                        <p>{{ $stats['comments'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>