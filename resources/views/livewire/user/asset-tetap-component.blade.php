<div>
    <div class="flex items-center space-x-2 mb-5">
        <a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-primary">Home</a>
        <span class="text-gray-400 text-sm">/</span>
        <span class="text-gray-900 dark:text-gray-200">Asset-Tetap</span>
    </div>

    <div class="bg-gray-50 rounded p-8 soft-scrollbar mb-12 dark:bg-gray-800 transition duration-200 ">
        <div class="flex content-center mb-10">
            <div class="flex flex-none w-1/4">
                <h4 class="text-2xl font-semibold dark:text-slate-100">Asset Tetap</h4>
            </div>
            <div class="flex flex-initial w-3/4 justify-end">

                <x-button primary label="Tambah Asset Tetap" icon="plus" href="" />
                <x-button outline primary label="Print" icon="printer" href="" />

            </div>

        </div>
        <div class="mt-10">
            <livewire:table.asset-tetap-table />
        </div>
    </div>

</div>
<x-modal wire:model.defer="simpleModal">
    <x-card title="Consent Terms">
        <p class="text-gray-600">
            Lorem Ipsum...
        </p>

        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
                <x-button flat label="Cancel" x-on:click="close" />
                <x-button primary label="I Agree" />
            </div>
        </x-slot>
    </x-card>
</x-modal>
