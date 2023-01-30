<div class="bg-gray-50 rounded p-6 soft-scrollbar dark:bg-gray-800 transition duration-200 z-99 h-full">

    <span class="absolute right-4 top-2 text-xl font-bold m-2 mb-2 cursor-pointer hover:text-gray-800 dark:text-white"
        title="Close" wire:click="$emit('closeModal')">
        &#x2715
    </span>
    <span class="absolute left-4 top-2 text-xl m-2 mb-2" title="Title">
        <h1 class="font-medium mb-2 dark:text-white">Tambah Banking</h1>
    </span>
    <div class="border border-b border-gray-200 mt-8 mb-4"></div>
    <form wire:submit.prevent="addBanking">
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
            <label for="kode" class="font-medium text-sm text-gray-900 dark:text-white mb-2"><span
                    class="text-red-500 font-bold">*</span> Kode</label>
            <input type="text" id="Kode" wire:model="kode"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="kode">
            @error('kode')
                <span class="text-xs" style="color: red"><small>{{ $message }}</small></span>
            @enderror
        </div>
        <div class="my-1">
            <label for="kategori" class="font-medium text-sm text-gray-900 dark:text-white mb-2"><span
                    class="text-red-500 font-bold">*</span> Kategori</label>
            <select wire:model="kategori" id="kategori"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                <option value=""></option>
                <option value="Banking">Banking</option>
                <option value="Kredit">Kredit</option>
            </select>
            @error('kategori')
                <span class="text-xs" style="color: red"><small>{{ $message }}</small></span>
            @enderror
        </div>
        <div class="my-1">
            <label for="sub_akun" class="font-medium text-sm text-gray-900 dark:text-white mb-2">Sub
                Akun dari</label>
            <select wire:model="sub_akun" id="sub_akun"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                <option value=""></option>
                @foreach ($sub as $s)
                    <option value={{ $s->id }}>{{ $s->kode }} - {{ $s->name }}</option>
                @endforeach

            </select>
            @error('sub_akun')
                <span class="text-xs" style="color: red"><small>{{ $message }}</small></span>
            @enderror
        </div>
        <div class="flex flex-row-reverse mt-4 mb-2">
            <x-button wire:click="addBanking" icon="plus" spinner="addBanking" primary label="Tambah" />
            <div class="mx-1"></div>
            <x-button outline secondary label="Cancel" icon="x" wire:click="$emit('closeModal')" />
        </div>
    </form>
</div>
