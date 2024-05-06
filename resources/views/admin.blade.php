<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Admin</title>
</head>

<body>
    <div class=" px-8 py-4 mt-2 border border-gray-900/10 rounded-md">
        @if (session('succes'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">{{ session('succes') }}</span>
            </div>
        @endif
        @if ($errors->any())
            <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4 my-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <span class="text-2xl font-bold text-gray-600">Create Menu</span>
        {{-- * CREATE FORM --}}

        <form id="menu-form" action="{{ url('/admin') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="space-y-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-8">
                    <div class="col-span-2">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="name" id="name"
                                    class="block outline-none flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="Menu Name" value="{{ old('name') }}">
                            </div>
                        </div>
                        <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Price</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="price" id="price"
                                    class="block outline-none flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="Price" value="{{ old('price') }}">
                            </div>
                        </div>
                    </div>


                    <div class="col-span-2 col-start-1 col-end-3">
                        <label for="desc"
                            class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                        <div class="mt-2">
                            <textarea id="desc" name="desc" rows="3"
                                class="block outline-none w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old('desc') }}</textarea>
                        </div>
                        <div class="">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="user_avatar">Upload
                                Image</label>
                            <input
                                class="block w-full text-sm p-2 text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="user_avatar_help" id="image" type="file" id="image"
                                name="image">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center gap-x-6 mb-4">
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </form>
    </div>

    {{-- * UPDATE FORM --}}
    <div class="mt-12 pt-12 border-t-4 divide-black">
        <span class="text-2xl font-bold text-gray-600">Update Menu</span>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                            <td class="p-4">
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

                                {{-- * MODAL TOGGLE  --}}

                                <button data-modal-target="editModal-{{ $item->id }}"
                                    data-modal-toggle="editModal-{{ $item->id }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>

                                {{-- * DELETE BUTTON --}}
                                <form method="post" action="{{ route('menu.delete', ['id' => $item->id]) }}"
                                    onsubmit="return confirm('Do You want to delete {{ $item->name }}')">
                                    @method('delete')
                                    @csrf
                                    <button
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>

                    {{-- * EDIT FORM/MODAL --}}

                    <div id="editModal-{{ $item->id }}" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full  justify-center items-center">
                        <div class="relative w-full max-w-2xl max-h-full">
                            <div class="relative bg-gray-100 rounded-lg shadow dark:bg-gray-700">
                                <div
                                    class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Edit <span class="text-gray-500">{{ $item->name }}</span>
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-toggle="editModal-{{ $item->id }}">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <div class="p-6 pt-0 space-y-6">
                                    <form action="{{ url('/admin/' . $item->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="mb-6">
                                            <label for="name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                            <input type="text" id="name" name="name"
                                                value="{{ $item->name }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required>
                                        </div>
                                        <div class="mb-6">
                                            <label for="price"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                            <input type="text" id="price" name="price"
                                                value="{{ $item->price }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required>
                                        </div>
                                        <div class="mb-6">
                                            <label for="desc"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                            <textarea id="desc" name="desc" rows="4"
                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required>{{ $item->desc }}</textarea>
                                        </div>
                                        <div class="mb-6">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                                for="image">Upload Image</label>
                                            <input
                                                class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                aria-describedby="image_help" id="image" type="file"
                                                name="image">
                                        </div>
                                        <button type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </table>
        </div>
    </div>
    <script>
        const modals = document.querySelectorAll('[data-modal-toggle]');

        modals.forEach(function(modal) {
            const modalId = modal.getAttribute('data-modal-toggle');
            const modalElement = document.getElementById(modalId);

            modal.addEventListener('click', function() {
                modalElement.classList.remove('hidden');
                modalElement.classList.add('flex')
            });

            const closeButtons = modalElement.querySelectorAll('[data-modal-toggle]');
            closeButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    modalElement.classList.add('hidden');
                    modalElement.classList.remove('flex')
                });
            });

            window.addEventListener('click', function(event) {
                if (event.target == modalElement) {
                    modalElement.classList.add('hidden');
                }
            });
        });
    </script>
</body>

</html>
