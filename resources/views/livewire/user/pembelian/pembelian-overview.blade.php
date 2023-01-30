<div>
    <div
        class="w-full flex flex-col lg:flex-row items-center justify-between bg-gray-50 mb-5 px-2 py-4 rounded-lg shadow-lg dark:bg-gray-800">
        <span class="text-xl font-bold m-3 dark:text-white">Overview Pembelian</span>

        <div id="reportrange" class="dark:text-white m-3 cursor-pointer hover:text-gray-600 dark:hover:text-gray-200">
            &nbsp;
            <span></span> <i class="fa fa-caret-down"></i>
        </div>

    </div>
    <h1 class="text-xl font-bold dark:text-gray-100 mb-5">TAGIHAN PEMBELIAN</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-10 mb-10">
        <a href="{{ route('user.pembelian.tagihan') }}"
            class="px-6 py-6 bg-white dark:bg-gray-800 rounded-lg shadow-xl hover:bg-gray-100 hover:shadow-2xl">
            <div class="text-2xl text-info-500">
                Rp. 5.322.000
            </div>
            <div class="text-base dark:text-white text-gray-900">
                Menunggu Pembayaran
            </div>
        </a>
        <a href=""
            class="px-6 py-6 bg-white dark:bg-gray-800 rounded-lg shadow-xl hover:bg-gray-100 hover:shadow-2xl">
            <div class="text-2xl text-red-500">
                Rp. 3.562.000
            </div>
            <div class="text-base dark:text-white text-gray-900">
                Pembayaran Jatuh Tempo
            </div>
        </a>
        <a href="{{ route('user.pembelian.penawaran') }}"
            class="px-6 py-6 bg-white dark:bg-gray-800 rounded-lg shadow-xl hover:bg-gray-100 hover:shadow-2xl">
            <div class="text-2xl text-green-500">
                Rp. 17.721.000
            </div>
            <div class="text-base dark:text-white text-gray-900">
                Pembelian Per Produk Bulan ini
            </div>
        </a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-1 xl:grid-cols-2 gap-10 my-10">
        <div class="px-6 py-6 bg-white dark:text-white dark:bg-gray-800 rounded-lg shadow-xl">
            <h4 class="text-xl capitalize">Pembelian Per Produk Bulan ini</h4>
            <div class="flex flex-row">
                <div class="mt-6 basis-1/2">
                    <canvas id="doughnut"></canvas>

                </div>
                <div class="basis-1/2">
                    <!-- start::Hoverable Rows -->
                    <table class="whitespace-nowrap ">
                        <thead class=" bg-gray-100 dark:bg-gray-600 dark:text-white">
                            <td class="border-x border-gray-300 p-2 text-xs">Produk</td>
                            <td class="border-x border-gray-300 p-2 text-xs">Jml</td>
                            <td class="border-l border-gray-300 p-2 text-xs">Nilai</td>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-200 hover:bg-gray-200 dark:text-white">
                                <td class="p-2 text-xs">Mouse</td>
                                <td class="p-2 text-xs">200</td>
                                <td class="p-2 text-xs text-right">Rp 9.000.000</td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-200 dark:text-white">
                                <td class="p-2 text-xs">Desing</td>
                                <td class="p-2 text-xs">67</td>
                                <td class="p-2 text-xs text-right">Rp 13.724.748</td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-200 dark:text-white">
                                <td class="p-2 text-xs">Web</td>
                                <td class="p-2 text-xs">15</td>
                                <td class="p-2 text-xs text-right">Rp 4.406.550</td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-200 dark:text-white">
                                <td class="p-2 text-xs">System</td>
                                <td class="p-2 text-xs">5</td>
                                <td class="p-2 text-xs text-right">Rp 26.926.550</td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-200 dark:text-white">
                                <td class="p-2 text-xs">Server</td>
                                <td class="p-2 text-xs">13</td>
                                <td class="p-2 text-xs text-right">Rp 1.116.550</td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- end::Hoverable Rows -->
                </div>
            </div>

        </div>
        <div class="px-6 py-6 bg-white dark:text-white  dark:bg-gray-800 rounded-lg shadow-xl">
            <h4 class="text-xl capitalize">Pembelian per Pelanggan Bulan Ini</h4>
            <div class="flex flex-row">
                <div class="mt-6 basis-1/2">
                    <canvas id="doughnut2"></canvas>

                </div>
                <div class="basis-1/2">
                    <!-- start::Hoverable Rows -->
                    <table class="whitespace-nowrap ">
                        <thead class=" bg-gray-100 dark:bg-gray-600 dark:text-white">
                            <td class="border-x border-gray-300 p-2 text-xs">Pelanggan</td>
                            <td class="border-x border-gray-300 p-2 text-xs">Nilai</td>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-200 hover:bg-gray-200 dark:text-white">
                                <td class="p-2 text-xs">Sandika Purnama</td>
                                <td class="p-2 text-xs">Rp 9.000.000
                                <td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-200 dark:text-white">
                                <td class="p-2 text-xs">Fajar Zidane</td>
                                <td class="p-2 text-xs">Rp 6.487.000</td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-200 dark:text-white">
                                <td class="p-2 text-xs">Aship Ryando</td>
                                <td class="p-2 text-xs">Rp 6.152.670</td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- end::Hoverable Rows -->
                </div>
            </div>

        </div>

    </div>
    <div class="grid grid-cols-1 md:grid-cols-1 xl:grid-cols-2 gap-10 my-10">
        <div class="px-6 py-6 bg-white dark:text-white dark:bg-gray-800 rounded-lg shadow-xl">
            <h4 class="text-xl capitalize">Pembayaran Diterima</h4>
            <div class="flex flex-row">
                <div class="mt-6 basis-full">
                    <div class="mt-2">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>

            </div>

        </div>
        <div class="px-6 py-6 bg-white dark:text-white dark:bg-gray-800 rounded-lg shadow-xl">
            <h4 class="text-xl capitalize">Pembelian Per Pelanggan Bulan Ini</h4>
            <div class="flex flex-row">
                <div class="mt-6 basis-full">
                    <canvas id="verticalBarChart"></canvas>
                </div>
            </div>

        </div>
    </div>
    <h1 class="text-xl font-bold dark:text-white mb-5">PESANAN & PENGIRIMAN</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-10 mb-10">
        <a href="{{ route('user.pembelian.pengiriman') }}"
            class="px-6 py-6 bg-white dark:bg-gray-800 rounded-lg shadow-xl hover:bg-gray-100 hover:shadow-2xl">
            <div class="text-xl text-primary-500">
                Rp. 11.541.000
            </div>
            <div class="text-base text-primary-500">
                Pengiriman Belum Selesai
            </div>
        </a>
        <a href="{{ route('user.pembelian.pemesanan') }}"
            class="px-6 py-6 bg-white dark:bg-gray-800 rounded-lg shadow-xl hover:bg-gray-100 hover:shadow-2xl">
            <div class="text-xl text-warning-400">
                Rp. 2.523.123
            </div>
            <div class="text-base text-warning-500">
                Pesanan Belum Selesai
            </div>
        </a>
        <a href="{{ route('user.pembelian.pengiriman') }}"
            class="px-6 py-6 bg-white dark:bg-gray-800 rounded-lg shadow-xl hover:bg-gray-100 hover:shadow-2xl">
            <div class="text-xl text-info-500">
                Rp. 7.512.000
            </div>
            <div class="text-base text-info-500">
                Pesanan Kirim Sebagian
            </div>
        </a>
        <a href="{{ route('user.pembelian.penawaran') }}"
            class="px-6 py-6 bg-white dark:bg-gray-800 rounded-lg shadow-xl hover:bg-gray-100 hover:shadow-2xl">
            <div class="text-xl text-green-500">
                Rp. 1.241.000
            </div>
            <div class="text-base text-green-500">
                Penawaran Disetujui
            </div>
        </a>
    </div>
