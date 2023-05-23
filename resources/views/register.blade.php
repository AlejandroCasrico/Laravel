<html>
<head>
  <title>Formulario de edicion</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-indigo-400">

  <div class="flex justify-center items-center h-screen">
    <div class="bg-sky-400 p-8 rounded shadow-md">
      <h1 class="text-3xl font-bold">Registro de usuario</h1>
  <form action="{{ route('guardar') }}" method="POST" class="mt-4">
    {{csrf_field()}}

    <div class="mb-4">
      <label for="name" class="block">Name:</label>
      <input type="text" id="name" name="name" required required maxlength="255" class="w-full px-4 py-2 border border-gray-300 rounded" value="{{$usuario['name']}}">
      @error('name')
      <span class="text-red-500">{{ $message }}</span>
    @enderror

    </div>

    <div class="mb-4">
      <label for="surnames" class="block">surnames:</label>
      <input type="text" id="surnames" name="surnames" required maxlength="255" class="w-full px-4 py-2 border border-gray-300 rounded" value="{{ $usuario['surnames'] }}">
      @error('surnames')
      <span class="text-red-500">{{ $message }}</span>
    @enderror
    </div>

    <div class="mb-4">
      <label for="password" class="block">Password:</label>
      <input type="password" id="password" name="password" required minlength="8"  class="w-full px-4 py-2 border border-gray-300 rounded"value="{{ $usuario['password'] }}">
      @error('password')
      <span class="text-red-500">{{ $message }}</span>
    @enderror
    </div>
    <div class="mb-4">
        <label for="status" class="block">Estado:</label>
        <select id="status" name="status" class="w-full px-4 py-2 border border-gray-300 rounded">
          <option value="1">Activo</option>
          <option value="2">Bajo</option>
        </select>
        @error('status')
          <span class="text-red-500">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-4">
        <label for="login" class="block">Login:</label>
        <input type="text" id="login" name="login" required maxlength="255" class="w-full px-4 py-2 border border-gray-300 rounded" value="{{ old('login') }}">
        @error('login')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
      </div>
    <div>
      <input type="submit" value="Registrarse" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    </div>
  </form>
    </div>
</div>
</body>
</html>
