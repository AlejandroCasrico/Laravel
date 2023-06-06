<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="bg-gray-400">
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-4">
            <i class="fas fa-user-edit mr-2"></i>Editar Usuario
        </h1>

        <form action="{{ route('update',['id' => $usuario->id]) }}" method="POST" class="max-w-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-black font-bold">Nombre:</label>
                <div class="relative">
                    <input type="text" id="name" name="name" required pattern="^[A-Za-z\s]+$" maxlength="100" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-400" value="{{ $usuario->name }}">
                    <i class="fas fa-user text-gray-400 absolute top-3 right-3"></i>
                </div>
                @error('name')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="surnames" class="block text-black font-bold">Apellidos:</label>
                <div class="relative">
                    <input type="text" id="surnames" name="surnames" required pattern="^[A-Za-z\s]+$" maxlength="100" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-400"
                        value="{{ $usuario->surnames }}">
                    <i class="fas fa-users text-gray-400 absolute top-3 right-3"></i>
                </div>
                @error('surnames')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="status" class="block text-black font-bold">Estado:</label>
                <div class="relative">
                    <select id="status" name="status" class="w-full px-4 py-2 border border-gray-300 rounded" value="{{ $usuario->idStatus }}">
                        <option value="1" {{ $usuario->idStatus == 1 ? 'selected' : '' }}>Activo</option>
                        <option value="2" {{ $usuario->idStatus == 2 ? 'selected' : '' }}>Bajo</option>
                    </select>
                    <i class="fas fa-check text-gray-400 absolute top-3 right-3"></i>
                </div>
                @error('status')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="login" class="block text-black font-bold">Login:</label>
                <div class="relative">
                    <input type="email" id="login" name="login" required  class="w-full px-4 py-2 border border-gray-300 rounded" value="{{ $usuario->login }}">
                    <i class="fas fa-envelope text-gray-400 absolute top-3 right-3"></i>
                </div>
                @error('login')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 flex justify-end">
                <button type="submit" class="bg-red-500 hover:bg-gray-300 text-white font-bold py-2 px-4 rounded ml-2">
                    <i class="fas fa-save mr-2"></i>Guardar
                </button>
                <a href="{{ route('home') }}" class="bg-red-500 hover:bg-gray-300 text-white font-bold py-2 px-4 rounded ml-2">
                    <i class="fas fa-times mr-2"></i>Cancelar
                </a>
            </div>
        </form>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
