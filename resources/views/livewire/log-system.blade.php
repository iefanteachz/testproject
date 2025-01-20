<div bg-white table-responsive>
    <input type="text" wire:model="search" placeholder="Search logs..." class="form-input" />

    <table class="table-auto w-full mt-4">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Action</th>
                <th class="px-4 py-2">Details</th>
                <th class="px-4 py-2">Before</th>
                <th class="px-4 py-2">After</th>
                <th class="px-4 py-2">Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $log)
                <tr>
                    <td class="border px-4 py-2">{{ $log->id }}</td>
                    <td class="border px-4 py-2">{{ $log->action }}</td>
                    <td class="border px-4 py-2">{{ $log->details }}</td>
                    <td class="border px-4 py-2">
                        <pre>{{ json_encode(json_decode($log->before), JSON_PRETTY_PRINT) }}</pre>
                    </td>
                    <td class="border px-4 py-2">
                        <pre>{{ json_encode(json_decode($log->after), JSON_PRETTY_PRINT) }}</pre>
                    </td>
                    <td class="border px-4 py-2">{{ $log->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $logs->links() }} <!-- Pagination -->
</div>
