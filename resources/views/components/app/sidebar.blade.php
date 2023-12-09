<div>
    <!-- Sidebar backdrop (mobile only) -->
    <div
        class="fixed inset-0 bg-white bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200"
        :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'"
        aria-hidden="true"
        x-cloak
    ></div>

    <!-- Sidebar -->
    <div
        id="sidebar"
        class=" bg-white border-r border-gray-300 h-full flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 bg-white p-4 transition-all duration-200 ease-in-out"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'"
        @click.outside="sidebarOpen = false"
        @keydown.escape.window="sidebarOpen = false"
        x-cloak="lg">

        <!-- Sidebar header -->
        <div class="flex justify-between mb-10 pr-3 sm:px-2">
            <!-- Close button -->
            <button class="lg:hidden text-slate-500 hover:text-slate-400" @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar" :aria-expanded="sidebarOpen">
                <span class="sr-only">Close sidebar</span>
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
                </svg>
            </button>
            <!-- Logo -->
            <a class="block" href="{{ route('dashboard') }}">
              <div class="flex items-center">
                <!-- Sesuaikan ikon jika diperlukan -->
                <img src="{{ asset('images/smartfarm_logo.svg') }}" viewBox="0 0 24 24">
            </div>
            </a>
        </div>

        <!-- Links -->
        <div class="space-y-8">
            <!-- Pages group -->
            <div>
              <ul class="mt-3">
                    <!-- Dashboard -->
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if(Request::segment(1) == 'dashboard'){{ 'bg-white-900' }}@endif">
                      <a class="block text-black-200 text-lg hover:text-black truncate transition duration-150 @if(Request::segment(1) == 'dashboard'){{ 'hover:text-slate-200' }}@endif" href="{{ route('dashboard') }}">
                          <div class="flex items-center justify-between">
                              <div class="flex items-center">
                                  <!-- Sesuaikan ikon jika diperlukan -->
                                  <img src="{{ asset('images/home_icon.svg') }}"  class="w-23 h-23 ml-3 shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                  <span class="text-lg font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Dashboard</span>
                              </div>
                          </div>
                      </a>
                    </li>
                    
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if(Request::segment(1) == 'daftar-farmer'){{ 'bg-white-900' }}@endif">
                      <a class="block text-black-200 text-lg hover:text-black truncate transition duration-150 @if(Request::segment(1) == 'daftar-farmer'){{ 'hover:text-slate-200' }}@endif" href="{{ route('daftar-farmer') }}">
                          <div class="flex items-center justify-between">
                              <div class="flex items-center">
                                  <!-- Sesuaikan ikon jika diperlukan -->
                                  <img src="{{ asset('images/farmer_icon.svg') }}"  class="w-23 h-23 ml-3 shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                  <span class="text-lg font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Daftar Farmer</span>
                              </div>
                          </div>
                      </a>
                    </li>


                  <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if(Request::segment(1) == 'daftar-lahan'){{ 'bg-white-900' }}@endif">
                    <a class="block text-black-200 text-lg hover:text-black truncate transition duration-150 @if(Request::segment(1) == 'daftar-lahan'){{ 'hover:text-slate-200' }}@endif" href="{{ route('daftar-lahan') }}">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <!-- Sesuaikan ikon jika diperlukan -->
                                <img src="{{ asset('images/farmer_icon.svg') }}"  class="w-23 h-23 ml-3 shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                <span class="text-lg font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Daftar Lahan</span>
                            </div>
                        </div>
                    </a>
                  </li>

                <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if(Request::segment(1) == 'daftar-sensor'){{ 'bg-white-900' }}@endif">
                  <a class="block text-black-200 text-lg hover:text-black truncate transition duration-150 @if(Request::segment(1) == 'daftar-sensor'){{ 'hover:text-slate-200' }}@endif" href="{{ route('daftar-sensor') }}">
                      <div class="flex items-center justify-between">
                          <div class="flex items-center">
                              <!-- Sesuaikan ikon jika diperlukan -->
                              <img src="{{ asset('images/farmer_icon.svg') }}"  class="w-23 h-23 ml-3 shrink-0 h-6 w-6" viewBox="0 0 24 24">
                              <span class="text-lg font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Daftar Sensor</span>
                          </div>
                      </div>
                  </a>
                </li>    
              </ul>

            </div>
        </div>

        <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100vh;">
            <div id="animatedRectangle" style="width: 206px; height: 86px; background-color: #ffffff; display: none; margin-bottom: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); border-radius: 5px;">
              <div class="mt-3">
                <div class=" info flex item-center mx-4">
                  <img src="{{ asset('images/user_button_icon.svg') }}" alt="User Image" style="width: 21px; height: 21px; object-fit: cover;" class="mx-2">
                  <div class="mx-2" style="font-size: 16px;">Theresa Webb</div>
                </div>
                <div class="logout flex  item center mx-4 mt-4">
                    <img src="{{ asset('images/logout_icon.svg') }}" alt="User Image" style="width: 21px; height: 21px; object-fit: cover;" class="mx-2">
                    <div class="mx-2" style="font-size: 16px;">Log Out</div>
                </div>
              </div>
            </div>
        
            <button id="showRectangle" style="width: 247px; height: 84px; border-radius: 24px; padding: 8px; margin-bottom: 10px;" class="bg-green-500 border-none rounded-2xl p-8 flex flex-col justify-center items-start text-white font-sans text-left">
              <div class="flex items-center mt-2 ml-4">
                <div class="img w-14 h-14 overflow-hidden rounded-full mb-4 align-top">
                  <img src="{{ asset('images/user_besar_icon.svg') }}" alt="User Image" style="width: 100%; height: 100%; object-fit:cover;">
                </div>
                <div class="text ml-4 mb-5">
                  <div class="text-xl mb-2">Theresa Webb</div>
                  <div class="text-sm">Admin</div>
                </div>
              </div> 
            </button>
          </div>
        
          <script>
            // JavaScript to show the rectangle on button click
            document.getElementById('showRectangle').addEventListener('click', function() {
              var container = document.getElementById('animatedRectangle');
        
              // Toggle class to initiate animation
              container.style.display = (container.style.display === 'none') ? 'block' : 'none';
            });
          </script>

    </div>
</div>