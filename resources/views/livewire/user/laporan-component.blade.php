<div>
    <div class="flex items-center space-x-2 mb-5">
        <a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-primary">Home</a>
        <span class="text-gray-400 text-sm">/</span>
        <span class="text-gray-900 dark:text-gray-500">Laporan</span>
    </div>

    <div class="bg-gray-50 rounded p-8 soft-scrollbar mb-12 dark:bg-gray-800 transition duration-200 ">
        <div class="flex content-center mb-10">
            <div class="flex flex-none w-1/4">
                <h4 class="text-2xl font-semibold dark:text-slate-100">Laporan</h4>
            </div>
            <div class="flex flex-initial w-3/4 justify-end">

                <div class="mx-1">
                    <x-button primary label="Tambah Asset Tetap" icon="plus" href="" />
                </div>

                <x-button outline primary label="Print" icon="printer" href="" />

            </div>

        </div>
        <div class="mt-10 grid grid-cols-1">

            <div class="grid grid-cols-2 gap-8">
                <div class="flex flex-col my-2">
                    <span class="font-medium text-lg text-gray-900 dark:text-white mb-2">Finansial</span>
                    <a href=""
                        class="w-full p-2 border rounded-t border-gray-500 text-gray-500 hover:text-primary-500 hover:border-primary-500">
                        <span class="">Neraca</span>
                    </a>
                    <a href=""
                        class="w-full p-2 border border-gray-500 text-gray-500 hover:text-primary-500 hover:border-primary-500">
                        <span class="">Modal</span>
                    </a>
                    <a href=""
                        class="w-full p-2 border border-gray-500 text-gray-500 hover:text-primary-500 hover:border-primary-500">
                        <span class="">Arus Kas</span>
                    </a>
                    <a href=""
                        class="w-full p-2 border rounded-b border-gray-500 text-gray-500 hover:text-primary-500 hover:border-primary-500">
                        <span class="">Hutang Piutang</span>
                    </a>
                </div>


                <div class="flex flex-col my-2">
                    <span class="font-medium text-lg text-gray-900 dark:text-white mb-2">Akuntansi</span>
                    <a href=""
                        class="w-full p-2 border rounded-t border-gray-500 text-gray-500 hover:text-primary-500 hover:border-primary-500">
                        <span class="">Buku Besar</span>
                    </a>
                    <a href=""
                        class="w-full p-2 border border-gray-500 text-gray-500 hover:text-primary-500 hover:border-primary-500">
                        <span class="">Rinkasan Bank</span>
                    </a>
                    <a href=""
                        class="w-full p-2 border border-gray-500 text-gray-500 hover:text-primary-500 hover:border-primary-500">
                        <span class="">Jurnal</span>
                    </a>
                </div>
            </div>

        </div>
    </div>

</div>
