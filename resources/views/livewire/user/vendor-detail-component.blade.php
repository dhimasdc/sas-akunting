<div>
    <div class="bg-white rounded-lg px-8 py-6 custom-scrollbar mb-12 dark:bg-slate-900 transition duration-200 ">
        <h4 class="text-2xl font-semibold mb-5 dark:text-slate-100">{{ $vendor->perusahaan }}</h4>

        <h4 class="text-xl font-semibold mb-5 dark:text-slate-100">Detail Kontak</h4>
        <table class="w-1/4 whitespace-nowrap my-4 bordered">

            <tbody>
                <tr class="border-b border-gray-200">
                    <td class="p-2">Nama</td>
                    <td class="p-2">:</td>
                    <td class="p-2">{{ $vendor->name }}</td>
                </tr>
                <tr class="border-b border-gray-200">
                    <td class="p-2">Perusahaan</td>
                    <td class="p-2">:</td>
                    <td class="p-2">{{ $vendor->perusahaan }}</td>
                </tr>
                <tr class="border-b border-gray-200">
                    <td class="p-2">Email</td>
                    <td class="p-2">:</td>
                    <td class="p-2">{{ $vendor->email }}</td>
                </tr>
                <tr class="border-b border-gray-200">
                    <td class="p-2">Telepon</td>
                    <td class="p-2">:</td>
                    <td class="p-2">{{ $vendor->telepon }}</td>
                </tr>
                <tr class="border-b border-gray-200">
                    <td class="p-2">Alamat</td>
                    <td class="p-2">:</td>
                    <td class="p-2">{{ $vendor->alamat }}</td>
                </tr>
            </tbody>
        </table>

        <h4 class="text-xl font-semibold mb-5 dark:text-slate-100">Piutang menunggu pembayaran</h4>
        <table class="w-full whitespace-nowrap my-4 bordered">
            <thead class="border-b border-gray-300">
                <td class="p-2">Tanggal</td>
                <td class="p-2">Transaksi</td>
                <td class="p-2">Deskripsi</td>
                <td class="p-2">Total</td>
            </thead>
            <tbody>
                @foreach ($hutangs as $hutang)
                    <tr class="border-b border-gray-200">
                        @if ($hutang->piutang)
                            <td class="p-2">{{ $hutang->tanggal_jatuh_tempo }}</td>
                            <td class="p-2"></td>
                            <td class="p-2">{{ $hutang->deskripsi }}</td>
                            <td class="p-2">/td>
                        @endif
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
                <td class="p-2">Total</td>
            </thead>
            <tbody>
                @foreach ($hutangs as $hutang)
                    <tr class="border-b border-gray-200">
                        @if ($hutang->hutang)
                            <td class="p-2">{{ $hutang->tanggal_jatuh_tempo }}</td>
                            <td class="p-2"></td>
                            <td class="p-2">{{ $hutang->deskripsi }}</td>
                            <td class="p-2">{{ $hutang->hutang }}</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
