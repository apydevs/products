<x-app-layout>
    <x-slot name="header">
        <div class="bg-emerald-700 pt-8 pb-16 relative ">
            <div class="container px-6 mx-auto flex flex-col lg:flex-row items-start lg:items-center justify-between">
                <div class="flex-col flex lg:flex-row items-start lg:items-center">
                    <div class="ml-0 lg:ml-0 my-6 lg:my-0">
                        <h4 class="text-2xl font-bold leading-tight text-white mb-2">{{ __('New Product') }}</h4>
                        <p class="flex items-center text-gray-300 text-xs">
                            <a href="{{route('dashboard')}}">
                                <span class="cursor-pointer">CRM</span>
                            </a>
                            <span class="mx-2">&gt;</span>
                            <a href="{{route('products.index')}}" >
                                <span class="cursor-pointer {{request()->routeIs('products.create') ? 'font-semibold':''}}">Products New</span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </x-slot>

    <div class="container px-6 mx-auto">
        <form class="bg-white p-4" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full">
                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Product Title</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-full">
                                    <input type="text" name="title" id="title" autocomplete="off" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Product title">
                                </div>
                                @error('title')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                            <div class="mt-2">
                                <textarea id="description" name="description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                @error('description')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <p class="mt-3 text-sm leading-6 text-gray-600">Information about the product.</p>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
                            <div class="mt-2">
                                <select id="category" name="category" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    @foreach($categories as $cat)
                                        <option class="capitalize" value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="status" class="block text-sm font-medium leading-6 text-gray-900">Status</label>
                            <div class="mt-2">
                                <select id="status" name="status" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    <option value="active" class="capitalize">active</option>
                                    <option value="draft" class="capitalize">draft</option>
                                    <option value="disabled" class="capitalize">disabled</option>
                                </select>
                                @error('status')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                    <div class="col-span-2">
                        <label for="main" class="block text-sm font-medium leading-6 text-gray-900">Main Image <p class="text-xs leading-5 text-gray-600">PNG, JPG, 10MB</p></label>
                        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                            <div class="text-center">
                                <input type="file" id="main" name="main" accept="image/png, image/jpeg , image/jpg" />

                                @error('main')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                                @error('main.*')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                        <div class="col-span-4">
                            <label for="file-upload" class="block text-sm font-medium leading-6 text-gray-900">Product Images <p class="text-xs leading-5 text-gray-600">PNG, JPG, 10MB</p></label>
                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                <div class="text-center">
                                    <input type="file" id="file-upload" name="file-upload[]" accept="image/png, image/jpeg , image/jpg"  multiple/>

                                    @error('file-upload')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                    @error('file-upload.*')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-b border-gray-900/10 pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-2 sm:col-start-1">
                            <label for="quickcode" class="block text-sm font-medium leading-6 text-gray-900">QuickCode</label>
                            <div class="mt-2">
                                <input type="text" name="quickcode" id="quickcode" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('quickcode')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="sku" class="block text-sm font-medium leading-6 text-gray-900">SKU</label>
                            <div class="mt-2">
                                <input type="text" name="sku" id="sku" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('sku')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="baseprice" class="block text-sm font-medium leading-6 text-gray-900">Base Price</label>
                            <div class="mt-2">
                                <input type="text" id="baseprice" name="baseprice" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('baseprice')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-2 sm:col-start-1">
                            <label for="tier1" class="block text-sm font-medium leading-6 text-gray-900">Tier1 Price</label>
                            <div class="mt-2">
                                <input type="text" id="tier1" name="tier1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('tier1')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="tier2" class="block text-sm font-medium leading-6 text-gray-900">Tier2 Price</label>
                            <div class="mt-2">
                                <input type="text" id="tier2" name="tier2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('tier2')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="tier3" class="block text-sm font-medium leading-6 text-gray-900">Tier3 Price</label>
                            <div class="mt-2">
                                <input type="text" id="tier3" name="tier3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('tier3')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <p class="col-span-full text-center text-red-500 text-sm">If product is a contract phone, please use base price and tiers as weekly price not contract total price.</p>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>
    </div>
</x-app-layout>
