<div class="overflow-x-hiden">

    <div class="flex items-center space-x-2 mb-5">
        <a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-primary-500">Home</a>
        <span class="text-gray-400 text-sm">/</span>
        <a href="{{ route('user.penjualan.overview') }}" class="text-gray-400 hover:text-primary-500">Penjualan</a>
        <span class="text-gray-400 text-sm">/</span>
        <a href="{{ route('user.penjualan.penawaran') }}" class="text-gray-400 hover:text-primary-500">Penawaran</a>
        <span class="text-gray-400 text-sm">/</span>
        <span class="text-gray-900 dark:text-gray-200">Tambah</span>
    </div>
    <div class="bg-gray-50 rounded p-8 soft-scrollbar mb-12 dark:bg-gray-800 transition duration-200 ">
        <div class="flex content-center mb-10">
            <div class="flex flex-none w-1/3">
                <h4 class="text-2xl font-semibold dark:text-gray-100">Tambah Penawaran</h4>
            </div>
            <div class="flex flex-initial w-2/3 justify-end">

                <x-button warning label="Kembali" icon="chevron-left" href="{{ route('user.penjualan.penawaran') }}" />
            </div>
        </div>
        <div class="border border-grey-200 p-2 px-6 grid grid-cols-1 gap-8 rounded-lg mt-12">
            <form wire:submit.prevent="addTagihan">
                <div class="grid grid-cols-2 gap-8">
                    <div class="flex flex-col my-2">
                        <label for="pelanggan" class="font-medium text-sm text-gray-900 dark:text-white mb-2"><span
                                class="text-red-500 font-bold">*</span> Pelanggan</label>
                        <select id="pelanggan" wire:model="pelanggan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
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
                        <label for="nomor"
                            class="text-sm text-gray-900 dark:text-white font-medium mb-2">Kode</label>
                        <input type="text" id="kode" wire:model="kode"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            x-mask="QU/99999999" placeholder="QU/000000">
                        @error('kode')
                            <span class="text-md" style="color: red"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-8">
                    <div class="flex flex-col my-2">
                        <label for="tgl_transaksi" class="font-medium text-sm text-gray-900 dark:text-white mb-2"><span
                                class="text-red-500 font-medium">*</span> Tgl transaksi</label>
                        <x-datetime-picker parse-format="YYYY-MM-DD HH:mm:ss" placeholder="Tanggal Transaksi"
                            class="bg-gray-50 border border-slate-300 text-slate-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-slate-700 dark:border-slate-600 placeholder-slate-600 dark:placeholder-slate-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            wire:model.defer="tgl_transaksi" />
                    </div>

                    <div class="flex flex-col my-2">
                        <label for="tgl_tempo" class="font-medium text-sm text-gray-900 dark:text-white mb-2"><span
                                class="text-red-500 font-medium">*</span> Tanggal Kadaluarsa</label>
                        <div class="relative">
                            <x-datetime-picker parse-format="YYYY-MM-DD HH:mm:ss" placeholder="Tanggal Kadaluarsa"
                                class="bg-gray-50 border border-slate-300 text-slate-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-slate-700 dark:border-slate-600 placeholder-slate-600 dark:placeholder-slate-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                wire:model.defer="tgl_kadaluarsa" />
                        </div>
                    </div>
                    <div class="flex flex-col my-2">
                        <label for="termin"
                            class="font-medium text-sm text-gray-900 dark:text-white mb-2">Termin</label>
                        <select id="termin" wire:model="termin"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value=1>Termin</option>
                            @foreach ($termins as $termin)
                                <option value={{ $termin->value }}>{{ $termin->name }}</option>
                            @endforeach
                        </select>
                        @error('termin')
                            <span class="text-md" style="color: red"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-8">
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
                <div x-data="{ openSales: false }" class="mt-2">
                    <button type="button" @click="openSales = !openSales" id="sales"
                        class="font-semibold text-primary-500 dark:text-primary-300 text-sm hover:text-primary-600 hover:underline">
                        + Tampilkan Sales Person
                    </button>

                    <div class="grid grid-cols-3 gap-8" x-cloak x-show="openSales">
                        <div class="flex flex-col my-2">
                            <label for="sales" class="font-medium text-sm text-gray-900 dark:text-white mb-2">
                                Sales Person</label>
                            <select id="sales" wire:model="sales"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="">Sales Person</option>
                                @foreach ($karyawans as $k)
                                    <option value={{ $k->id }}>{{ $k->name }}</option>
                                @endforeach
                            </select>
                            @error('sales')
                                <span class="text-md" style="color: red"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="mt-2" x-data="{ openPengiriman: false }">
                    <button type="button" @click="openPengiriman = !openPengiriman" id="pengirimanID"
                        class="font-semibold text-primary-500 dark:text-primary-300 text-sm hover:text-primary-600 hover:underline">
                        + Tampilkan Informasi Pengiriman
                    </button>

                    <div class="grid grid-cols-3 gap-8" x-cloak x-show="openPengiriman">
                        <div class="flex flex-col my-2">
                            <label for="tgl_pengiriman"
                                class="font-medium text-sm text-gray-900 dark:text-white mb-2">
                                Tanggal Pengiriman</label>
                            <x-datetime-picker parse-format="YYYY-MM-DD HH:mm:ss" placeholder="Tanggal Pengiriman"
                                class="bg-gray-50 border border-slate-300 text-slate-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-slate-700 dark:border-slate-600 placeholder-slate-600 dark:placeholder-slate-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                wire:model.defer="tanggal_pengiriman" />
                            @error('tanggal_pengiriman')
                                <span class="text-md" style="color: red"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
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
                                    <th scope="col" class="px-2 py-3 w-10">
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="z-99">
                                <tr class="h-4">
                                    <td>
                                        <div
                                            class="pl-2 p-1 w-44 dark:text-white hover:text-blue-500 dark:hover:text-blue-500">
                                            <a href="#" class="text-xs"
                                                onclick="Livewire.emit('openModal', 'user.tambah-produk')">+ Produk</a>
                                        </div>
                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <div
                                            class="pl-2 p-1 w-24 dark:text-white hover:text-blue-500 dark:hover:text-blue-500">
                                            <a href="#" class="text-xs">+ Satuan</a>
                                        </div>
                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <div
                                            class="pl-2 p-1 w-24 dark:text-white hover:text-blue-500 dark:hover:text-blue-500">
                                            <a href="#" class="text-xs">+ Pajak</a>
                                        </div>
                                    </td>
                                </tr>
                                @foreach ($orderProducts as $index => $orderProduct)
                                    @if ($index < count($allProducts))
                                        <tr
                                            class="bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <td class="pl-2 p-2 py-4 w-44 dark:text-white">
                                                <select name="orderProducts[{{ $index }}][produk_id]"
                                                    wire:model="orderProducts.{{ $index }}.produk_id"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    <option value="">Produk</option>
                                                    @foreach ($allProducts as $product)
                                                        <option value="{{ $product->id }}">
                                                            {{ $product->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('orderProducts.0.produk_id')
                                                    <span class="text-md"
                                                        style="color: red"><small>Required</small></span>
                                                @enderror
                                            </td>
                                            <td class="pl-2 p-2 py-4 w-40 dark:text-white">
                                                <input type="text"
                                                    name="orderProducts[{{ $index }}][deskripsi]"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    wire:model="orderProducts.{{ $index }}.deskripsi"
                                                    placeholder="Deskripsi">
                                            </td>
                                            <td class="pl-2 p-2 py-4 w-24 dark:text-white">
                                                <input type="number" name="orderProducts[{{ $index }}][qty]"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    wire:model="orderProducts.{{ $index }}.qty"
                                                    placeholder="Qty">
                                            </td>
                                            <td class="pl-2 p-2 py-4 w-24 dark:text-white">
                                                <select name="orderProducts[{{ $index }}][satuan_id]"
                                                    wire:model="orderProducts.{{ $index }}.satuan_id"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    <option value="">Satuan</option>
                                                    @foreach ($satuans as $s)
                                                        <option value="{{ $s->id }}">
                                                            {{ $s->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('orderProducts.0.satuan_id')
                                                    <span class="text-md"
                                                        style="color: red"><small>Required</small></span>
                                                @enderror
                                            </td>
                                            <td class="pl-2 p-2 py-4 w-24 dark:text-white">
                                                <input type="number"
                                                    name="orderProducts[{{ $index }}][discount]"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    wire:model="orderProducts.{{ $index }}.discount"
                                                    placeholder="%">
                                            </td>
                                            <td class="pl-2 p-2 py-4 w-40 dark:text-white">
                                                {{-- <x-inputs.currency placeholder="harga" thousands="." decimal=","
                                                    precision="4"
                                                    wire:model="orderProducts.{{ $index }}.harga" /> --}}
                                                <input type="number"name="orderProducts[{{ $index }}][harga]"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    wire:model="orderProducts.{{ $index }}.harga"
                                                    placeholder="Rp">
                                            </td>
                                            <td class="pl-2 p-2 py-4 w-24 dark:text-white">
                                                <select name="orderProducts[{{ $index }}][pajak]"
                                                    wire:model="orderProducts.{{ $index }}.pajak"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    <option value=0>Pajak</option>
                                                    @foreach ($pajaks as $p)
                                                        <option value={{ $p->value }}>
                                                            {{ $p->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pl-2 p-2 py-4 w-40 dark:text-white">
                                                <input
                                                    type="number"name="orderProducts[{{ $index }}][jumlah]"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    wire:model="jumlah.{{ $index }}" placeholder="Rp">
                                                {{-- <input name="orderProducts[{{ $index }}][jumlah]"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    x-mask:dynamic="$money($input, ',')"
                                                    wire:model="jumalh.{{ $index }}" placeholder="Rp"> --}}
                                            </td>
                                            <td>
                                                <a href="#"
                                                    class="ml-3 font-semibold text-red-500 hover:text-red-300"
                                                    wire:click.prevent="removeProduct({{ $index }})">X</a>


                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>

                        </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12 my-5">
                                <x-button wire:click.prevent="addProduct" icon="plus" spinner="addProduct" primary
                                    label="Tambah Produk" />
                            </div>
                        </div>
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
                                class="w-full h-12 bg-gray-200 dark:bg-gray-700 text-primary-500 dark:text-primary-300 dark:text-primary-300 dark:text-gray-400 font-medium flex items-center justify-between px-3">
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
                                    class="border-b border-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600 text-right text-sm font-medium text-gray-900 dark:text-white">
                                    <td class="p-2 w-2/3">Sub Total</td>
                                    <td class="p-2 w-1/3">@currency($subtotal)</td>
                                </tr>
                                <tr class="border-b border-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600 text-right text-sm font-medium text-gray-900 dark:text-white"
                                    x-data="{ openDiskon: true, showDiskon: false, showPersen: true, showRp: false }">
                                    <td class="p-2" colspan="2" x-cloak x-show="openDiskon">
                                        <button type="button"
                                            @click="openDiskon = !openDiskon; showDiskon = !showDiskon" id="diskonId"
                                            class="font-semibold text-primary-500 dark:text-primary-300 text-sm hover:text-primary-600 hover:underline">
                                            + Tambah Diskon
                                        </button>
                                    </td>

                                    <td x-cloak x-show="showDiskon" class="p-2 w-2/3">

                                        <div class="inline-flex rounded-md shadow-sm" role="group">
                                            <div class="mr-2" x-show="showPersen">
                                                <input type="number"name=""
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-1/2 p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    wire:model="diskonPersen" placeholder="%">
                                            </div>
                                            <div class="mr-2" x-show="showRp">
                                                <input type="number"name=""
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    wire:model="diskonRp" placeholder="Rp">
                                            </div>
                                            <button type="button" @click="showPersen = true; showRp = false"
                                                class="px-2 py-1 text-xs text-gray-500 bg-transparent border-y border-l border-gray-300 rounded-l hover:bg-primary-400 hover:text-white focus:z-10 focus:ring-2 focus:ring-primary-500 focus:bg-primary-600 focus:text-white dark:border-gray-400 dark:text-white dark:hover:text-white dark:hover:bg-primary-400 dark:focus:bg-primary-400">
                                                %
                                            </button>
                                            <button type="button" @click="showPersen = false; showRp = true"
                                                class="px-2 py-1 text-xs text-gray-500 bg-transparent border border-gray-300 rounded-r hover:bg-primary-400 hover:text-white focus:z-10 focus:ring-2 focus:ring-primary-500  focus:bg-primary-600 focus:text-white dark:border-gray-400 dark:text-white dark:hover:text-white dark:hover:bg-primary-400 dark:focus:bg-primary-400">
                                                Rp
                                            </button>
                                        </div>
                                    </td>
                                    <td x-cloak x-show="showDiskon" class="p-2 w-1/3">@currency(-$diskon)</td>

                                </tr>
                                <tr class="border-b border-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600 text-right text-sm font-medium text-gray-900 dark:text-white"
                                    x-data="{ openPengiriman: true, showPengiriman: false, }">
                                    <td class="p-2" colspan="2" x-cloak x-show="openPengiriman">
                                        <button type="button"
                                            @click="openPengiriman = !openPengiriman; showPengiriman = !showPengiriman"
                                            id="pengirimanId"
                                            class="font-semibold text-primary-500 dark:text-primary-300 text-sm hover:text-primary-600 hover:underline">
                                            + Biaya Pengiriman
                                        </button>
                                    </td>

                                    <td x-cloak x-show="showPengiriman" class="p-2 w-2/3">

                                        <div class="inline-flex rounded-md shadow-sm" role="group">

                                            <div class="flex">
                                                <span class="flex-initial mr-2">Biaya Pengiriman</span>

                                                <input type="number"name=""
                                                    class="flex-initial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    wire:model="biaya_pengiriman" placeholder="Rp">
                                            </div>

                                        </div>
                                    </td>
                                    <td x-cloak x-show="showPengiriman" class="p-2 w-1/3">@currency($biaya_pengiriman)</td>

                                </tr>
                                <tr
                                    class="border-b border-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600 text-right text-sm font-medium text-gray-900 dark:text-white">
                                    <td class="p-2 w-2/4">Pajak</td>
                                    <td class="p-2 w-2/4">@currency($total_pajak)</td>
                                </tr>
                                <tr
                                    class="border-b border-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600 text-right text-base font-medium text-gray-900 dark:text-white">
                                    <td class="p-2 w-2/4">Total</td>
                                    <td class="p-2 w-2/4">@currency($total)</td>
                                </tr>

                            </tbody>
                        </table>
                        <x-button wire:click="addTagihan" icon="save" spinner="addTagihan" primary
                            label="Simpan" />
                    </div>
                </div>

            </form>
        </div>

    </div>

</div>

@push('scripts')
@endpush
