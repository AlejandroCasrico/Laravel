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
            <div class="bg-blue-500 p-10 w-1/2">
                <a href="">Alerta</a>
                <div class="bg-blue-500 text-white p-4">
                    Segundo div
                </div>
                <div class="bg-green-500 text-white p-4">
                    Tercer div
                </div>
                <div class="bg-orange-500 text-white p-4">
                    Cuarto div
                </div>
            </div>
            <div class="bg-red-500 text-white p-5 w-1/2">
                <p>Texto</p>
            </div>
        </div>
    </div>
    <div class="bg-cyan-800 text-white p-12 h-[603px]">
        @include('lista', ['usuarios' => $usuarios])
    </div>
</div>
