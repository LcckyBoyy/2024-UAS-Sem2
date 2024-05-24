<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (session('succes'))
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                        role="alert">
                        <span class="font-medium">{{ session('succes') }}</span>
                    </div>
                @endif
                <div class="mt-8">
                    <span class="text-2xl font-bold text-gray-600 px-8">Update Menu</span>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-16 py-3">
                                        <span class="sr-only">Image</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Product
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Price
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Desc
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>

                            {{-- * DISPLAY DATA --}}

                            @foreach ($data as $item)
                                <tbody>
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="p-4 pl-12">
                                            <img src="{{ asset('storage/' . $item->image) }}"
                                                class="w-16 md:w-32 max-w-full max-h-full" alt="{{ $item->name }}">
                                        </td>
                                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                            {{ $item->name }}
                                        </td>
                                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                            {{ $item->price }}
                                        </td>
                                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                            {{ $item->desc }}
                                        </td>
                                        <td class="px-6 py-4">

                                            {{-- * EDIT BUTTON  --}}

                                            <a href="/dashboard/{{ $item->id }}/edit"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>

                                            {{-- * DELETE BUTTON --}}
                                            <form method="post" action="dashboard/{{ $item->id }}/delete" onsubmit="return confirm('Do You want to delete {{ $item->name }} from the menu')"> 
                                                @csrf
                                                @method('delete') 
                                                <button 
                                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                                    Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
