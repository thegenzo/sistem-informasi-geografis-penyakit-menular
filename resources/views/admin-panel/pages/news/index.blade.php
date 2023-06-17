@extends('admin-panel.layout.app')

@section('title', 'Berita')

@push('addon-style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('panel-assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Berita</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item active">Berita</div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="{{ route('admin-panel.news.create') }}" class="btn btn-icon icon-left btn-primary mb-4"><i
                            class="fas fa-plus"></i>Tambah Berita</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-6 col-12 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Berita</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
										<th class="text-center">Sampul Berita</th>
                                        <th>Judul Berita</th>
										<th>Penulis</th>
										<th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($news as $data)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
											<td class="text-center">
												<img src="{{ asset($data->cover_image) }}" class="img-responsive" alt="Carousel" width="300px"/>
											</td>
                                            <td>{{ $data->title }}</td>
                                            <td>{{ $data->user->name }}</td>
											<td class="text-center">
												@if ($data->status == 'draft')
													<span class="badge badge-danger">Diarsipkan</span>
												@else
													<span class="badge badge-success">Dipublikasi</span>
												@endif
											</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin-panel.news.edit', $data->id) }} " class="btn btn-warning"
                                                    data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{ route('admin-panel.news.destroy', $data->id) }}" method="POST" class="d-inline swal-confirm">
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
                                            <td colspan="6" style="font-weight: bold; font-size: 18px;"
                                                class="text-center">Data Berita Kosong</td>
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
                Swal.fire({
                    title: 'Yakin Hapus Berita?',
                    text: "Berita yang terhapus tidak dapat dikembalikan",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit()
                    } else if (result.isDenied) {
                        Swal.fire('Perubahan tidak disimpan', '', 'info')
                    }
                })
            });
        });
    </script>
@endpush
