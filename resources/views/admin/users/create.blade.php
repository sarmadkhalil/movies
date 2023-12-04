<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Administration!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <form action="{{route('admin.users.store')}}" method="post">
                    @csrf
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6" placeholder="Add your name here">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="block w-full rounded-md border-0 py-1.5 pt-3 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6" placeholder="Add your name here">
                    
                    <button type="submit" class="border border-dark-400 text-dark-400 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-gray-900 hover:text-white focus:outline-none focus:shadow-outline">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>