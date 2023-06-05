
<header>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<div class="block bg-red-500 text-white p-4 flex justify-between items-center">
    <h4 class="text-md text-left" id="fecha">Date:</h4>
    <img src="/assets/logoal.png" class="rounded" alt="logo" height="200px" width="200px">
    <div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-black hover:bg-red-700 text-white py-2 px-4 rounded">
                <i class="fas fa-sign-out-alt mr-2"></i> Get out
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

</header>
