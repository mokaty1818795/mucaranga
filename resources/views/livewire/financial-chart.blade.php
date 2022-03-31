<div>
    <div class="row w-80">
        <div class="col-12 d-flex">
            <div class="card flex-fill w-10">
                <div class="card-header">
                    <div class="float-end">
                        <form class="row g-2" action="{{ route('excel_invoices') }}" method="POST" >
                            @csrf
                            @method('POST')
                            <div class="col-auto">
                                <input type="text" name="dates" class="form-control bg-light border-0 py-2"
                                    id="dates"  value="">
                            </div>
                            <div class="col-auto">
                                <button  type="submit" class="btn btn-primary-light">
                                    Baixar relatório</button>
                            </div>
                        </form>
                    </div>
                    <h5 class="card-title mb-0">Relatório financeiro</h5>

                </div>
                <div class="card-body pt-2 pb-3">
                    <div class="chart chart-md">
                        <canvas id="chartjs-dashboard-line"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
    <script>

        $('#dates').on('apply.daterangepicker', function(ev, picker) {
                @this.set("dates",this.value);
        });

        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
            var gradientLight = ctx.createLinearGradient(0, 0, 0, 225);
            gradientLight.addColorStop(0, "rgba(215, 227, 244, 1)");
            gradientLight.addColorStop(1, "rgba(215, 227, 244, 0)");
            // Line chart
            new Chart(document.getElementById("chartjs-dashboard-line"), {
                type: "line",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov",
                        "Dec"
                    ],
                    datasets: [{
                        label: "Entradas (MZN)",
                        tension: 0.3,
                        fill: true,
                        backgroundColor: gradientLight,
                        borderColor: window.theme.primary,
                        data: @js($data)
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    tooltips: {
                        intersect: false
                    },
                    hover: {
                        intersect: true
                    },
                    plugins: {
                        filler: {
                            propagate: false
                        }
                    },

                }
            });
        });
    </script>
    @endpush
</div>
