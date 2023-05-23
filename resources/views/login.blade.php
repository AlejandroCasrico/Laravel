<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body class="bg-green-700">
    <div class="flex justify-center items-center h-screen">
    <div class="bg-teal-400 p-8 rounded shadow-md">
        <h2 class="text-2xl mb-4">Login</h2>
        <form method="POST" action="{{ route('login') }}">
            {{csrf_field()}}

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="name" id="name" name="name" required
                       class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-400">
                    @error('name')
                        <span>{{ $message }}</span>
                    @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" id="password" name="password" required
                       class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-400">
                       @error('password')
                       <span>{{ $message }}</span>
                   @enderror
            </div>
            <div>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Login</button>
            </div>
        </form>
    </div>
    </div>
</body>
</html>
