<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vote for movies!') }}
        </h2>
        <p class="mt-3">Get recommendations for movies based on your voting pattern.</p>
    </x-slot>

    <div class="py-12">
        <div class="grid place-items-center">
            <div class="bg-white rounded-md bg-gray-800 shadow-lg">
                <div class="md:flex px-4 leading-none max-w-4xl">
                    <div class="flex-none ">
                        <img src="https://creativereview.imgix.net/content/uploads/2019/12/joker_full.jpg?auto=compress,format&q=60&w=1012&h=1500" alt="pic" class="h-72 w-56 rounded-md shadow-2xl transform -translate-y-4 border-4 border-gray-300 shadow-lg" />
                    </div>

                    <div class="flex-col text-dark-300">

                        <p class="pt-4 pl-2 text-2xl font-bold">Joker (2020)</p>
                        <hr class="hr-text" data-content="">
                        <div class="text-md flex justify-between px-5 my-2">
                            <span class="font-bold">2h 2min | Crime, Drama, Thriller</span>
                            <span class="font-bold"></span>
                        </div>
                        <p class="hidden md:block px-5 my-4 text-sm text-left">In Gotham City, mentally troubled comedian Arthur Fleck is disregarded and mistreated by society. He then embarks on a downward spiral of revolution and bloody crime. This path brings him face-to-face with his alter-ego: the Joker. </p>

                        <p class="flex text-md px-5 my-2">
                            Votes: 9.0/10
                            <span class="font-bold px-2">|</span>
                            Mood: Dark
                        </p>

                        <div class="pl-2 text-xs">
                            <button type="button" class="border border-dark-400 text-dark-400 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-gray-900 hover:text-white focus:outline-none focus:shadow-outline">TRAILER</button>

                            <button type="button" class="border border-dark-400 text-dark-400 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-gray-900 hover:text-white focus:outline-none focus:shadow-outline">IMDB</button>

                            <button type="button" class="border border-dark-400 text-dark-400 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-gray-900 hover:text-white focus:outline-none focus:shadow-outline">AMAZON</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</x-app-layout>