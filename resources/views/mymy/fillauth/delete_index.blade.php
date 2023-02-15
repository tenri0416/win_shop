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


                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-24 mx-auto">
                          <div class="flex flex-col text-center w-full mb-20">
                            <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">削除済みユーザー</h1>

                          </div>
                          <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                            <table class="table-auto w-full text-left whitespace-no-wrap">
                              <thead>
                                <tr>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">名前</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">メールアドレス</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">削除した日付</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($expiredMymys as $my)
                                <tr>
                                  <td class="px-4 py-3">{{$my->name}}</td>
                                  <td class="px-4 py-3">{{$my->email}}</td>
                                  <td class="px-4 py-3">{{$my->deleted_at->diffForHumans()}}</td>
                                  <form method="post"action="{{route('mymy.expired-fillauth.restore',['fillauth'=>$my->id])}}">
                                    @csrf
                                    <td class="px-4 py-3">
                                        <button type="submit"class="bg-green-500 hover:bg-green-400 text-white rounded px-4 py-2">復元</button>
                                    </td>
                                </form>
                                <form method="post"action="{{route('mymy.expired-fillauth.forcedelete',['fillauth'=>$my->id])}}">
                                    @csrf
                                <td class="px-4 py-3">
                                    <button class="bg-red-600 hover:bg-red-500 text-white rounded px-4 py-2">削除</button>
                                </td>
                                </form>

                                </tr>
                                @endforeach

                              </tbody>
                            </table>
                            <button
                            type="button"onclick="location.href='{{ route('mymy.fillauth.index') }}' "
                            class=" text-white bg-gray-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg w-50">戻る</button>
                          </div>


                        </div>
                      </section>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
