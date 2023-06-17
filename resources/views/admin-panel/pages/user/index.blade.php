@extends('admin-panel.layout.app')

@section('title', 'Manajemen Akun')

@push('addon-style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('panel-assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Manajemen Akun</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item active">Manajemen Akun</div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="{{ route('admin-panel.user.create') }}" class="btn btn-icon icon-left btn-primary mb-4"><i
                            class="fas fa-plus"></i>Tambah Akun</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-6 col-12 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Akun</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
										<th>Nama</th>
                                        <th class="text-center">Level</th>
                                        <th>Akses Situs</th>
										<th>Email</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($user as $data)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $data->name }}</td>
											<td class="text-center">
												@if ($data->level == 'admin')
												<span class="badge badge-danger">Admin</span>
												@else
												<span class="badge badge-light">User</span>
												@endif
											</td>
                                            <td>
                                                @if(empty($data->sites))
                                                <span class="badge badge-danger">Tidak ada</span>
                                                @elseif($data->sites[0] == '*')
                                                <span class="badge badge-info">Semua Situs</span>
                                                @else
                                                    @foreach($data->sites as $site)
                                                        <span class="badge badge-info" style="margin-bottom: 5px;">{{ \App\Models\Site::firstWhere('app_id', $site)->name }} <a target="_blank" class ="imp-timeout" href="{{ $data->getImpersonateLink($site) }}"><i class="fa fa-sign-in-alt ml-2"></i></a></span> <br>
                                                    @endforeach
                                                @endif
                                            </td>
											<td>{{ $data->email }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin-panel.user.edit', $data->id) }} " class="btn btn-warning"
                                                    data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{ route('admin-panel.user.destroy', $data->id) }}" method="POST" class="d-inline swal-confirm">
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
                                            <td colspan="5" style="font-weight: bold; font-size: 18px;"
                                                class="text-center">Data User Kosong</td>
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
                        title: `Yakin Hapus Akun?`,
                        text: "Akun yang terhapus tidak dapat dikembalikan",
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

            setTimeout(function(){
                $('.imp-timeout').attr('href', '#');
                $('.imp-timeout').attr('target', '')
            }, 3000);

        });
    </script>
@endpush
