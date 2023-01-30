<div wire:ignore>
    <div class="flex items-center space-x-2 mb-5">
        <a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-primary">Home</a>
        <span class="text-gray-400 text-sm">/</span>
        <span class="text-gray-900 dark:text-gray-200">Kontak</span>
    </div>

    <div class="bg-gray-50 rounded p-8 soft-scrollbar mb-12 dark:bg-gray-800 transition duration-200 ">
        <div class="flex content-center mb-10">
            <div class="flex flex-none w-1/4" wire:key="kontak">
                <h4 class="text-2xl font-semibold dark:text-slate-100">Kontak</h4>
            </div>
            <div class="flex flex-initial w-3/4 justify-end">
                <div class="mx-1">
                    <x-button outline primary label="Grup" icon="plus" href="" />
                </div>
                <div class="mx-1">
                    <x-button primary label="Tambah Kontak" icon="plus"
                        wire:click="$emit('openModal', 'user.tambah-kontak')" />

                </div>
                <x-button outline primary label="Print" icon="printer" href="" />

            </div>

        </div>

        <div class="mt-10">
            @livewire('table.kontak-table')
        </div>

    </div>

</div>
