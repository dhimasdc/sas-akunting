<div class="overflow-x-hiden">
    <div class="flex items-center space-x-2 mb-5">
        <a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-primary-500">Home</a>
        <span class="text-gray-400 text-sm">/</span>
        <a href="{{ route('user.penjualan.overview') }}" class="text-gray-400 hover:text-primary-500">Penjualan</a>
        <span class="text-gray-400 text-sm">/</span>
        <a href="{{ route('user.penjualan.pengiriman') }}" class="text-gray-400 hover:text-primary-500">Pengiriman</a>
        <span class="text-gray-400 text-sm">/</span>
        <span class="text-gray-900 dark:text-gray-200">Tambah</span>
    </div>
    <div class="bg-gray-50 rounded p-8 soft-scrollbar mb-12 dark:bg-gray-800 transition duration-200 ">
        <div class="flex content-center mb-10">
            <div class="flex flex-none w-1/3">
                <h4 class="text-2xl font-semibold dark:text-gray-100">Tambah Pengiriman</h4>
            </div>
            <div class="flex flex-initial w-2/3 justify-end">

                <x-button warning label="Kembali" icon="chevron-left" href="{{ route('user.penjualan.pengiriman') }}" />

            </div>

        </div>
        <div class="border border-grey-200 p-2 px-6 grid grid-cols-1 gap-8 rounded-lg mt-12">
            <form wire:submit.prevent="addPengiriman">
                <div class="grid grid-cols-2 gap-8">
                    <div class="flex flex-col my-2">
                        <label for="pelanggan" class="font-medium text-sm text-gray-900 dark:text-white mb-2"><span
                                class="text-red-500 font-bold">*</span> Pelanggan</label>
                        <select id="pelanggan" wire:model="pelanggan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 cursor-not-allowed"
                            id="disabled-input" aria-label="disabled input" value="Disabled input" disabled>
                            <option value="">Pelanggan</option>
                            @foreach ($kontaks as $k)
                                <option value={{ $k->id }}>{{ $k->name }} - {{ $k->perusahaan }}</option>
                            @endforeach
                        </select>
                        @error('pelanggan')
                            <span class="text-md" style="color: red"><small>{{ $message }}</small></span>
                        @enderror
                    </div>

                    <div class="flex flex-col my-2">
                        <label for="nomor" class="text-sm text-gray-900 dark:text-white font-medium mb-2">Kode
                        </label>
                        <input type="text" id="kode" wire:model="kode"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            x-mask="SD/99999999" placeholder="SD/000000">
                        @error('kode')
                            <span class="text-md" style="color: red"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-8">
                    <div class="flex flex-col my-2">
                        <label for="tgl_transaksi" class="font-medium text-sm text-gray-900 dark:text-white mb-2"><span
                                class="text-red-500 font-medium">*</span> Tanggal Pengiriman</label>
                        <x-datetime-picker parse-format="YYYY-MM-DD HH:mm:ss" placeholder="Tanggal Pengiriman"
                            class="bg-gray-50 border border-slate-300 text-slate-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-slate-700 dark:border-slate-600 placeholder-slate-600 dark:placeholder-slate-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            wire:model.defer="tgl_pengiriman" />
                    </div>

                </div>
                <div class="grid grid-cols gap-8">
                    <div class="flex flex-col my-2">
                        <span for="pemesanan" class="font-medium text-sm text-gray-900 dark:text-white mb-2">Nomor
                            Pemesanan</span>
                        <span for="pemesananNo"
                            class="font-bold text-base text-primary-500 dark:text-primary-300 mb-2">{{ $kode_pemesanan }}</span>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-8">
                    <div class="flex flex-col my-2">
                        <label for="pemesanan" class="font-medium text-sm text-gray-900 dark:text-white mb-2"><span
                                class="text-red-500 font-bold">*</span> Gudang</label>
                        <select id="gudang" wire:model="gudang"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value=""></option>
                            @foreach ($gudangs as $g)
                                <option value={{ $g->id }}>{{ $g->name }}</option>
                            @endforeach

                        </select>
                        @error('gudang')
                            <span class="text-md" style="color: red"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="flex flex-col my-2">
                        <label class="font-medium text-sm text-gray-900 dark:text-white mb-2"
                            for="referensi">Referensi</label>
                        <input type="text" id="referensi" wire:model="referensi"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Referensi">
                        @error('referensi')
                            <span class="text-md" style="color: red"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="flex flex-col my-2">
                        <label class="font-medium text-sm text-gray-900 dark:text-white mb-2" for="tag">Tag</label>
                        <x-select-search :data="$tag_data" wire:model="tags" placeholder="Tag" multiple />
                        @error('tags')
                            <span class="text-md" style="color: red"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                </div>
                <div class="mt-2" x-data="{ openPengiriman: false }">
                    <button type="button" @click="openPengiriman = !openPengiriman" id="pengirimanID"
                        class="font-semibold text-primary-500 dark:text-primary-300 text-sm hover:text-primary-600 hover:underline">
                        + Tampilkan Informasi Pengiriman
                    </button>

                    <div class="grid grid-cols-3 gap-8" x-cloak x-show="openPengiriman">

                        <div class="flex flex-col my-2">
                            <label for="kurir" class="font-medium text-sm text-gray-900 dark:text-white mb-2">
                                kurir</label>
                            <select wire:model="kurir" id="kurir"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="">Kurir</option>
                                <option value="1">JNE</option>
                                <option value="2">J&T</option>
                                <option value="3">SiCepat</option>
                                <option value="4">GoSend</option>
                            </select>
                            @error('kurir')
                                <span class="text-md" style="color: red"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                        <div class="flex flex-col my-2">
                            <label class="font-medium text-sm text-gray-900 dark:text-white mb-2" for="resi">No.
                                Resi</label>
                            <input wire:model="resi" type="text" id="resi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="No. Resi">
                            @error('resi')
                                <span class="text-md" style="color: red"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                    </div>

                </div>
                {{-- <div class="grid grid-cols-3 gap-8">
                    <div class="flex flex-col my-2">
                        <label class="font-medium text-sm text-gray-900 dark:text-white mb-2" for="sku">Scan
                            Bracode/SKU</label>
                        <input wire:model="sku" type="text" id="sku"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Bracode/SKU">
                    </div>
                </div> --}}
                <div class="grid grid-cols-1 gap-8">
                    <div class="my-5 relative sm:rounded">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 rounded z-99">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3 w-44">
                                        Produk
                                    </th>
                                    <th scope="col" class="px-2 py-3 w-40">
                                        deskripsi
                                    </th>
                                    <th scope="col" class="px-2 py-3 w-24">
                                        Kuantitas
                                    </th>
                                    <th scope="col" class="px-2 py-3 w-24">
                                        Satuan
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-8">
                    <div class="flex flex-col mb-5">
                        <div x-data="{ contentShow: false }"
                            class="border border-gray-300 dark:border-gray-600 text-center w-full rounded mb-2">
                            <div
                                class="w-full h-12 bg-gray-200 dark:bg-gray-700 dark:text-gray-400 text-primary-500 dark:text-primary-300 font-medium flex items-center justify-between px-3">
                                <button type="button" @click="contentShow = !contentShow"
                                    class="ml-2 hover:underline">Pesan</button>
                                <button type="button" @click="contentShow = !contentShow"
                                    class="font-bold hover:text-primary-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 duration-500"
                                        :class="contentShow ? 'rotate-0' : '-rotate-90'" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            </div>
                            <div x-show="contentShow" x-transition class="h-40 p-2 flex items-center justify-center">
                                <div class="bg-white p-2 border border-gray-200 w-full dark:bg-gray-700">
                                    <textarea id="Pesan" rows="6" wire:model="pesan"
                                        class="block px-0 text-sm w-full text-gray-800 bg-gray-50 border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                                        placeholder="Tulis Pesan"></textarea>
                                </div>
                            </div>
                        </div>
                        <div x-data="{ contentShow: false }"
                            class="border border-gray-300 dark:border-gray-600 text-center w-full rounded">
                            <div
                                class="w-full h-12 bg-gray-200 dark:bg-gray-700 text-primary-500 dark:text-primary-300 dark:text-gray-400 font-medium flex items-center justify-between px-3">
                                <button type="button" @click="contentShow = !contentShow"
                                    class="ml-2 hover:underline">Attachment</button>
                                <button type="button" @click="contentShow = !contentShow"
                                    class="font-bold hover:text-primary-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 duration-500"
                                        :class="contentShow ? 'rotate-0' : '-rotate-90'" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            </div>
                            <div x-show="contentShow" x-transition class="h-40 p-2 items-center justify-center">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="file_input">Upload file</label>
                                <input wire:model="attachment"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    aria-describedby="file_input_help" id="file_input" type="file">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG,
                                    PNG, JPG or GIF (MAX. 800x400px).</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col mb-5">

                        <table class="w-full whitespace-nowrap mb-5">
                            <tbody>
                                <tr
                                    class="border-b border-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600 text-right text-sm font-medium text-gray-900 dark:text-gray-400">
                                    <td class="p-2 w-2/3">Biaya Pengiriman</td>
                                    <td class="p-2 w-1/3">
                                        <input type="number"name=""
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            wire:model="biaya_pengiriman" placeholder="Rp">
                                        @error('biaya_pengiriman')
                                            <span class="text-md"
                                                style="color: red"><small>{{ $message }}</small></span>
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <x-button wire:click="addPengiriman" icon="save" spinner="addPengiriman" primary
                            label="Simpan" />
                    </div>
                </div>

            </form>
        </div>

    </div>

</div>

@push('scripts')
@endpush
