<div class="overflow-x-hiden">

    <div class="flex items-center space-x-2 mb-5">
        <a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-primary">Home</a>
        <span class="text-gray-400 text-sm">/</span>
        <a href="{{ route('user.kontak') }}" class="text-gray-400 hover:text-primary">Kontak</a>
        <span class="text-gray-400 text-sm">/</span>
        <span class="text-gray-900 dark:text-gray-200">Detail</span>
    </div>
    <div class="bg-gray-50 rounded p-8 soft-scrollbar mb-12 dark:bg-gray-800 transition duration-200 ">
        <div class="flex content-center">
            <div class="flex flex-none w-1/4">
                <h4 class="w-full text-2xl font-semibold dark:text-gray-100">{{ $kontak->name }}</h4>

            </div>
            <div class="flex flex-initial w-3/4 justify-end">

                <x-button warning label="Kembali" icon="chevron-left" href="{{ route('user.kontak') }}" />

            </div>

        </div>
        <div class="mb-5">
            <h6 class="text-lg w-full font-medium dark:text-gray-100">{{ $kontak->tipe }} - {{ $kontak->perusahaan }}
            </h6>
        </div>

        <div class="border border-grey-200 p-2 px-6 grid grid-cols-1 gap-8 rounded-lg mt-12">
            <table class="w-1/4 whitespace-nowrap my-4 bordered">

                <tbody>
                    <tr class="border-b border-gray-200">
                        <td class="p-2">Nama</td>
                        <td class="p-2">:</td>
                        <td class="p-2">{{ $kontak->name }}</td>
                    </tr>
                    <tr class="border-b border-gray-200">
                        <td class="p-2">Perusahaan</td>
                        <td class="p-2">:</td>
                        <td class="p-2">{{ $kontak->perusahaan }}</td>
                    </tr>
                    <tr class="border-b border-gray-200">
                        <td class="p-2">Email</td>
                        <td class="p-2">:</td>
                        <td class="p-2">{{ $kontak->email }}</td>
                    </tr>
                    <tr class="border-b border-gray-200">
                        <td class="p-2">Telepon</td>
                        <td class="p-2">:</td>
                        <td class="p-2">{{ $kontak->telepon }}</td>
                    </tr>
                    <tr class="border-b border-gray-200">
                        <td class="p-2">Alamat</td>
                        <td class="p-2">:</td>
                        <td class="p-2">{{ $kontak->alamat }}</td>
                    </tr>
                </tbody>
            </table>

            <h4 class="text-xl font-semibold mb-5 dark:text-slate-100">Piutang menunggu pembayaran</h4>
            <table class="w-full whitespace-nowrap my-4 bordered">
                <thead class="border-b border-gray-300">
                    <td class="p-2">Tanggal</td>
                    <td class="p-2">Transaksi</td>
                    <td class="p-2">Deskripsi</td>
                    <td class="p-2 text-center">Total</td>
                </thead>
                <tbody>
                    @foreach ($biaya as $b)
                        <tr class="border-b border-gray-200">
                            <td class="p-2">{{ $b->tanggal_jatuh_tempo }}</td>
                            <td class="p-2">{{ $b->kode }}</td>
                            <td class="p-2">{{ $b->deskripsi }}</td>
                            <td class="p-2 text-right">@currency($b->piutang)
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h4 class="text-xl font-semibold mb-5 dark:text-slate-100">Hutang Yang harus dibayarkan</h4>
            <table class="w-full whitespace-nowrap my-4 bordered">
                <thead class="border-b border-gray-300">
                    <td class="p-2">Tanggal</td>
                    <td class="p-2">Transaksi</td>
                    <td class="p-2">Deskripsi</td>
                    <td class="p-2 text-center">Total</td>
                </thead>
                <tbody>
                    @foreach ($biaya as $b)
                        <tr class="border-b border-gray-200">
                            <td class="p-2">{{ $b->tanggal_jatuh_tempo }}</td>
                            <td class="p-2">{{ $b->kode }}</td>
                            <td class="p-2">{{ $b->deskripsi }}</td>
                            <td class="p-2 text-right">@currency($b->hutang)
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</div>

@push('scripts')
@endpush
