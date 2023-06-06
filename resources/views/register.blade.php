<html>
<head>
  <title>Formulario de edición</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="bg-slate-800">

  <div class="flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded shadow-md">
      <h1 class="text-3xl font-bold flex items-center">
        <i class="fas fa-user-plus text-2xl mr-2"></i>
        Registro de usuario
      </h1>
      @if (session('success'))
        <div class="bg-green-500 text-white px-4 py-2 rounded mt-4">
            {{ session('success') }}
        </div>
      @endif
      <form action="{{ route('usuarios.insertar') }}" method="POST" class="mt-4">
        @csrf

        <div class="mb-4">
          <label for="name" class="block font-bold">
            <i class="fas fa-user text-gray-400"></i> Nombre:
          </label>
          <input type="text" id="name" name="name" required maxlength="255" class="w-full px-4 py-2 border border-gray-300 rounded" value="{{$usuario['name']}}">
          @error('name')
          <span class="text-red-500">{{ $message }}</span>
          @enderror
        </div>

        <div class="mb-4">
          <label for="surnames" class="block font-bold">
            <i class="fas fa-user text-gray-400"></i> Apellidos:
          </label>
          <input type="text" id="surnames" name="surnames" required maxlength="255" class="w-full px-4 py-2 border border-gray-300 rounded" value="{{ $usuario['surnames'] }}">
          @error('surnames')
          <span class="text-red-500">{{ $message }}</span>
          @enderror
        </div>

        <div class="mb-4">
          <label for="password" class="block font-bold">
            <i class="fas fa-lock text-gray-400"></i> Contraseña:
          </label>
          <input type="password" id="password" name="password" required minlength="8" class="w-full px-4 py-2 border border-gray-300 rounded" value="{{ $usuario['password'] }}">
          @error('password')
          <span class="text-red-500">{{ $message }}</span>
          @enderror
        </div>

        <div class="mb-4">
          <label for="status" class="block font-bold">
            <i class="fas fa-check-circle text-gray-400"></i> Estado:
          </label>
          <select id="status" name="status" required class="w-full px-4 py-2 border border-gray-300 rounded">
            <option value="1">Activo</option>
            <option value="2">Bajo</option>
          </select>
          @error('status')
          <span class="text-red-500">{{ $message }}</span>
          @enderror
        </div>

        <div class="mb-4">
          <label for="login" class="block font-bold">
            <i class="fas fa-envelope text-gray-400"></i> Login:
          </label>
          <input type="email" id="login" name="login" required maxlength="255" class="w-full px-4 py-2 border border-gray-300 rounded" value="{{ old('login') }}">
          @error('login')
          <span class="text-red-500">{{ $message }}</span>
          @enderror
        </div>

        <div>
          <input type="submit" value="Registrarse" class="bg-gray-400 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
        </div>
      </form>
    </div>
  </div>

  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
