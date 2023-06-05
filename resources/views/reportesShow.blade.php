<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Full Table</title>
</head>
<body>
    <div class="table-container bg-gray-400">
        <div class="overflow-x-auto bg-gray">
            <div class="bg-white shadow overflow-hidden border-b border-gray-200 sm:rounded-lg" style="margin:100px">
                <h2 class="py-4 text-lg font-bold font-sans text-red-500 text-center">Alerts Reports (Full Table)</h2>
                <div class="flex mb-4">
                    <div class="flex items-center border rounded-md border-gray-300" style="margin-left: 20px;">
                        <form action="{{ route('alerts.full') }}">
                            <select name="filter" class="px-2 py-1 border border-transparent focus:outline-none focus:ring-2 focus:ring-blue-400">
                                <option value="alert_type" {{ request()->get('filter') == 'alert_type' ? 'selected' : ''}}>Description</option>
                                <option value="classification" {{ request()->get('filter') == 'classification' ? 'selected' : '' }}>Clasification</option>
                                <option value="protocol" {{ request()->get('filter') == 'protocol' ? 'selected' : '' }}>Protocol</option>
                                <option value="src_address" {{ request()->get('filter')=='src_address' ? 'selected' : '' }}>Source address</option>
                                <option value="dest_address" {{ request()->get('filter')=='dest_address' ? 'selected' : '' }}>Destination address</option>
                            </select>
                            <input type="text" class="px-2 py-1 border border-transparent focus:outline-none focus:ring-2 focus:ring-blue-400" name='search' placeholder="Search..." value="{{ request()->get('search') ?? '' }}">
                            <button class="px-2 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Search</button>
                        </form>
                    </div>
                </div>
                <table class="min-w-full divide-y divide-gray-200 border border-gray-300 mx-100" style="table-layout: fixed;">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left border-b">ID</th>
                            <th class="px-6 py-3 text-left border-b">Description</th>
                            <th class="px-6 py-3 text-left border-b">classification</th>
                            <th class="px-6 py-3 text-left border-b">priority</th>
                            <th class="px-6 py-3 text-left border-b">Protocol</th>
                            <th class="px-6 py-3 text-left border-b">Source Adsress</th>
                             <th class="px-6 py-3 text-left border-b">Destination Address</th>
                            <th class="px-6 py-3 text-left border-b">timestamp</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($alerts as $alert)
                            <tr>
                                <td class="px-6 py-4 border-b">{{ $alert->id }}</td>
                                <td class="px-6 py-4 border-b">{{ $alert->alert_type }}</td>
                                <td class="px-6 py-4 border-b">{{ $alert->classification }}</td>
                                <td class="px-6 py-4 border-b">{{ $alert->priority }}</td>
                                <td class="px-6 py-4 border-b">{{ $alert->protocol }}</td>
                                <td class="px-6 py-4 border-b">{{ $alert->src_address }}</td>
                                <td class="px-6 py-4 border-b">{{ $alert->dest_address }}</td>
                                <td class="px-6 py-4 border-b">{{ $alert->timestamp }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="px-4 py-2 border-b" colspan="7">There are no registered alerts</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
