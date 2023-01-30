<div class="bg-gray-50 rounded p-6 soft-scrollbar dark:bg-gray-800 transition duration-200 z-99 h-full">

    <span class="absolute right-4 top-2 text-xl font-bold m-2 mb-2 cursor-pointer hover:text-gray-800 dark:text-white"
        title="Close" wire:click="$emit('closeModal')">
        &#x2715
    </span>
    <span class="absolute left-4 top-2 text-xl m-2 mb-2" title="Title">
        <h1 class="font-medium mb-2 dark:text-white">Tambah Kontak</h1>
    </span>
    <div class="border border-b border-gray-200 mt-8 mb-4"></div>
    <form wire:submit.prevent="addKontak">
        <div class="my-1">
            <label for="tipe" class="font-medium text-sm text-gray-900 dark:text-white mb-2"><span
                    class="text-red-500 font-bold">*</span> Tipe Kontak</label>
            <select wire:model="tipe" id="tipe"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                <option value=""></option>
                <option value="vendor">Vendor</option>
                <option value="karyawan">Karyawan</option>
                <option value="pelanggan">Pelanggan</option>
                <option value="lainnya">Lainnya</option>
            </select>
            @error('tipe')
                <span class="text-xs" style="color: red"><small>{{ $message }}</small></span>
            @enderror
        </div>
        <div class="my-1">
            <label for="nama" class="font-medium text-sm text-gray-900 dark:text-white mb-2"><span
                    class="text-red-500 font-bold">*</span> Nama</label>
            <input type="text" id="nama" wire:model="nama"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Nama">
            @error('nama')
                <span class="text-xs" style="color: red"><small>{{ $message }}</small></span>
            @enderror
        </div>
        <div class="my-1">
            <label for="perusahaan" class="font-medium text-sm text-gray-900 dark:text-white mb-2">Perusahaan</label>
            <input type="text" id="perusahaan" wire:model="perusahaan"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Perusahaan">
            @error('perusahaan')
                <span class="text-xs" style="color: red"><small>{{ $message }}</small></span>
            @enderror
        </div>
        <div class="my-1">
            <label for="alamat" class="font-medium text-sm text-gray-900 dark:text-white mb-2">Alamat</label>
            <textarea rows="3" type="text" id="alamat" wire:model="alamat"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Alamat"></textarea>
            @error('alamat')
                <span class="text-xs" style="color: red"><small>{{ $message }}</small></span>
            @enderror
        </div>
        <div class="my-1">
            <label for="email" class="font-medium text-sm text-gray-900 dark:text-white mb-2"><span
                    class="text-red-500 font-bold">*</span> Email</label>
            <input type="text" id="email" wire:model="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Email">
            @error('email')
                <span class="text-xs" style="color: red"><small>{{ $message }}</small></span>
            @enderror
        </div>
        <div class="my-1">
            <label for="telepon" class="font-medium text-sm text-gray-900 dark:text-white mb-2"><span
                    class="text-red-500 font-bold">*</span> Telepon</label>
            <input type="text" id="telepon" wire:model="telepon"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Telepon">
            @error('telepon')
                <span class="text-xs" style="color: red"><small>{{ $message }}</small></span>
            @enderror
        </div>
        <div class="flex flex-row-reverse mt-4 mb-2">
            <x-button wire:click="addKontak" icon="plus" spinner="addKontak" primary label="Tambah" />
            <div class="mx-1"></div>
            <x-button outline secondary label="Cancel" icon="x" wire:click="$emit('closeModal')" />
        </div>

    </form>
</div>
