<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <div class="table-container bg-gray-400">
        <ul class="my-3" style="margin-bottom: -1.25rem">
            <li class="text-left">
                <a href="{{ route('alerts.full') }}" class="bg-yellow-400 text-black hover:bg-blue-500 hover:text-white transition duration-300 ease-in-out px-4 py-2 rounded">
                    - Show more
                </a>
            </li>
        </ul>
        <div class="flex-grow">
           <table class="min-w-full divide-y divide-gray-200 border border-gray-300"  style="table-layout: fixed;">
        <caption class="py-4 text-lg font-bold font-sans text-red-500">Alerts Reports</caption>
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="px-6 py-3 text-left border-b">ID</th>
                <th class="px-6 py-3 text-left border-b">alert type</th>
                <th class="px-6 py-3 text-left border-b">classification</th>
                <th class="px-6 py-3 text-left border-b">priority</th>
                <th class="px-6 py-3 text-left border-b">Protocol</th>
                <th class="px-6 py-3 text-left border-b">destination</th>
                 <th class="px-6 py-3 text-left border-b">src_address</th>
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
                    <td class="px-6 py-4 border-b">{{ $alert->dest_address }}</td>
                    <td class="px-6 py-4 border-b">{{ $alert->src_address }}</td>
                    <td class="px-6 py-4 border-b">{{ $alert->timestamp }}</td>

                </tr>
            @empty
                <tr>
                    <td class="px-6 py-4 border-b" colspan="8">There s no register alerts </td>
                </tr>
            @endforelse
        </tbody>
    </table>
          </div>

</div>
</div>
</body>
</html>

