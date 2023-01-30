<div>
    <div class="flex items-center space-x-2 mb-5">
        <a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-primary-500">Home</a>
        <span class="text-gray-400 text-sm">/</span>
        <a href="{{ route('user.pembelian.overview') }}" class="text-gray-400 hover:text-primary=500">Pembelian</a>
        <span class="text-gray-400 text-sm">/</span>
        <span class="text-gray-900 dark:text-gray-200">Penawaran</span>
    </div>

    <div class="bg-gray-50 rounded p-8 soft-scrollbar mb-12 dark:bg-gray-800 transition duration-200 ">
        <div class="flex content-center mb-10">
            <div class="flex flex-none w-1/4">
                <h4 class="text-2xl font-semibold dark:text-slate-100">Penawaran Pembelian</h4>
            </div>
            <div class="flex flex-initial w-3/4 justify-end">
                <div class="mx-1">
                    <x-button primary label="Tambah Penawaran" icon="plus"
                        href="{{ route('user.pembelian.penawaran.tambah') }}" />
                </div>
                <x-button outline primary label="Print" icon="printer" href="" />
            </div>

        </div>
        <div class="mt-10">
            <livewire:table.pembelian-penawaran />
        </div>
    </div>

</div>
