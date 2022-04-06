@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="p-4 my-10 w-full text-center bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form class="bg-smoke-dark p-6 md:p-10 rounded w-full shadow-lg" style="background-color: rgba(0, 0, 0, 0.6);">
                <h1 class="font-serif text-2xl md:text-3xl leading-tight text-center font-normal text-white mb-8">Find images and add to task</h1>
                <div class="flex flex-wrap items-end -mx-3">
                    <div class="w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-password">Keywords</label>
                        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey" id="grid-password" type="search" placeholder="Search for images">
                    </div>
                    <div class="w-full md:w-1/3 px-3 md:mb-0">
                        <button class="font-bold leading-tight bg-red-500 hover:bg-red-700 border border border-red-700 w-full text-white uppercase tracking-wide py-3 px-4 rounded">Search</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="p-4 my-10 w-full text-center bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">{{$task->title}}</h5>
            <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">{{$task->description}}</p>
            <strong class="text-gray-600 dark:text-gray-300 text-base leading-relaxed">
                Number of required images:	 {{$task->required_images}}
            </strong>
            <div class="justify-center items-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                <div class="px-6 pt-4 pb-2">
                    <button  class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Started</button>
                    <button class="inline-block bg-blue-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">In Progress</button>
                    <button class="inline-block bg-green-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Done</button>
                </div>
            </div>
        </div>
    </div>
@endsection
