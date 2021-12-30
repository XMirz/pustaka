<div class="relative bg-white w-full h-14 inset-x-0 text-gray-800  py-4 px-6 shadow-md-b">
  <div class=" flex flex-row justify-between md:justify-end">
    <div class="">
      <button onclick="showSidebar()" class="">
        <x-icons.menu />
      </button>
    </div>
    <div id="profile" class=" flex flex-row items-center space-x-2">
      <div class="">
        <span class="">{{auth()->user()->name}}</span>
      </div>
      <div class="flex items-center" x-data="{show : false}">
        <button x-on:click="show = !show">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
              clip-rule="evenodd" />
          </svg>
        </button>

        <div @click.outside="show = false" class="z-10 absolute right-6 top-full bg-white shadow-lg rounded-md py-2 "
          x-show="show">
          <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="w-full inline-flex items-center space-x-2 px-3 py-1 hover:bg-blue-500 hover:text-white transition-colors
              duration-200 transform ">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
              </svg>
              <span>Logout</span>
            </button>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>