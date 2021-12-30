<x-dashboard-layout>
  <x-slot name="title">Category buku</x-slot>
  <x-section-card class="">
    <x-section-header title="Tambah kategory">
    </x-section-header>
    <div class="">
      @dump($errors)
      <form action="{{route('categories.update',['category' => $category])}}" method="POST">
        <div class="flex flex-row space-x-8 my-4">
          <div class="flex-1 flex flex-col space-y-4">
            <div class="flex flex-col space-y-2">
              <x-label for="name" :value="__('Nama Category')" />
              <x-input id="name" name="name" type="text" placeholder="Nama" :value="old('name', $category->name)"
                required autofocus />
            </div>

            <div class="flex flex-col space-y-2">
              <x-label for="place" :value="__('Tempat')" />
              <x-input id="place" name="place" type="number" placeholder="Rak" :value="old('place',$category->place)"
                required autofocus />
            </div>
            <div class="flex flex-col space-y-2">
              <x-label for="category_code" :value="__('Kode')" />
              <x-input readonly="" class="bg-gray-200" id="category_code" name="category_code" type="text" maxlength="2"
                placeholder="Kode (2 digit)" :value="old('category_code', $category->category_code)" required
                autofocus />
            </div>
          </div>
        </div>
        @csrf
        @method('PUT')
        <x-button class="">
          {{ __('Simpan') }}
        </x-button>
      </form>
    </div>
  </x-section-card>
  {{-- <x-slot name="script">
  </x-slot> --}}
</x-dashboard-layout>