<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <x-flash-message status="session('status')" />

                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-24 mx-auto">
                          <div class="flex flex-col text-center w-full mb-20">
                            <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">オーナー一覧</h1>

                          </div>
                          <button class="bg-blue-600 hover:bg-blue-500 text-white rounded px-4 py-2" onclick="location.href='{{route('mymy.owners.create')}}'">新規作成</button>
                          <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                            <table class="table-auto w-full text-left whitespace-no-wrap">
                              <thead>
                                <tr>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">名前</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">メールアドレス</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">作成日</th>

                                </tr>
                              </thead>
                              <tbody>
                                @foreach($owners as $owner)
                                <tr>
                                  <td class="px-4 py-3">{{$owner->name}}</td>
                                  <td class="px-4 py-3">{{$owner->email}}</td>
                                  <td class="px-4 py-3">{{$owner->created_at->diffForHumans()}}</td>

                                  <td class="px-4 py-3"><button onclick="location.href='{{route('mymy.owners.edit',['owner'=>$owner->id])}}'"
                                    class="bg-green-500 hover:bg-green-400 text-white rounded px-4 py-2">編集</button></td>

                                    {{-- <button onclick="location.href='{{route('mymy.fillauth.edit',['fillauth'=>$my->id])}}'"
                                        class="bg-green-500 hover:bg-green-400 text-white rounded px-4 py-2">編集</button> --}}
                                <form method="post"action="{{route('mymy.owners.destroy',['owner'=>$owner->id])}}">
                                    @csrf
                                    @method('DELETE')

                                  <td class="px-4 py-3"><button class="bg-red-500 hover:bg-red-400 text-white rounded px-4 py-2">削除</button></td>
                                </form>
                                </tr>
                                @endforeach

                              </tbody>
                            </table>
                          </div>

                        </div>
                      </section>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
