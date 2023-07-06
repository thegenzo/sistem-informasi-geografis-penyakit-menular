@extends('admin-panel.layout.app')

@section('title', 'Data Kasus')

@push('addon-style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('panel-assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Kasus</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item active">Data Kasus</div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="{{ route('admin-panel.cases.create') }}" class="btn btn-icon icon-left btn-primary mb-4"><i
                            class="fas fa-plus"></i>Tambah Kasus</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-6 col-12 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Kasus</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Kecamatan</th>
										<th>FASKES</th>
										<th>Penyakit</th>
										<th class="text-center">Status</th>
										<th class="text-center">Jenis Kelamin</th>
										<th class="text-center">Usia</th>
										<th class="text-center">Total Pasien</th>
										<th class="text-center">Tingkat Keparahan</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($cases as $data)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $data->healthcare_facilities->district->name }}</td>
											<td>{{ $data->healthcare_facilities->name }}</td>
											<td>{{ $data->disease->name }}</td>
											<td class="text-center">
                                                @if ($data->status == 'suspected')
                                                <span class="badge badge-warning">Terduga</span>
                                                @elseif ($data->status == 'confirmed')
                                                <span class="badge badge-danger">Positif</span>
                                                @elseif ($data->status == 'recovered')
                                                <span class="badge badge-success">Sembuh</span>
                                                @else
                                                <span class="badge badge-light">Meninggal</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($data->gender == 'male')
                                                Laki-laki
                                                @else
                                                Perempuan
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $data->age }}</td>
                                            <td class="text-center">{{ $data->total }}</td>
                                            <td class="text-center">
                                                @if ($data->severity == 'mild')
                                                <span class="badge badge-info">Ringan</span>
                                                @elseif ($data->severity == 'moderate')
                                                <span class="badge badge-warning">Sedang</span>
                                                @elseif ($data->severity == 'severe')
                                                <span class="badge badge-danger">Berat</span>
                                                @elseif ($data->severity == 'critical')
                                                <span class="badge badge-dark">Kritis</span>
                                                @else
                                                <span class="badge badge-light">Tanpa gejala</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                {{-- <a target="_blank" href="{{ route('web.major', $data->getRouteParam()) }} " class="btn btn-info"
                                                    data-toggle="tooltip" data-placement="top" title="Lihat">
                                                    <i class="fa fa-eye"></i>
                                                </a> --}}
                                                <a href="{{ route('admin-panel.cases.edit', $data->id) }} " class="btn btn-warning"
                                                    data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{ route('admin-panel.cases.destroy', $data->id) }}" method="POST" class="d-inline swal-confirm">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger swal-confirm" type="submit"
                                                        data-id="{{ $data->id }}">
                                                        <i class="fas fa-trash swal-confirm"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" style="font-weight: bold; font-size: 18px;"
                                                class="text-center">Data Kasus Penyakit Menular Kosong</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('addon-script')
    <!-- JS Libraies -->
    <script src="{{ asset('panel-assets/node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('panel-assets/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('panel-assets/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#datatable").dataTable();

            $('.swal-confirm').click(function(event) {
                var form = $(this).closest("form");
                var id = $(this).data("id");
                event.preventDefault();
                swal({
                        title: `Yakin Hapus Kasus?`,
                        text: "Kasus yang terhapus tidak dapat dikembalikan",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus',
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        }
                    });
            });

        });
    </script>
@endpush
