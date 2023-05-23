<div class="bg-stone-400 shadow-md rounded-lg overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200 border border-gray-300">
        <caption class="py-4 text-lg font-bold font-sans text-red-500">Listado de usuarios</caption>
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="px-6 py-3 text-left border-b">ID</th>
                <th class="px-6 py-3 text-left border-b">Nombre</th>
                <th class="px-6 py-3 text-left border-b">Apellidos</th>
                <th class="px-6 py-3 text-left border-b">Estado</th>
                <th class="px-6 py-3 text-left border-b">Login</th>
                <th class="px-6 py-3 text-left border-b">Editar</th>
                <th class="px-6 py-3 text-left border-b">Ver</th>
                <th class="px-6 py-3 text-left border-b">Eliminar</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($usuarios as $usuario)
                <tr>
                    <td class="px-6 py-4 border-b">{{ $usuario->id }}</td>
                    <td class="px-6 py-4 border-b">{{ $usuario->name }}</td>
                    <td class="px-6 py-4 border-b">{{ $usuario->surnames }}</td>
                    <td class="px-6 py-4 border-b">{{ $usuario->login }}</td>
                    <td class="px-6 py-4 border-b">{{ $usuario->idStatus }}</td>
                    <td class="px-6 py-4 border-b">
                        <a href="{{ route('edit', ['id' => $usuario->id]) }}" class="text-red-500">Editar</a>
                    </td>
                    <td class="px-6 py-4 border-b">
                        <a href="{{ route('detail', ['id' => $usuario->id]) }}" class="text-blue-500">Ver</a>
                    </td>
                    <td class="px-6 py-4 border-b">
                        <a href="{{ route('delete', ['id' => $usuario->id]) }}" class="text-red-500">Eliminar</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="px-6 py-4 border-b" colspan="8">No hay usuarios registrados</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <ul class="my-4">
        <li class="text-right">
            <a href="{{ route('index') }}" class="text-blue-500 hover:bg-blue-500 hover:text-white transition duration-300 ease-in-out px-4 py-2 rounded">
                Agregar Nuevo
            </a>
        </li>
    </ul>
</div>
