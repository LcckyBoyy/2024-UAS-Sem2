
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" px-8 py-4 mt-2">
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

                    <form id="menu-form" action="{{ url('/dashboard') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="space-y-12">
                            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-8">
                                <div class="col-span-2">
                                    <label for="name"
                                        class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                    <div class="mt-2">
                                        <div
                                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                            <input type="text" name="name" id="name"
                                                class="block outline-none flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                placeholder="Menu Name" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                    <label for="price"
                                        class="block text-sm font-medium leading-6 text-gray-900">Price</label>
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
                                    <div>
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                            for="user_avatar">Upload
                                            Image</label>
                                        <input
                                            class="block w-full text-sm p-2 text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                            aria-describedby="user_avatar_help" id="image" type="file"
                                            id="image" name="image"">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center gap-x-6 mb-4">
                            <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

