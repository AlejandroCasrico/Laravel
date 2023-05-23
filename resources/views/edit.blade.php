<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-red-400">
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-4">Editar Usuario</h1>
        <form action="{{ route('update',['id' => $usuario->id]) }}" method="POST" class="max-w-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold">Nombre:</label>
                <input type="text" id="name" name="name" required pattern="^[A-Za-z\s]+$" maxlength="100" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-400" value="{{ $usuario->name }}">
                @error('name')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="surnames" class="block text-gray-700 font-bold">Apellidos:</label>
                <input type="text" id="surnames" name="surnames" required pattern="^[A-Za-z\s]+$" maxlength="100" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-400"
                    value="{{ $usuario->surnames }}">
                @error('surnames')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700 font-bold">Estado:</label>
                <select id="status" name="status" class="w-full px-4 py-2 border border-gray-300 rounded" value="{{ $usuario->idStatus }}">
                    <option value="1" {{ $usuario->idStatus == 1 ? 'selected' : '' }}>Activo</option>
                    <option value="2" {{ $usuario->idStatus == 2 ? 'selected' : '' }}>Bajo</option>
                </select>
                @error('status')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="login" class="block text-gray-700 font-bold">Login:</label>
                <input type="text" id="login" name="login" required maxlength="255" class="w-full px-4 py-2 border border-gray-300 rounded" value="{{ $usuario->login }}">
                @error('login')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-orange-700 hover:bg-blue-200 text-white font-bold py-2 px-4 rounded">Guardar</button>
            </div>
        </form>
    </div>
</body>
</html>
