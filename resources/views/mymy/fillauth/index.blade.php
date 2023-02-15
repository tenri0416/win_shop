<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
         Myユーザー確認画面
        </h2>
        <a href="{{route('mymy.expired-fillauth.index')}}">
            <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 20x; height: 20px; opacity: 1;" xml:space="preserve">
                <style type="text/css">
                    .st0{fill:#4B4B4B;}
                </style>
                <g>
                    <path class="st0" d="M439.114,69.747c0,0,2.977,2.1-43.339-11.966c-41.52-12.604-80.795-15.309-80.795-15.309l-2.722-19.297
                    C310.387,9.857,299.484,0,286.642,0h-30.651h-30.651c-12.825,0-23.729,9.857-25.616,23.175l-2.722,19.297
                    c0,0-39.258,2.705-80.778,15.309C69.891,71.848,72.868,69.747,72.868,69.747c-10.324,2.849-17.536,12.655-17.536,23.864v16.695
                    h200.66h200.677V93.611C456.669,82.402,449.456,72.596,439.114,69.747z" style="fill: rgb(75, 75, 75);"></path>
                    <path class="st0" d="M88.593,464.731C90.957,491.486,113.367,512,140.234,512h231.524c26.857,0,49.276-20.514,51.64-47.269
                    l25.642-327.21H62.952L88.593,464.731z M342.016,209.904c0.51-8.402,7.731-14.807,16.134-14.296
                    c8.402,0.51,14.798,7.731,14.296,16.134l-14.492,239.493c-0.51,8.402-7.731,14.798-16.133,14.288
                    c-8.403-0.51-14.806-7.722-14.296-16.125L342.016,209.904z M240.751,210.823c0-8.42,6.821-15.241,15.24-15.241
                    c8.42,0,15.24,6.821,15.24,15.241v239.492c0,8.42-6.821,15.24-15.24,15.24c-8.42,0-15.24-6.821-15.24-15.24V210.823z
                    M153.833,195.608c8.403-0.51,15.624,5.894,16.134,14.296l14.509,239.492c0.51,8.403-5.894,15.615-14.296,16.125
                    c-8.403,0.51-15.624-5.886-16.134-14.288l-14.509-239.493C139.026,203.339,145.43,196.118,153.833,195.608z" style="fill: rgb(75, 75, 75);"></path>
                </g>
            </svg>
        </a>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <x-flash-message status="session('status')" />


                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-24 mx-auto">
                      <div class="flex flex-col text-center w-full mb-20">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">My ユーザー一覧</h1>

                      </div>
                      <div class="flex flex-wrap -m-2">
                          @foreach($mymys as $my)
                        <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                          <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                            <img alt="team" class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/80x80">
                            <div class="flex-grow">
                              <h2 class="text-gray-900 title-font font-medium">{{$my->name}}</h2>
                              <p class="text-gray-500">{{$my->email}}</p>

                              <p class="text-gray-500">{{$my->created_at->diffForHumans()}}</p>
                            </div>
                            {{-- <button
                            onclick="location.href='{{ route('admin.owners.edit', ['owner' => $owner->id]) }}'"
                            class=" text-white bg-blue-300 border-0 py-2 px-4 focus:outline-none hover:bg-blue-500 rounded ">編集</button> --}}

                            <button onclick="location.href='{{route('mymy.fillauth.edit',['fillauth'=>$my->id])}}'"
                                class="bg-green-500 hover:bg-green-400 text-white rounded px-4 py-2">編集</button>

                            <form method="post"action="{{route('mymy.fillauth.destroy',['fillauth'=>$my->id])}}">
                                @csrf
                                @method('DELETE')
                            <button type="submit"class="bg-red-500 hover:bg-red-400 text-white rounded px-4 py-2"onclick="deletePost(this)">削除</button>
                            </form>
                        </div>
                    </div>
                    @endforeach

                </div>


            </div>
        </div>
    </section>
    {{$mymys->links()}}

            </div>
        </div>
    </div>
    <script>
        function deletePost(e) {
        'use strict';
        if (confirm('本当に削除してもいいですか?')) {
        document.getElementById('delete_' + e.dataset.id).submit();
        }
        }
        </script>
</x-app-layout>
