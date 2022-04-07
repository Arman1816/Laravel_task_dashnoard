@extends('layouts.app')

@section('content')
    @if(count($tasks))
        <div class="container mx-auto">
            <h1 class="text-center text-5xl my-4">To Do Tasks</h1>
            <div class="lg:grid lg:grid-cols-3 gap-4 my-4 space-y-2 sm:space-y-4 md:space-y-2 lg:space-y-0">
                @foreach($tasks as $task)
                    <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white dark:bg-gray-900">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2 dark:text-gray-200">{{$task->title}}</div>
                            <p class="text-gray-600 dark:text-gray-300 text-base leading-relaxed">
                                {{$task->description}}
                            </p>
                        </div>
                        <div class="px-6">
                            <strong class="text-gray-600 dark:text-gray-300 text-base leading-relaxed">
                                Number of required images:	 {{$task->required_images}}
                            </strong>
                        </div>
                        <div class="px-6 pt-4 pb-2">
                            <a href="{{route('start.task', ['taskId' => $task->id])}}" class="inline-block bg-green-100 dark:bg-green-500 hover:bg-green-200 focus:outline-none rounded-full px-3 py-1 text-sm font-semibold text-gray-700 dark:text-gray-200 mr-2 mb-2 transform hover:scale-110 motion-reduce:transform-none">
                                Start Task
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="container mx-auto">
            <h1 class="text-center text-5xl my-4">In Progress</h1>
            <div class="lg:grid lg:grid-cols-3 gap-4 my-4 space-y-2 sm:space-y-4 md:space-y-2 lg:space-y-0">
                <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white dark:bg-gray-900">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2 dark:text-gray-200">{{$task->title}}</div>
                        <p class="text-gray-600 dark:text-gray-300 text-base leading-relaxed">
                            {{$task->description}}
                        </p>
                    </div>
                    <div class="px-6">
                        <strong class="text-gray-600 dark:text-gray-300 text-base leading-relaxed">
                            Number of required images:	 {{$task->required_images}}
                        </strong>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                        <a href="{{route('start.task', ['taskId' => $task->id])}}" class="inline-block bg-green-100 dark:bg-green-500 hover:bg-green-200 focus:outline-none rounded-full px-3 py-1 text-sm font-semibold text-gray-700 dark:text-gray-200 mr-2 mb-2 transform hover:scale-110 motion-reduce:transform-none">
                            Continue Task
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
