<x-app-layout>
    <x-slot name="header">
        <div class="bg-emerald-700 pt-8 pb-16 relative ">
            <div class="container px-6 mx-auto flex flex-col lg:flex-row items-start lg:items-center justify-between">
                <div class="flex-col flex lg:flex-row items-start lg:items-center">
                    <div class="ml-0 lg:ml-0 my-6 lg:my-0">
                        <h4 class="text-2xl font-bold leading-tight text-white mb-2">{{ $product ? __('Edit Product') :  __('New Product') }}</h4>
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
        <form class="bg-white p-4" action="{{$product ?  route('products.update',$product): route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full">
                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Product Title</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-full">
                                    <input type="text" name="title" id="title"  value="{{$product ? $product->title : old('title') }}" autocomplete="off" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Product title">
                                </div>
                                @error('title')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                            <div class="mt-2">
                                <textarea id="description" name="description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                                      {{ $product ? $product->description : old('description') }}
                                </textarea>
                               @error('description')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <p class="mt-3 text-sm leading-6 text-gray-600">Information about the product.</p>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
                            <div class="mt-2">
                                <select id="category" name="category"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    @foreach($categories as $cat)
                                        <option {{ old('category', $product ? $product->category_id : '') ==  $cat->id  ? 'selected' : '' }} class="capitalize" value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="status" class="block text-sm font-medium leading-6 text-gray-900">Status</label>
                            <div class="mt-2">
                                <select id="status" name="status" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    <option {{ old('status', $product ? $product->status : '') == 'active' ? 'selected' : '' }} value="active" class="capitalize">active</option>
                                    <option {{ old('status',$product ? $product->status : '' ) == 'draft' ? 'selected' : '' }} value="draft" class="capitalize">draft</option>
                                    <option {{ old('status', $product ? $product->status : '') == 'inactive' ? 'selected' : '' }} value="inactive" class="capitalize">inactive</option>
                                </select>
                                @error('status')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="bestseller" class="block text-sm font-medium leading-6 text-gray-900">Bestseller</label>
                            <div class="mt-2">

                                <div class="sm:flex sm:items-center sm:space-x-10 sm:space-y-0">
                                    <div class="flex items-center">
{{--                                        best seller check--}}
                                        <input id="bestseller-false" name="bestseller" type="radio"  {{$bestsellerToggle == 0 ? 'checked':''}} value="0" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        <label for="bestseller-false" class="ml-3 block text-sm font-medium leading-6 text-gray-900">False</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="bestseller" name="bestseller" type="radio"  {{$bestsellerToggle == 1 ? 'checked':''}} value="1"  class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        <label for="bestseller" class="ml-3 block text-sm font-medium leading-6 text-gray-900">True</label>
                                    </div>
                                </div>
                                @error('category')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-span-2">
                        <label for="main" class="block text-sm font-medium leading-6 text-gray-900">Main Image <p class="text-xs leading-5 text-gray-600">PNG, JPG, 10MB</p></label>
                        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                            <div class="text-center">
                                <input type="file" id="main"  value="{{ old('main') }}" name="main" accept="image/png, image/jpeg , image/jpg" />

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
                                    <input type="file" id="file-upload" value="{{ old('file-upload[]') }}" name="file-upload[]" accept="image/png, image/jpeg , image/jpg"  multiple/>

                                    @error('file-upload')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                    @error('file-upload.*')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-span-2 px-6">
                            <label for="main" class="block text-sm font-medium leading-6 text-gray-900">Main Image</label>
                            <div class=" flex justify-center rounded-lg  px-6">
                                <div class="text-center">
                                 <img  src="{{$product->main_image}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-4">
                            <div class="grid grid-cols-4 gap-4">
                                @foreach($images as $key=>$img)
                                    <img  src="{{$img}}" />

                                @endforeach
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
                                <input type="text" name="quickcode" value="{{$product ? $product->quickcode : old('quickcode') }}" id="quickcode" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('quickcode')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="sku" class="block text-sm font-medium leading-6 text-gray-900">SKU</label>
                            <div class="mt-2">
                                <input type="text" name="sku" id="sku"  value="{{$product ? $product->sku :  old('sku') }}"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('sku')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="baseprice" class="block text-sm font-medium leading-6 text-gray-900">Base Price</label>
                            <div class="mt-2">
                                <input type="text" id="baseprice" name="baseprice"  value="{{ $product ? $product->price : old('baseprice') }}"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('baseprice')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-2 sm:col-start-1">
                            <label for="tier1" class="block text-sm font-medium leading-6 text-gray-900">Tier1 Price</label>
                            <div class="mt-2">
                                <input type="text" id="tier1" name="tier1" value="{{ $product ? $product->tier1 : old('tier1') }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('tier1')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="tier2" class="block text-sm font-medium leading-6 text-gray-900">Tier2 Price</label>
                            <div class="mt-2">
                                <input type="text" id="tier2" name="tier2" value="{{ $product ? $product->tier2 : old('tier2') }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('tier2')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="tier3" class="block text-sm font-medium leading-6 text-gray-900">Tier3 Price</label>
                            <div class="mt-2">
                                <input type="text" id="tier3" name="tier3" value="{{ $product ? $product->tier3 : old('tier3') }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('tier3')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <p class="col-span-full text-center text-red-500 text-sm">If adding a Trust Mobile product, please ensure the Base Price and tier pricing is the weekly price of the product NOT the full price</p>
                    </div>
                </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="{{route('products.index')}}" class="text-sm font-semibold leading-6 text-red-900">Cancel</a>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>


        </form>
    </div>
</x-app-layout>
