@extends('admin-panel.layout.app')

@section('title', 'Tambah Data')

@push('addon-style')
	<link rel="stylesheet" href="{{ asset('panel-assets/node_modules/select2/dist/css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('panel-assets/node_modules/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .ce-block__content, .ce-toolbar__content { max-width:calc(100% - 100px) !important; } .cdx-block { max-width: 100% !important; }
    </style>
@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content" id="vue-scope" @vue:mounted="mounted">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Data</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Data</div>
                    <div class="breadcrumb-item active">Tambah Data</div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-6 col-12 col-sm-6">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger alert-has-icon">
                            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                            <div class="alert-body">
                                <div class="alert-title">Gagal Simpan Data</div>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    <form action="{{ route('admin-panel.data.store') }}"  method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4>Masukkan Data</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Judul data <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Masukkan Judul Data"
                                        name="title" id="title" value="{{ old('title') }}" v-model="data_config.options.title.text">
                                </div>
                                <div class="form-group">
									<label for="type">Tipe Grafik <span class="text-danger">*</span></label>
									<select name="type" id="type" class="form-control" v-bind:value="data_config.type" v-on:input="data_config.type = selectChartType($event.target.value)">
										<option value="" selected hidden>--- Pilih Tipe ---</option>
										@foreach ($chartType as $key => $value)
										<option value="{{ $key }}">{{ $value }}</option>
										@endforeach
									</select>
								</div>
                                <div class="form-group">
									<label for="type">Pratinjau Grafik <span class="text-danger">*</span></label>
									<div class="d-flex justify-content-center">
                                        <canvas id="myChart"></canvas>
                                    </div>
								</div>
								<div class="form-group">
									<label for="data">Konfigurasi Grafik <span class="text-danger">*</span></label>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="data">Label (Sumbu X, Pisahkan perbaris) <span class="text-danger">*</span></label>
                                                <textarea class="form-control" :value="data_config.data.labels.join('\n')" @input="data_config.data.labels = transformLabelText($event.target.value)" rows="5" style="height:100px;"></textarea>
                                            </div>

                                            <div id="accordion">
                                                <div class="accordion" v-for="(item, index) in data_config.data.datasets" :key="index">
                                                    <div class="accordion-header" role="button" data-toggle="collapse" v-bind:data-target="'#panel-body-' + index" v-bind:aria-expanded="[index==0 ? 'true' : 'false']">
                                                    <h4>@{{item.label}}</h4>
                                                    </div>
                                                    <div class="accordion-body collapse" :class="{ show: index==0 }" v-bind:id="'panel-body-' + index" data-parent="#accordion">
                                                        <div class="form-group">
                                                            <label for="title">Label <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" placeholder="Masukkan Label Dataset" v-model="item.label">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="title">Data (Sumbu Y) <span class="text-danger">*</span></label>
                                                            <input type="number" v-for="(label, index) in data_config.data.labels" :key="index" class="form-control" :placeholder="'Masukkan Data untuk ' + label" v-model="item.data[index]">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="title">Warna Garis <span class="text-danger">*</span></label>
                                                            <div class="input-group colorpickerinput">
                                                                <input type="text" class="form-control" v-model="item.borderColor">
                                                                <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-fill-drip"></i>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div v-if="data_config.type=='line' || data_config.type=='bar'">
                                                            <div class="form-group">
                                                                <label for="title">Warna Latar <span class="text-danger">*</span></label>
                                                                <div class="input-group colorpickerinput">
                                                                    <input type="text" class="form-control" v-model="item.backgroundColor">
                                                                    <div class="input-group-append">
                                                                        <div class="input-group-text">
                                                                            <i class="fas fa-fill-drip"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div v-if="data_config.type=='pie'">
                                                            <div class="form-group">
                                                                <label for="title">Warna Latar <span class="text-danger">*</span></label>
                                                                <div class="input-group colorpickerinput" v-for="(label, index) in data_config.data.labels" :key="index">
                                                                    <input type="text" class="form-control" v-model="item.backgroundColor[index]">
                                                                    <div class="input-group-append">
                                                                        <div class="input-group-text">
                                                                            <i class="fas fa-fill-drip"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="title">Lebar Garis</label>
                                                            <input type="number" class="form-control" placeholder="Masukkan Lebar Garis" v-model="item.borderWidth">
                                                        </div>

                                                        <div v-if="data_config.type=='line'">
                                                            <div class="form-group">
                                                                <label for="title">Jarak Garis Putus</label>
                                                                <input type="number" class="form-control" placeholder="Masukkan Jarak Garis Putus" v-model="item.borderDash[0]" @input="item.borderDash[1] = parseInt($event.target.value)"> 
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="title">Opsi Lainnya</label>
                                                                <div class="custom-switches-stacked mt-2">
                                                                    <label class="custom-switch">
                                                                        <input type="checkbox" class="custom-switch-input" v-model="item.fill">
                                                                        <span class="custom-switch-indicator"></span>
                                                                        <span class="custom-switch-description">Isi warna di bawah garis</span>
                                                                    </label>
                                                                    <label class="custom-switch">
                                                                        <input type="checkbox" class="custom-switch-input" @input="item.lineTension = toggleLineTension($event.target.checked)" checked>
                                                                        <span class="custom-switch-indicator"></span>
                                                                        <span class="custom-switch-description">Kurva halus</span>
                                                                    </label>
                                                                    <label class="custom-switch">
                                                                        <input type="checkbox" class="custom-switch-input" v-model="item.spanGaps">
                                                                        <span class="custom-switch-indicator"></span>
                                                                        <span class="custom-switch-description">Isi data kosong</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div v-if="data_config.type=='bar'">
                                                            <div class="form-group">
                                                                <label for="title">Presentase Balok</label>
                                                                <input type="number" class="form-control" placeholder="Masukkan Presentase Balok" v-model="item.barPercentage"> 
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="title">Presentase Kategori</label>
                                                                <input type="number" class="form-control" placeholder="Masukkan Presentase Kategori" v-model="item.categoryPercentage"> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button @click="addDataset" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                Tambah Dataset
                                            </button>
                                            <button @click="previewDataset" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                Preview Dataset
                                            </button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="data" id="data" value="@{{ data_config }}">
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin-panel.data.index') }}" class="btn btn-lg btn-warning d-inline">Kembali</a>
                        <button class="btn btn-success" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('addon-script')
	<script src="{{ asset('panel-assets/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
	<script src="{{ asset('panel-assets/node_modules/selectric/public/jquery.selectric.min.js') }}"></script>
	<script src="{{ asset('panel-assets/node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/petite-vue@0.4.1/dist/petite-vue.iife.js"></script>
    <script>
        PetiteVue.createApp({
            // exposed to all expressions  
            preview_chart: null,         
            data_config: {
                "type": "line",
                "data": {
                    "datasets": [{
                            "fill": true,
                            "spanGaps": false,
                            "lineTension": 0.4,
                            "pointRadius": 3,
                            "pointHoverRadius": 3,
                            "pointStyle": "circle",
                            "borderDash": [
                                0,
                                0
                            ],
                            "barPercentage": 0.9,
                            "categoryPercentage": 0.8,
                            "data": [
                                20,
                                52,
                                52,
                                50,
                                44
                            ],
                            "type": "line",
                            "label": "Dataset 1",
                            "borderColor": "#4E79A7",
                            "backgroundColor": "#4E79A733",
                            "borderWidth": 1,
                            "hidden": false
                        }
                    ],
                    "labels": [
                        "Jan",
                        "Feb",
                        "Mar",
                        "Apr",
                        "May"
                    ]
                },
                "options": {
                    "title": {
                    "display": true,
                    "position": "top",
                    "fontSize": 12,
                    "fontFamily": "sans-serif",
                    "fontColor": "#666666",
                    "fontStyle": "bold",
                    "padding": 10,
                    "lineHeight": 1.2,
                    "text": ""
                    },
                    "layout": {
                    "padding": {},
                    "left": 0,
                    "right": 0,
                    "top": 0,
                    "bottom": 0
                    },
                    "legend": {
                    "display": true,
                    "position": "top",
                    "align": "center",
                    "fullWidth": true,
                    "reverse": false,
                    "labels": {
                        "fontSize": 12,
                        "fontFamily": "sans-serif",
                        "fontColor": "#666666",
                        "fontStyle": "normal",
                        "padding": 10
                    }
                    },
                    "scales": {
                    "xAxes": [
                        {
                        "id": "X1",
                        "display": true,
                        "position": "bottom",
                        "type": "category",
                        "stacked": false,
                        "offset": true,
                        "time": {
                            "unit": false,
                            "stepSize": 1,
                            "displayFormats": {
                            "millisecond": "h:mm:ss.SSS a",
                            "second": "h:mm:ss a",
                            "minute": "h:mm a",
                            "hour": "hA",
                            "day": "MMM D",
                            "week": "ll",
                            "month": "MMM YYYY",
                            "quarter": "[Q]Q - YYYY",
                            "year": "YYYY"
                            }
                        },
                        "distribution": "linear",
                        "gridLines": {
                            "display": true,
                            "color": "rgba(0, 0, 0, 0.1)",
                            "borderDash": [
                            0,
                            0
                            ],
                            "lineWidth": 1,
                            "drawBorder": true,
                            "drawOnChartArea": true,
                            "drawTicks": true,
                            "tickMarkLength": 10,
                            "zeroLineWidth": 1,
                            "zeroLineColor": "rgba(0, 0, 0, 0.25)",
                            "zeroLineBorderDash": [
                            0,
                            0
                            ]
                        },
                        "angleLines": {
                            "display": true,
                            "color": "rgba(0, 0, 0, 0.1)",
                            "borderDash": [
                            0,
                            0
                            ],
                            "lineWidth": 1
                        },
                        "pointLabels": {
                            "display": true,
                            "fontColor": "#666",
                            "fontSize": 10,
                            "fontStyle": "normal"
                        },
                        "ticks": {
                            "display": true,
                            "fontSize": 12,
                            "fontFamily": "sans-serif",
                            "fontColor": "#666666",
                            "fontStyle": "normal",
                            "padding": 0,
                            "stepSize": null,
                            "minRotation": 0,
                            "maxRotation": 50,
                            "mirror": false,
                            "reverse": false
                        },
                        "scaleLabel": {
                            "display": false,
                            "labelString": "Axis label",
                            "lineHeight": 1.2,
                            "fontColor": "#666666",
                            "fontFamily": "sans-serif",
                            "fontSize": 12,
                            "fontStyle": "normal",
                            "padding": 4
                        }
                        }
                    ],
                    "yAxes": [
                        {
                        "id": "Y1",
                        "display": true,
                        "position": "left",
                        "type": "linear",
                        "stacked": false,
                        "offset": false,
                        "time": {
                            "unit": false,
                            "stepSize": 1,
                            "displayFormats": {
                            "millisecond": "h:mm:ss.SSS a",
                            "second": "h:mm:ss a",
                            "minute": "h:mm a",
                            "hour": "hA",
                            "day": "MMM D",
                            "week": "ll",
                            "month": "MMM YYYY",
                            "quarter": "[Q]Q - YYYY",
                            "year": "YYYY"
                            }
                        },
                        "distribution": "linear",
                        "gridLines": {
                            "display": true,
                            "color": "rgba(0, 0, 0, 0.1)",
                            "borderDash": [
                            0,
                            0
                            ],
                            "lineWidth": 1,
                            "drawBorder": true,
                            "drawOnChartArea": true,
                            "drawTicks": true,
                            "tickMarkLength": 10,
                            "zeroLineWidth": 1,
                            "zeroLineColor": "rgba(0, 0, 0, 0.25)",
                            "zeroLineBorderDash": [
                            0,
                            0
                            ]
                        },
                        "angleLines": {
                            "display": true,
                            "color": "rgba(0, 0, 0, 0.1)",
                            "borderDash": [
                            0,
                            0
                            ],
                            "lineWidth": 1
                        },
                        "pointLabels": {
                            "display": true,
                            "fontColor": "#666",
                            "fontSize": 10,
                            "fontStyle": "normal"
                        },
                        "ticks": {
                            "display": true,
                            "fontSize": 12,
                            "fontFamily": "sans-serif",
                            "fontColor": "#666666",
                            "fontStyle": "normal",
                            "padding": 0,
                            "stepSize": null,
                            "minRotation": 0,
                            "maxRotation": 50,
                            "mirror": false,
                            "reverse": false
                        },
                        "scaleLabel": {
                            "display": false,
                            "labelString": "Axis label",
                            "lineHeight": 1.2,
                            "fontColor": "#666666",
                            "fontFamily": "sans-serif",
                            "fontSize": 12,
                            "fontStyle": "normal",
                            "padding": 4
                        }
                        }
                    ]
                    },
                    "plugins": {
                    "datalabels": {
                        "display": false,
                        "align": "center",
                        "anchor": "center",
                        "backgroundColor": "#eee",
                        "borderColor": "#ddd",
                        "borderRadius": 6,
                        "borderWidth": 1,
                        "padding": 4,
                        "color": "#666666",
                        "font": {
                        "family": "sans-serif",
                        "size": 10,
                        "style": "normal"
                        }
                    },
                    "datalabelsZAxis": {
                        "enabled": false
                    },
                    "googleSheets": {},
                    "airtable": {},
                    "tickFormat": ""
                    },
                    "cutoutPercentage": 50,
                    "rotation": -1.5707963267948966,
                    "circumference": 6.283185307179586,
                    "startAngle": -1.5707963267948966
                }
            },
            addDataset(){
                let dsCount = this.data_config.data.datasets.length;
                this.data_config.data.datasets.push({
                    "fill": true,
                    "spanGaps": false,
                    "lineTension": 0.4,
                    "pointRadius": 3,
                    "pointHoverRadius": 3,
                    "pointStyle": "circle",
                    "borderDash": [
                        0,
                        0
                    ],
                    "barPercentage": 0.9,
                    "categoryPercentage": 0.8,
                    "data": [
                        20,
                        52,
                        52,
                        50,
                        44
                    ],
                    "type": "line",
                    "label": "Dataset " + (dsCount+1),
                    "borderColor": "#4E79A7",
                    "backgroundColor": "#4E79A733",
                    "borderWidth": 1,
                    "hidden": false
                })
            },
            previewDataset(){
                for(let x = 0; x < this.data_config.data.datasets.length; x++){
                    this.data_config.data.datasets[x].type = this.data_config.type;
                }
                console.log(this.data_config);
                // this.chart_preview = 'https://quickchart.io/chart?c=' + encodeURIComponent(JSON.stringify(this.data_config));
                var ctx = document.getElementById("myChart").getContext('2d');
                if(window.preview_chart !== undefined){
                    window.preview_chart.destroy();
                }
                let dConfig = Object.assign({}, this.data_config);
                window.preview_chart = new Chart(ctx, dConfig);
            },
            transformLabelText(value){
                return value.split("\n");
            },
            selectChartType(value){
                if(value == 'line' || value == 'bar'){
                    // Jika line chart atau bar chart, jadikan background color menjadi single string
                    for(let i = 0; i < this.data_config.data.datasets.length; i++){
                        if(typeof this.data_config.data.datasets[i].backgroundColor === 'object'){
                            this.data_config.data.datasets[i].backgroundColor = "#4E79A733";
                            this.data_config.data.datasets[i].borderColor = "#4E79A7";
                            this.data_config.data.datasets[0].type = value;
                            this.data_config.options.cutoutPercentage = 50;
                            this.data_config.options.scales.xAxes[0].display = true;
                            this.data_config.options.scales.xAxes[0].display = false;
                            this.data_config.options.scales.yAxes = [{"id":"Y1","display":true,"position":"left","type":"linear","stacked":false,"offset":false,"time":{"unit":false,"stepSize":1,"displayFormats":{"millisecond":"h:mm:ss.SSS a","second":"h:mm:ss a","minute":"h:mm a","hour":"hA","day":"MMM D","week":"ll","month":"MMM YYYY","quarter":"[Q]Q - YYYY","year":"YYYY"}},"distribution":"linear","gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)","borderDash":[0,0],"lineWidth":1,"drawBorder":true,"drawOnChartArea":true,"drawTicks":true,"tickMarkLength":10,"zeroLineWidth":1,"zeroLineColor":"rgba(0, 0, 0, 0.25)","zeroLineBorderDash":[0,0]},"angleLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)","borderDash":[0,0],"lineWidth":1},"pointLabels":{"display":true,"fontColor":"#666","fontSize":10,"fontStyle":"normal"},"ticks":{"display":true,"fontSize":12,"fontFamily":"sans-serif","fontColor":"#666666","fontStyle":"normal","padding":0,"stepSize":null,"minRotation":0,"maxRotation":50,"mirror":false,"reverse":false},"scaleLabel":{"display":false,"labelString":"Axis label","lineHeight":1.2,"fontColor":"#666666","fontFamily":"sans-serif","fontSize":12,"fontStyle":"normal","padding":4}}];
                        }
                    }
                }
                if(value == "pie"){
                    if(typeof this.data_config.data.datasets[0].backgroundColor === 'string'){
                        this.data_config.data.datasets[0].backgroundColor = [
                            "#4E79A7",
                            "#F28E2B",
                            "#E15759",
                            "#76B7B2",
                            "#59A14F"
                        ];
                        this.data_config.data.datasets[0].borderColor = "#ffffff";
                        this.data_config.data.datasets[0].type = "pie";
                        this.data_config.options.cutoutPercentage = 0;
                        this.data_config.options.scales.xAxes[0].display = false;
                        this.data_config.options.scales.xAxes[0].offset = true;
                        this.data_config.options.scales.yAxes = [];
                    }
                    // Only keep 1 dimension data
                    this.data_config.data.datasets.splice(1);
                }
                return value;
            },
            toggleLineTension(value){
                if(value == true){
                    return 0.4;
                }
                return 0
            },
            mounted() {
                console.log('PetitieVue Mounted');
                this.previewDataset();
            },
        }).mount("#vue-scope");
        $(document).ready(function(){
           
        });
    </script>
@endpush
