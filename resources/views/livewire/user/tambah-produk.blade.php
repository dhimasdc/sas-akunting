<div class="bg-gray-50 rounded p-6 soft-scrollbar dark:bg-gray-800 transition duration-200 z-99 h-full w-full">

    <span class="absolute right-4 top-2 text-xl font-bold m-2 mb-2 cursor-pointer hover:text-gray-800 dark:text-white"
        title="Close" wire:click="$emit('closeModal')">
        &#x2715
    </span>
    <span class="absolute left-4 top-2 text-xl m-2 mb-2" title="Title">
        <h1 class="font-medium mb-2 dark:text-white">Tambah Kontak</h1>
    </span>
    <div class="border border-b border-gray-200 mt-8 mb-4"></div>
    <form wire:submit.prevent="addProduk">
        <div class="my-1" x-data="{ openGambar: false }">
            <button type="button" @click="openGambar = !openGambar" id="openGambar"
                class=" text-primary-500 text-sm hover:text-primary-600 hover:underline">
                + Tampilkan Gambar Produk
            </button>
            <div x-cloak x-show="openGambar" class="mt-2">
                <label for="dropzone-file"
                    class="flex flex-col items-center justify-center w-full h-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-600 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                            </path>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                                upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                            800x400px)</p>
                    </div>
                    <input id="dropzone-file" type="file" class="hidden" wire:model="gambar" />
                </label>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="flex flex-col my-1">
                <label for="kategori" class="font-medium text-sm text-gray-900 dark:text-white mb-1"><span
                        class="text-red-500 font-bold">*</span> Kategori</label>
                <select wire:model="kategori" id="kategori"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option value=""></option>
                    @foreach ($kategories as $k)
                        <option value={{ $k->id }}>{{ $k->name }}</option>
                    @endforeach
                </select>
                @error('kategori')
                    <span class="text-xs" style="color: red"><small>{{ $message }}</small></span>
                @enderror
            </div>
        </div>


        <div class="grid grid-cols-3 gap-4">
            <div class="flex flex-col col-span-2 my-1">
                <label for="nama" class="font-medium text-sm text-gray-900 dark:text-white mb-1"><span
                        class="text-red-500 font-bold">*</span> Nama Produk</label>
                <input type="text" id="nama" wire:model="nama"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Nama Produk">
                @error('nama')
                    <span class="text-xs" style="color: red"><small>{{ $message }}</small></span>
                @enderror
            </div>
            <div class="flex flex-col my-1">
                <label for="sku" class="font-medium text-sm text-gray-900 dark:text-white mb-1">Kode/SKU</label>
                <input type="text" id="sku" wire:model="sku"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Kode/SKU">
                @error('sku')
                    <span class="text-xs" style="color: red"><small>{{ $message }}</small></span>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="flex flex-col my-1">
                <label for="satuan" class="font-medium text-sm text-gray-900 dark:text-white mb-1"><span
                        class="text-red-500 font-bold">*</span> Satuan</label>
                <select wire:model="satuan" id="satuan"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option value=""></option>
                    @foreach ($satuans as $s)
                        <option value={{ $s->id }}>{{ $s->name }}</option>
                    @endforeach
                </select>
                @error('satuan')
                    <span class="text-xs" style="color: red"><small>{{ $message }}</small></span>
                @enderror
            </div>
        </div>

        <div class="my-1">
            <label for="deskripsi" class="font-medium text-sm text-gray-900 dark:text-white mb-3">Deskripsi</label>
            <textarea rows="3" type="text" id="deskripsi" wire:model="deskripsi"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Deskripsi"></textarea>
            @error('deskripsi')
                <span class="text-xs" style="color: red"><small>{{ $message }}</small></span>
            @enderror
        </div>
        <div class="border border-b border-gray-200 mt-2 mb-2"></div>
        <div x-data="{ beli: true }">
            <div class="">
                <div class="flex flex-row my-1">
                    <div class="relative flex-initial  w-12 h-6 rounded-full transition duration-200 ease-linear"
                        :class="beli ? 'bg-primary-500' : 'bg-gray-400'">
                        <label for="h_beli"
                            class="absolute left-0 w-6 h-6 bg-white border-2 mb-2 rounded-full transition duration-100 ease-linear cursor-pointer"
                            :class=" beli ? 'translate-x-full border-primary-500' : 'translate-x-0 border-gray-400'"></label>
                        <input type="checkbox" id="h_beli" name="h_beli" class="focus:ring-0 hidden"
                            @click="beli = !beli">
                    </div>
                    <div class="flex-initial ml-2">
                        <label class="text-sm dark:text-white">Saya membeli item ini</label>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4" x-show="beli">
                <div class="flex flex-col my-1">
                    <label for="h_beli" class="font-medium text-sm text-gray-900 dark:text-white mb-1">Harga</label>
                    <input type="number" id="h_beli" wire:model="h_beli"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Harga Beli">
                    @error('h_beli')
                        <span class="text-xs" style="color: red"><small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>
            <div x-show="beli" class="border border-b border-gray-200 mt-2 mb-2"></div>
        </div>
        <div x-data="{ juals: true }">
            <div class="">
                <div class="flex flex-row my-1">
                    <div class="relative flex-initial w-12 h-6 rounded-full transition duration-200 ease-linear"
                        :class="juals ? 'bg-primary-500' : 'bg-gray-400'">
                        <label for="h_jual"
                            class="absolute left-0 w-6 h-6 bg-white border-2 mb-2 rounded-full transition duration-100 ease-linear cursor-pointer"
                            :class=" juals ? 'translate-x-full border-primary-500' : 'translate-x-0 border-gray-400'"></label>
                        <input type="checkbox" id="h_jual" name="h_jual" class="focus:ring-0 hidden"
                            @click="juals = !juals">
                    </div>
                    <div class="flex-initial ml-2">
                        <label class="text-sm dark:text-white">Saya menjual item ini</label>
                    </div>
                </div>

            </div>
            <div class="grid grid-cols-2 gap-4" x-show="juals">
                <div class="flex flex-col my-1">
                    <label for="h_jual" class="font-medium text-sm text-gray-900 dark:text-white mb-1">Harga</label>
                    <input id="h_jual" type="number" wire:model="h_jual"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Harga Jual">
                    @error('h_jual')
                        <span class="text-xs" style="color: red"><small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>
            <div x-show="juals" class="border border-b border-gray-200 mt-2 mb-2"></div>
        </div>
        <div class="flex flex-row-reverse mt-4 mb-2">
            <x-button wire:click="addProduk" icon="plus" spinner="addProduk" primary label="Tambah" />
            <div class="mx-1"></div>
            <x-button outline secondary label="Cancel" icon="x" wire:click="$emit('closeModal')" />
        </div>

    </form>
</div>
