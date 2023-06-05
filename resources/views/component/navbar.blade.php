<div class="flex flex-col md:flex-row">
    <div class="flex-shrink-0 bg-red-500 h-auto md:w-1/4">
      <div class="flex flex-col items-center p-4">
        <h2 class="text-white text-lg">Welcome</h2>
        <div class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-gray-500 mb-4">
          <img src="/assets/profile.png" alt="Profile Picture" class="w-full h-full rounded-full">
        </div>
        <h3 class="text-white text-xl">Nombre de usuario</h3>
        <div class="relative mt-4">
          <button class="flex items-center text-white text-sm focus:outline-none">
            <span class="mr-1">Mi Perfil</span>
            <i class="fas fa-user"></i>
          </button>
          <ul class="absolute right-0 mt-2 bg-white rounded-md shadow-lg py-1">
            <li>
              <p>Apellido</p>
            </li>
            <li>
              <p>Correo</p>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="flex-grow">
      @include('component.body')
    </div>
  </div>
