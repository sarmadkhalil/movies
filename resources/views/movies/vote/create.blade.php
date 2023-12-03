<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$movie->title}}
        </h2>
        <p class="mt-3">Rate this movie to get better recommendations</p>
    </x-slot>

    <div class="py-2 place-content-center">
        <div class="grid place-items-center pt-9">
            <div class="bg-white rounded-md bg-gray-800 shadow-lg">
                <img src="https://image.tmdb.org/t/p/original/{{$movie->backdrop_path}}" id="vote-cover-image" alt="pic" class="rounded-md" />
                <div class="md:flex px-5 leading-none max-w-4xl">
                    <div class="flex-none ">
                        <img src="https://image.tmdb.org/t/p/original/{{$movie->poster_path}}" alt="pic" class="h-72 w-56 rounded-md shadow-2xl transform -translate-y-12 border-4 border-gray-300 shadow-lg" />
                    </div>

                    <div class="flex-col pl-2 text-dark-300">

                        <p class="pt-4 pl-md-2 text-2xl font-bold">{{$movie->title}}</p>
                        <hr class="hr-text" data-content="">
                        <div class="text-md flex justify-between  my-2">
                            <span class="font-bold"> {{$movie->release_date}} | {{$movie->genre}}</span>
                            <span class="font-bold"></span>
                        </div>

                        <p class=" my-md-4 text-sm text-left">{{$movie->overview}} </p>

                        <p class="flex text-md  my-2">
                            Rating: {{$movie->votes}}/10
                        </p>

                        <hr>

                        <div class="pl-md-5 pt-4">
                            <h3 class="text-lg text-gray-800 leading-tight">Add your vote : </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>