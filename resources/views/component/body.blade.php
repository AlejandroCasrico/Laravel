@include('section.header')
<div class="flex flex-col bg-gray-200">
    <div class="flex">
    <div class="bg-gray-200 text-white p-12 border-gray-700">
        <h3 class="text-black text-center text-2xl underline">Dashboard</h3>
        @include('reportes')
    </div>
    <div class="bg-gray-200 text-white p-6 border-black">
        <h3 class="text-black text-center text-2xl underline">Reports</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-red-500">
                    <tr>
                        <th class="py-2 px-4 bg-red-500 text-left text-white">Incidentes de seguridad confirmados</th>
                        <th class="py-2 px-4 bg-red-500 text-left text-white">Total de alertas</th>
                        <th class="py-2 px-4 bg-red-500 text-left text-white">Acciones correctivas</th>
                        <th class="py-2 px-4 bg-red-500 text-left text-white">Falsos positivos</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 px-4 border text-black bg-white">{{ $detail->severidad ?? '' }}</td></td>
                        <td class="py-2 px-4 border text-black bg-white">{{ $totalAlert }} </td>
                        <td class="py-2 px-4 border text-black bg-white"> {{ $detail->accionesCorrectivas ?? ''}}</td>
                        <td class="py-2 px-4 border text-black  bg-white">{{ $detail->incidentesConfirmado ?? ''}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-gray-200 text-white p-12 border-gray-700">
        <h3 class="text-black text-center text-2xl underline">User administration</h3>
        @include('lista')
    </div>

</div>
