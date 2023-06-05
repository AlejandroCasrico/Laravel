
    <div class="flex flex-grow">
    <div class="flex-shrink-0 bg-gray-900 h-auto" style="width: 20rem;">
      <div class="flex flex-col items-center p-4">
        <h2 class="text-white text-sm">Welcome</h2>
        <div class="w-10 h-10 rounded-full bg-gray-500 mb-2"></div>
        <h3 class="text-white">{{ $session['name'] }}</h3>
        <div class="relative mt-4">
          <button class="flex items-center text-white text-sm focus:outline-none">
            <span>Mi Perfil</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="ml-1 h-4 w-4">
              <path fill-rule="evenodd" d="M10 12a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
            </svg>
          </button>
          <div class="absolute right-0 mt-2 bg-gray-700 rounded-md shadow-lg">
            <ul class="py-1">
              <li>
                <a href="#" class="block px-4 py-2 text-sm text-white hover:bg-gray-600">Opción 1</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 text-sm text-white hover:bg-gray-600">Opción 2</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 text-sm text-white hover:bg-gray-600">Opción 3</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="flex-grow">
     @include('component.body')
      </div>

    </div>
  </div>
