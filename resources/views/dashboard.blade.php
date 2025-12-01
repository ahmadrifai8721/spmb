<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <!-- Grid Statistik -->
        <div class="grid auto-rows-min gap-6 md:grid-cols-3">
            <!-- Total Pendaftar -->
            <div class="p-6 bg-emerald-50 border border-emerald-200 rounded-xl shadow">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-emerald-700">Total Pendaftar</h3>
                    <i class="fa fa-users text-emerald-600 text-xl"></i>
                </div>
                <p class="mt-4 text-3xl font-bold text-gray-800">{{ $totalPendaftar }}</p>
                <p class="text-sm text-gray-500">Jumlah semua pendaftar</p>
            </div>

            <!-- Laki-laki -->
            <div class="p-6 bg-blue-50 border border-blue-200 rounded-xl shadow">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-blue-700">Laki-laki</h3>
                    <i class="fa fa-mars text-blue-600 text-xl"></i>
                </div>
                <p class="mt-4 text-3xl font-bold text-gray-800">{{ $jumlahLaki }}</p>
                <p class="text-sm text-gray-500">Jumlah pendaftar laki-laki</p>
            </div>

            <!-- Perempuan -->
            <div class="p-6 bg-pink-50 border border-pink-200 rounded-xl shadow">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-pink-700">Perempuan</h3>
                    <i class="fa fa-venus text-pink-600 text-xl"></i>
                </div>
                <p class="mt-4 text-3xl font-bold text-gray-800">{{ $jumlahPerempuan }}</p>
                <p class="text-sm text-gray-500">Jumlah pendaftar perempuan</p>
            </div>
        </div>

        <!-- Chart Statistik -->
        <div class="p-6 bg-white border border-gray-200 rounded-xl shadow">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                <i class="fa fa-chart-pie text-emerald-600"></i> Statistik Jurusan Pilihan
            </h3>
            <canvas id="chartJurusan" class="w-full h-64"></canvas>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('chartJurusan').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($jurusanLabels) !!},
                    datasets: [{
                        label: 'Jumlah Pendaftar',
                        data: {!! json_encode($jurusanData) !!},
                        backgroundColor: [
                            '#10b981', '#3b82f6', '#f59e0b', '#ef4444', '#8b5cf6'
                        ],
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        </script>
    @endpush
</x-layouts.app>
