@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="p-4 my-10 w-full text-center bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700" x-data="image()">
            <form class="bg-smoke-dark p-6 md:p-10 rounded w-full shadow-lg" style="background-color: rgba(0, 0, 0, 0.6);">
                <h1 class="font-serif text-2xl md:text-3xl leading-tight text-center font-normal text-white mb-8">Find images and add to task</h1>
                <div class="flex flex-wrap items-end -mx-3">
                    <div class="w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-password">Keywords</label>
                        <input x-model="search" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey" id="grid-password" type="search" placeholder="Search for images">
                        <button type="button"  @click="getImage()" class=" my-10 inline-block bg-blue-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Search</button>
                    </div>
                </div>
            </form>

            <div class="grid grid-cols-3 gap-4 mt-3">
                <template x-for="image in images">
                    <div class="max-w-lg mx-auto">
                        <div class=" text-sm leading-6 text-slate-600 dark:text-slate-400">
                            <template x-if="image.title">
                                <h2 x-text="image.title" class="text-center my-4">To Do Tasks</h2>
                            </template>

                            <template x-if="image.preview_url">
                                <div class="flex flex-wrap justify-center">
                                    <img :src="image.preview_url" class="max-w-xs h-auto shadow-lg"/>
                                </div>
                            </template>

                            <template x-if="image.description">
                                <h2 x-text="image.description" class="text-center my-4">To Do Tasks</h2>
                            </template>
                            <template x-if="image.assets">
                                <div class="flex flex-wrap justify-center">
                                    <img :src="image.assets.preview.url" class="max-w-xs h-auto shadow-lg"/>
                                </div>
                            </template>

                            <template x-if="image.assets">
                                <button @click="addImageToTask(image.assets.preview.url)" class="bg-grey-light my-4 bg-green-200 hover:bg-green text-grey-darkest font-bold py-2 px-4 rounded inline-flex items-center">
                                    Add To Task
                                </button>
                            </template>

                            <template x-if="image.preview_url">
                                <button @click="addImageToTask(image.preview_url)" class="bg-grey-light my-4 bg-green-200 hover:bg-green text-grey-darkest font-bold py-2 px-4 rounded inline-flex items-center">
                                    Add To Task
                                </button>
                            </template>
                        </div>
                    </div>

                </template>
            </div>

        </div>

        <div class="p-4 my-10 w-full text-center bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">{{$task->title}}</h5>
            <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">{{$task->description}}</p>
            <strong class="text-gray-600 dark:text-gray-300 text-base leading-relaxed">
                Number of required images:	 {{$task->required_images}}
            </strong>
            <br>
            <strong class="text-gray-600 dark:text-gray-300 text-base leading-relaxed">
                Number of added images:	 {{$task->images->count()}}
            </strong>
            <div class="justify-center items-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                <div class="px-6 pt-4 pb-2">
                    @if($task->images->count() >= $task->required_images)
                        <a href="{{route('task.completed', ['taskId' => $task->id])}}" class="inline-block bg-yellow-200 rounded-full px-3 py-1 text-sm font-semibold text-yellow-700 mr-2 mb-2">Done</a>
                    @else
                        <button  class="inline-block bg-blue-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">In Progress</button >
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function image() {
            return {
                search: '',
                images: {},
                getImage() {
                    this.error = ''
                    this.images = {}
                    fetch('/search/' + this.search).then((res) => res.json())
                        .then((res) => {
                           console.log(res)
                           this.images = res;
                    })
                },

                addImageToTask(url){
                    fetch('/add-image-to-task',{
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.head.querySelector('meta[name=csrf-token]').content
                        },
                        body: JSON.stringify({
                            url: url,
                            taskId: {{$task->id}},
                        })
                    }).then((res) => res.json())
                        .then((res) => {
                            location.reload();

                        })
                }
            }
        }
    </script>
@endsection
