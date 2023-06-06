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
    @if (session('status'))
    <div class="bg-green-300 text-green-800 p-4 mb-4 rounded" id="successdel-alert">
        {{ session('status') }}
    </div>
    <script>
              setTimeout(function(){
            var successAlert = document.getElementById('successdel-alert');
            if (successAlert) {
                successAlert.style.display = 'none';
            }
        }, 4000);
    </script>
    @endif
    @if (session('edit'))
    <div class="bg-green-300 text-green-800 p-4 mb-4 rounded" id="successedit-alert">
        {{ session('edit') }}
    </div>
    <script>
          setTimeout(function(){
        var successAlert = document.getElementById('successedit-alert');
        if (successAlert) {
            successAlert.style.display = 'none';
        }
    }, 4000);
    </script>
    @endif

    <div class="table-container bg-gray-400">
        <div class="flex-grow">
           <table class="min-w-full divide-y divide-red-200 border border-gray-300 bg-white text-black"  style="table-layout: fixed;">
        <thead class="bg-red-500 text-white">
            <tr>
                <th class="px-6 py-3 text-left border-b">ID</th>
                <th class="px-6 py-3 text-left border-b">Name</th>
                <th class="px-6 py-3 text-left border-b">SurNames</th>
                <th class="px-6 py-3 text-left border-b">State</th>
                <th class="px-6 py-3 text-left border-b">Login</th>
                <th class="px-6 py-3 text-left border-b">Edit</th>
                <th class="px-6 py-3 text-left border-b">Delete</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($usuarios as $usuario)
                <tr>
                    <td class="px-6 py-4 border-b">{{ $usuario->id }}</td>
                    <td class="px-6 py-4 border-b">{{ $usuario->name }}</td>
                    <td class="px-6 py-4 border-b">{{ $usuario->surnames }}</td>
                    <td class="px-6 py-4 border-b">{{ $usuario->idStatus }}</td>
                    <td class="px-6 py-4 border-b">{{ $usuario->login }}</td>
                    <td class="px-6 py-4 border-b">
                        <a href="{{ route('edit', ['id' => $usuario->id]) }}" class="text-blue-900">Modify</a>
                    </td>
                    <td class="px-6 py-4 border-b">
                        <a href="{{ route('delete', ['id' => $usuario->id]) }}" class="text-red-500 delete-link" onclick="return confirmDelete()">Erase</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="px-6 py-4 border-b" colspan="8">There s no registered users </td>
                </tr>
            @endforelse
        </tbody>
    </table>
          </div>

</div>
<ul class="my-3" style="margin-bottom: -1.25rem">
    <li class="text-left">
        <a href="{{ route('index') }}" class="bg-green-400 text-white hover:bg-blue-500 hover:text-white transition duration-300 ease-in-out px-4 py-2 rounded">
            + Add new
        </a>
    </li>
</ul>
</div>
<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this user?');
    }
</script>
</body>
</html>

