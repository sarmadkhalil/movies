<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vote for movies!') }}
        </h2>
        <p class="mt-3">Get recommendations for movies based on your voting pattern.</p>
    </x-slot>

    <div class="py-2 place-content-center">
        @forelse ($ratings as $rating)
        <div class="grid place-items-center pt-9">
            <div class="bg-white rounded-md bg-gray-800 shadow-lg">
                <div class="md:flex px-5 leading-none max-w-4xl">
                    <div class="flex-none ">
                        <img src="https://image.tmdb.org/t/p/original/{{$rating->movie->poster_path}}" alt="pic" class="h-72 w-56 rounded-md shadow-2xl transform -translate-y-4 border-4 border-gray-300 shadow-lg" />
                    </div>

                    <div class="flex-col text-dark-300">

                        <p class="pt-4 pl-2 text-2xl font-bold">{{$rating->movie->title}}</p>
                        <hr class="hr-text" data-content="">
                        <div class="text-md flex justify-between px-5 my-2">
                            <span class="font-bold"> {{$rating->movie->release_date}} | {{$rating->movie->genre}}</span>
                            <span class="font-bold"></span>
                        </div>
                        <p class="hidden md:block px-5 my-4 text-sm text-left">{{$rating->movie->overview}} </p>

                        <p class="flex text-md px-5 my-2">
                            Votes: {{$rating->movie->votes}}/10
                            <span class="font-bold px-2">|</span>
                            User Rating: {{$rating->rating}} / 5
                        </p>

                        <div class="pl-2 text-xs">
                            <button type="button" class="border border-dark-400 text-dark-400 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-gray-900 hover:text-white focus:outline-none focus:shadow-outline">TRAILER</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="py-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <p>No History</p>
                </div>
            </div>
        </div>

        @endforelse

    </div>

</x-app-layout>