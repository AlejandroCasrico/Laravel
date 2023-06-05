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
                    <select class="px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="option1">Option 1</option>
                        <option value="option2">Option 2</option>
                        <option value="option3">Option 3</option>
                    </select>
                    <input type="text" class="px-4 py-2 border border-gray-300 rounded-none focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Search...">
                    <button class="px-4 py-2 bg-blue-500 text-white rounded-r-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Search</button>
                </div>
                <table class="min-w-full divide-y divide-gray-200 border border-gray-300 mx-100" style="table-layout: fixed;">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left border-b">ID</th>
                            <th class="px-6 py-3 text-left border-b">SourceIp</th>
                            <th class="px-6 py-3 text-left border-b">SourcePort</th>
                            <th class="px-6 py-3 text-left border-b">DestIp</th>
                            <th class="px-6 py-3 text-left border-b">depport</th>
                            <th class="px-6 py-3 text-left border-b">Protocol</th>
                            <th class="px-6 py-3 text-left border-b">DataTime</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($alerts as $alert)
                            <tr>
                                <td class="px-6 py-4 border-b">{{ $alert->id }}</td>
                                <td class="px-6 py-4 border-b">{{ $alert->src_ip }}</td>
                                <td class="px-6 py-4 border-b">{{ $alert->src_port }}</td>
                                <td class="px-6 py-4 border-b">{{ $alert->dest_ip }}</td>
                                <td class="px-6 py-4 border-b">{{ $alert->dest_port }}</td>
                                <td class="px-6 py-4 border-b">{{ $alert->protocol }}</td>
                                <td class="px-6 py-4 border-b">{{ $alert->timestamp }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="px-6 py-4 border-b" colspan="7">There are no registered alerts</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
