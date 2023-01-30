<div class="overflow-x-hiden">

    <div class="flex items-center space-x-2 mb-5">
        <a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-primary-500">Home</a>
        <span class="text-gray-400 text-sm">/</span>
        <a href="{{ route('user.penjualan.overview') }}" class="text-gray-400 hover:text-primary-500">Penjualan</a>
        <span class="text-gray-400 text-sm">/</span>
        <a href="{{ route('user.penjualan.pengiriman') }}" class="text-gray-400 hover:text-primary-500">Pengiriman</a>
        <span class="text-gray-400 text-sm">/</span>
        <span class="text-gray-900 dark:text-gray-200">Detail</span>
    </div>
    <div class="bg-gray-50 rounded p-8 soft-scrollbar mb-12 dark:bg-gray-800 transition duration-200 ">
        <div class="flex content-center mb-10">
            <div class="flex flex-none w-1/3">
                <h4 class="text-2xl font-semibold dark:text-gray-100">Detil Pengiriman - {{ $pengiriman->kode }}</h4>
            </div>
            <div class="flex flex-initial w-2/3 justify-end">

                <x-button warning label="Kembali" icon="chevron-left" href="{{ route('user.penjualan.pengiriman') }}" />

            </div>

        </div>


        <div class="border border-grey-200 grid grid-cols-1 gap-2 rounded">
            <div class="mt-0 border-b border-grey-200 p-6 grid grid-cols-2 gap-4">
                <div class="flex flex-col ">
                    @if ($pengiriman->status == 'Diproses')
                        <span class="inline-block align-middle text-sm text-orange-500 font-semibold">
                            Diproses
                        </span>
                    @elseif ($pengiriman->status == 'Dikirim')
                        <span class="inline-block align-middle text-sm text-teal-500 font-semibold">
                            Dikirim
                        </span>
                    @elseif ($pengiriman->status == 'Sampai')
                        <span class="inline-block align-middle text-sm text-green-600 font-semibold">
                            Sampai
                        </span>
                    @endif
                </div>
                <div class="flex flex-col-2 flex-row-reverse">
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                        class="text-gray-800 font-bold hover:text-gray-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm px-1 py-2 text-center inline-flex items-center dark:text-white"
                        type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="black" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign
                                    out</a>
                            </li>
                        </ul>
                    </div>

                    <div class="ml-2">
                        <x-button blue label="Buat Tagihan" icon="plus"
                            href="{{ route('user.penjualan.tagihan.tambah.buat', ['tipe' => 'pengiriman', 'buat_id' => $pengiriman->id]) }}" />
                    </div>
                    <div class="ml-2">
                        <x-button green label="Telah Dikirim" icon="check" data-popover-target="popover-dikirim"
                            data-popover-trigger="click" />
                    </div>
                    <div data-popover id="popover-dikirim" role="tooltip"
                        class="absolute z-10 invisible inline-block w-64 text-sm font-light text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-semibold text-gray-900 dark:text-white">Anda yakin Pemesanan ini telah
                                dikirim?
                            </h3>
                        </div>
                        <div class="px-3 py-2">
                            <x-button blue label="OK" wire:click.prevent="pesananDikirim" />
                        </div>
                        <div data-popper-arrow></div>
                    </div>
                    <div class="ml-2">
                        <x-button positive label="Sampai Tujuan" icon="check" data-popover-target="popover-sampai"
                            data-popover-trigger="click" />
                    </div>
                    <div data-popover id="popover-sampai" role="tooltip"
                        class="absolute z-10 invisible inline-block w-64 text-sm font-light text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-semibold text-gray-900 dark:text-white">Anda yakin Pemesanan ini telah
                                sampai tujuan?
                            </h3>
                        </div>
                        <div class="px-3 py-2">
                            <x-button blue label="OK" wire:click.prevent="pesananSampai" />
                        </div>
                        <div data-popper-arrow></div>
                    </div>
                </div>
            </div>
            <div class="mt-0 px-6 pt-6 grid grid-cols-3 gap-2">
                <div class="flex flex-col">
                    <span class="text-base font-medium  dark:text-white">Pelanggan</span>
                    <a href="{{ route('user.kontak.detail', ['kontak_id' => $pengiriman->kontak_id]) }}"
                        class="font-semibold text-base text-primary-500 dark:text-primary-300 hover:underline hover:text-primary-700 dark:hover:text-primary-500">{{ $pengiriman->kontak->name }}</a>
                    <span class="flex text-sm ml-2 py-1 dark:text-white"><svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 mr-2 flex-inline " fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                        </svg>{{ $pengiriman->kontak->perusahaan }}</span>
                    <span class="flex text-sm ml-2 py-1 dark:text-white"><svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 flex-inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>{{ $pengiriman->kontak->alamat }}</span>
                    <span class="flex text-sm ml-2 py-1 dark:text-white"><svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 flex-inline mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>{{ $pengiriman->kontak->telepon }}</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-base font-medium dark:text-white">Kode</span>
                    <span class="text-lg font-bold py-2 dark:text-white">{{ $pengiriman->kode }}</span>

                </div>
            </div>
            <div class="mt-0 px-6 grid grid-cols-3">
                <div class="flex flex-col">
                    <span class="font-medium text-sm mt-4 dark:text-white">Tanggal Pengiriman</span>
                    <span
                        class="font-semibold dark:text-white">{{ date('d/m/Y', strtotime($pengiriman->tanggal_pengiriman)) }}</span>
                </div>
                <div class="flex flex-col">
                    <span class="font-medium text-sm mt-4 dark:text-white">Kode Pemesanan</span>
                    <a href="{{ route('user.penjualan.pemesanan.detail', ['pemesanan_id' => $pengiriman->pemesanan->id]) }}"
                        class="font-semibold text-primary-500 dark:text-primary-300 hover:underline hover:text-primary-700 dark:hover:text-primary-500">{{ $pengiriman->pemesanan->kode }}</a>
                </div>
            </div>
            <div class="mt-0 px-6 grid grid-cols-3">
                <div class="flex flex-col">
                    <span class="font-medium text-sm mt-4 dark:text-white">Gudang</span>
                    <a href=""
                        class="font-semibold text-primary-500 dark:text-primary-300 hover:underline hover:text-primary-700 dark:hover:text-primary-500">{{ $pengiriman->gudang->name }}</a>
                </div>

            </div>
            <div class="mt-0 px-6 grid grid-cols-3">
                <div class="flex flex-col">
                    <span class="font-bold text-sm mt-4 dark:text-white">Informasi Pengiriman</span>
                </div>
            </div>
            <div class="mt-0 px-6 grid grid-cols-3 mb-6">
                <div class="flex flex-col">
                    <span class="font-medium text-sm mt-4 dark:text-white">Ekspedisi</span>
                    <span class="text-lg font-semibold py-2 dark:text-white">{{ $pengiriman->kurir }}</span>
                </div>
                <div class="flex flex-col">
                    <span class="font-medium text-sm mt-4 dark:text-white">No. Resi</span>
                    <span class="text-lg font-semibold py-2 dark:text-white">{{ $pengiriman->resi }}</span>
                </div>

            </div>
            <div class="mt-0 px-6 grid grid-cols mt-10">
                <div class="flex flex-col">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-white rounded z-99">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-white">
                            <tr>
                                <th scope="col" class="px-4 py-3 w-44">
                                    Produk
                                </th>
                                <th scope="col" class="px-2 py-3 w-52">
                                    deskripsi
                                </th>
                                <th scope="col" class="px-2 py-3 w-24">
                                    Kuantitas
                                </th>
                                <th scope="col" class="px-2 py-3 w-24">
                                    Satuan
                                </th>
                                <th scope="col" class="px-2 py-3 w-24">
                                    Discount
                                </th>
                                <th scope="col" class="px-2 py-3 w-40">
                                    Harga
                                </th>
                                <th scope="col" class="px-2 py-3 w-24">
                                    Pajak
                                </th>
                                <th scope="col" class="px-2 py-3 w-40">
                                    jumlah
                                </th>
                            </tr>
                        </thead>
                        <tbody class="z-99">
                            @foreach ($orderItems as $item)
                                <tr
                                    class="bg-gray-50 border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <td class="pl-2 p-2 py-4 w-44 dark:text-white">
                                        {{ $item->produk->name }}
                                    </td>
                                    <td class="pl-2 p-2 py-4 w-52 dark:text-white">
                                        {{ $item->deskripsi }}
                                    </td>
                                    <td class="pl-2 p-2 py-4 w-24 dark:text-white">
                                        {{ $item->qty }}
                                    </td>
                                    <td class="pl-2 p-2 py-4 w-24 dark:text-white">
                                        {{ $item->produk->satuan->name }}
                                    </td>
                                    <td class="pl-2 p-2 py-4 w-24 dark:text-white">
                                        {{ $item->discount }}
                                    </td>
                                    <td class="pl-2 p-2 py-4 w-40 dark:text-white">
                                        {{ $item->harga }}
                                    </td>
                                    <td class="pl-2 p-2 py-4 w-24 dark:text-white">
                                        PPN{{-- {{ $item->produk->harga }} --}}
                                    </td>
                                    <td class="pl-2 p-2 py-4 w-40 dark:text-white">
                                        @currency($item->jumlah)
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-0 px-6 grid grid-cols-2 mt-10">
                <div class="flex flex-col">
                </div>
                <div class="flex flex-col">
                    <table class="w-full whitespace-nowrap mb-5">
                        <tbody>
                            <tr
                                class="border-b border-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600 text-right text-sm font-medium text-gray-900 dark:text-white">
                                <td class="p-2 w-2/3">Biaya Pengiriman</td>
                                <td class="p-2 w-1/3">@currency($pengiriman->biaya_pengiriman)</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>

@push('scripts')
@endpush
