@if (session()->has('type'))
<div id="flashMessage"
  class="bg-green-200 border border-green-500/50  py-2 w-full flex flex-row justify-between rounded-md shadow-md text-white">
  <h4 class="pl-8 text-green-700 font-semibold">{{session('message')}}</h4>
  <button onclick="closeMessage()" class="mr-2 text-gray-600">
    <x-icons.cross-circle />
  </button>
</div>
@endif