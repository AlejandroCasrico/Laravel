<div class="flex flex-grow">
    <div class="flex-shrink-0 bg-red-500 h-auto" style="width: 17rem;">
      <div class="flex flex-col items-center p-4">
        <h2 class="text-white text-lg">Welcome</h2>
        <div class="w-16 h-16 rounded-full bg-gray-500 mb-4">
          <img src="/assets/profile.png" alt="Profile Picture" class="w-full h-full rounded-full">
        </div>
        <h3 class="text-white text-xl">{{ $usuario->name }}</h3>
        <div class="relative mt-4">
          <div class="flex text-center items-center text-white text-sm focus:outline-none" style="margin-left: 31%">
            <span class="mr-1 text-center">My Profile</span>
            <i class="fas fa-user"></i>
          </div>
          <h5 class="text-white">Surnames:</h5>
            <li class="text-white">
              {{ $usuario->surnames }}
            </li>
            <h5 class="text-white">Mail:</h5>
            <li class="text-white">
              {{ $usuario->login }}
            </li>

        </div>
      </div>
    </div>

    <div class="flex-grow">
      @include('component.body')
    </div>
  </div>
