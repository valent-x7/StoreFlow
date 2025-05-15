<x-layout title="Gráficos">

    <div class="p-5 h-full w-full flex flex-col space-y-5 font-primary">

        {{-- Ingresos y Egresos --}}
        <div class="h-1/2 w-full p-5 rounded-lg flex flex-row space-x-5">

            {{-- Ingresos --}}
            <div class="w-1/2 h-full border border-gray-200 rounded-lg flex flex-col p-4">
                {{-- Selector de tipo de gráfico --}}
                <div class="flex justify-center text-xl">
                    <label for="tipoGraficoIngresosPorMes" class="mr-2">Tipo de Gráfico:</label>
                    <select id="tipoGraficoIngresos" class="border rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="bar">Barra</option>
                        <option value="line">Línea</option>
                    </select>
                </div>
                {{-- Contenedor para el gráfico de arriba a la izquierda --}}
                <div class="w-full h-full bg-white/80 rounded-lg shadow-md p-4 self-end">
                    <canvas id="ingresosPorMes"></canvas>
                </div>
            </div>

            {{-- Egresos --}}
            <div class="w-1/2 h-full border border-gray-200 rounded-lg flex flex-col p-4">
                {{-- Selector de tipo de gráfico --}}
                <div class="flex justify-center text-xl">
                    <label for="tipoGraficoEgresos" class="mr-2">Tipo de Gráfico:</label>
                    <select id="tipoGraficoEgresos" class="border rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="bar">Barra</option>
                        <option value="line">Línea</option>
                    </select>
                </div>
                {{-- Contenedor para el gráfico de arriba a la izquierda --}}
                <div class="w-full h-full bg-white/80 rounded-lg shadow-md p-4 self-end">
                    <canvas id="egresosPorMes"></canvas>
                </div>
            </div>

        </div>

        {{-- Ingresos vs Egresos --}}
        <div class="h-1/2 w-full p-5 borderrounded-lg">
            <div class="w-1/2 h-full mx-auto border border-gray-200 rounded-lg flex flex-col p-4">
                {{-- Selector de tipo de gráfico --}}
                <div class="flex justify-center text-xl">
                    <label for="tipoGraficoIngresosVsEgresos" class="mr-2">Tipo de Gráfico:</label>
                    <select id="tipoGraficoIngresosVsEgresos" class="border rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="bar">Barra</option>
                        <option value="line">Línea</option>
                    </select>
                </div>
                {{-- Contenedor para el gráfico de arriba a la izquierda --}}
                <div class="w-full h-full bg-white/80 rounded-lg shadow-md p-4 self-end">
                    <canvas id="ingresosVsEgresosPorMes"></canvas>
                </div>
            </div>
        </div>

    </div>

    @push('scripts')
        <script>
            // Gráfico de Ingresos
            const ingresosLabels = @json($ingresosLabels);
            const ingresosData = {
                labels: ingresosLabels,
                datasets: [{
                    label: 'Ingresos por Mes',
                    backgroundColor: 'rgba(75, 192, 192, 0.8)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    data: @json($ingresosData),
                }]
            };

            const ingresosPorMesCanvas = document.getElementById('ingresosPorMes');
            const tipoGraficoIngresosSelect = document.getElementById('tipoGraficoIngresos');
            let ingresosPorMesChart;

            function crearGrafico(canvas, tipo = 'bar', data) {
                if (Chart.getChart(canvas)) {
                    Chart.getChart(canvas).destroy();
                }
                return new Chart(canvas, {
                    type: tipo,
                    data: data,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Monto'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Mes'
                                }
                            }
                        }
                    }
                });
            }

            // Inicializar gráfico de ingresos
            ingresosPorMesChart = crearGrafico(ingresosPorMesCanvas, tipoGraficoIngresosSelect.value, ingresosData);

            // Event listener para el selector de ingresos
            tipoGraficoIngresosSelect.addEventListener('change', function() {
                const nuevoTipo = this.value;
                ingresosPorMesChart = crearGrafico(ingresosPorMesCanvas, nuevoTipo, ingresosData);
            });

            // Gráfico de Egresos
            const egresosLabels = @json($egresosLabels);
            const egresosData = {
                labels: egresosLabels,
                datasets: [{
                    label: 'Egresos por Mes',
                    backgroundColor: 'rgba(255, 99, 132, 0.8)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1,
                    data: @json($egresosData),
                }]
            };

            const egresosPorMesCanvas = document.getElementById('egresosPorMes');
            const tipoGraficoEgresosSelect = document.getElementById('tipoGraficoEgresos');
            let egresosPorMesChart;

            // Inicializar gráfico de egresos
            egresosPorMesChart = crearGrafico(egresosPorMesCanvas, tipoGraficoEgresosSelect.value, egresosData);

            // Event listener para el selector de egresos
            tipoGraficoEgresosSelect.addEventListener('change', function() {
                const nuevoTipo = this.value;
                egresosPorMesChart = crearGrafico(egresosPorMesCanvas, nuevoTipo, egresosData);
            });
            
            // Gráfico de Ingresos vs Egresos
            const ingresosVsEgresosCanvas = document.getElementById('ingresosVsEgresosPorMes');
            const tipoGraficoIngresosVsEgresosSelect = document.getElementById('tipoGraficoIngresosVsEgresos');
            let ingresosVsEgresosChart;

            function crearGraficoIngresosVsEgresos(tipo = 'bar') {
                if (ingresosVsEgresosChart) {
                    ingresosVsEgresosChart.destroy();
                }
                ingresosVsEgresosChart = new Chart(ingresosVsEgresosCanvas, {
                    type: tipo,
                    data: {
                        labels: @json($ingresosLabels), // Usamos las etiquetas de ingresos (deberían ser las mismas que las de egresos en orden)
                        datasets: [
                            {
                                label: 'Ingresos',
                                backgroundColor: 'rgba(75, 192, 192, 0.8)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1,
                                data: @json($ingresosData),
                            },
                            {
                                label: 'Egresos',
                                backgroundColor: 'rgba(255, 99, 132, 0.8)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1,
                                data: @json($egresosData),
                            },
                        ],
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Monto'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Mes'
                                }
                            }
                        }
                    }
                });
            }

            crearGraficoIngresosVsEgresos(tipoGraficoIngresosVsEgresosSelect.value);

            tipoGraficoIngresosVsEgresosSelect.addEventListener('change', function() {
                const nuevoTipo = this.value;
                crearGraficoIngresosVsEgresos(nuevoTipo);
            });

        </script>
    @endpush

</x-layout>