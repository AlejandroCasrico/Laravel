<div class="flex flex-col">
    <div class="block bg-gray-500 text-white p-4 flex justify-between items-center">
        <h4 class="text-md text-left" id="fecha">Date:</h4>
        <h1 class="text-3xl text-center underline">Alerts</h1>
        <div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded">
                    Get out
                </button>
            </form>
        </div>
        <script>
            var fechaActual = new Date();
            var dia = fechaActual.getDate();
            var mes = fechaActual.getMonth() + 1;
            var anio = fechaActual.getFullYear();
            var fechaFormateada = dia + "/" + mes + "/" + anio;
            document.getElementById("fecha").textContent = "Date: " + fechaFormateada;
        </script>
    </div>
    <div class="block bg-gray-500 text-white p-4">
        <div class="flex">
        </div>
        <div class="bg-white text-white p-12 border-gray-700 mt-4">
            <h3 class="text-black text-center text-2xl">Reports</h3>
            @include('reportes')
        </div>
    </div>
    <div class="bg-white text-white p-12 border-gray-700  ">
        <h3 class="text-black text-center text-2xl ">User administration</h3>
        @include('lista')
    </div>
</div>