</div>

@push('scripts')
    <script>
        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Hari Ini': [moment(), moment()],
                'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Minggu Ini': [moment().subtract(6, 'days'), moment()],
                '30 Hari Lalu': [moment().subtract(29, 'days'), moment()],
                'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
                'Bulan Lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                    'month')]
            }
        }, cb);

        cb(start, end);
        // start::Doughnut
        const DATA_SET_DOUGHNUT = [68.106, 26.762, 72.021, 64.923, 85.565];
        const DATA_SET_DOUGHNUT2 = [9000000, 6487000, 16916550];

        const DATA_SET_LINE_CHART_1 = [0, 1000000, 2560000, 1500000, 400000, 7000000, 2305000, 200000];
        const labels_line_chart = ['January', 'February', 'Mart', 'April', 'May', 'Jun', 'July'];

        // start::Vertical Bar Chart
        const DATA_SET_VERTICAL_BAR_CHART_1 = [1000000, 2560000, 1500000, 400000, 7000000, 2305000, 200000];

        const DATA_SET_VERTICAL_BAR_CHART_2 = [0, 0, 0, 0, 0, 0, 5430000];

        const labels_vertical_bar_chart = ['January', 'February', 'Mart', 'April', 'May', 'Jun', 'July'];

        const dataVerticalBarChart = {
            labels: labels_vertical_bar_chart,
            datasets: [{
                    label: 'Dataset 1',
                    data: DATA_SET_VERTICAL_BAR_CHART_1,
                    borderColor: 'rgb(255, 99, 132)',
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                },
                {
                    label: 'Dataset 2',
                    data: DATA_SET_VERTICAL_BAR_CHART_2,
                    borderColor: 'rgb(54, 162, 235)',
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                }
            ]
        };
        const configVerticalBarChart = {
            type: 'bar',
            data: dataVerticalBarChart,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Vertical Bar Chart'
                    }
                }
            },
        };

        var verticalBarChart = new Chart(
            document.getElementById('verticalBarChart'),
            configVerticalBarChart
        );
        // end::Vertical Bar Chart 

        const dataLineChart = {
            labels: labels_line_chart,
            datasets: [{
                label: 'Dataset 1',
                data: DATA_SET_LINE_CHART_1,
                borderColor: 'rgb(54, 162, 235)',
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
            }, ]
        };

        const configLineChart = {
            type: 'line',
            data: dataLineChart,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Line Chart'
                    }
                }
            },
        };

        var lineChart = new Chart(
            document.getElementById('lineChart'),
            configLineChart
        );

        const dataDoughnut = {
            labels: ['Mouse', 'Desing', 'Server', 'System', 'Web'],
            datasets: [{
                label: 'Dataset 1',
                data: DATA_SET_DOUGHNUT,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)'
                ],
            }, ]
        };

        const dataDoughnut2 = {
            labels: ['Sandika Puranama', 'Aship Ryando', 'Fajar Zidane'],
            datasets: [{
                label: 'Dataset 2',
                data: DATA_SET_DOUGHNUT2,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)'
                ],
            }, ]
        };

        const configDoughnut = {
            type: 'doughnut',
            data: dataDoughnut,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Pembelian per Produk'
                    }
                }
            },
        };

        const configDoughnut2 = {
            type: 'doughnut',
            data: dataDoughnut2,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Pembelian per Pelanggan'
                    }
                }
            },
        };

        var doughnut = new Chart(
            document.getElementById('doughnut'),
            configDoughnut
        );

        var doughnut = new Chart(
            document.getElementById('doughnut2'),
            configDoughnut2
        );
        // end::Doughnut
    </script>
@endpush
