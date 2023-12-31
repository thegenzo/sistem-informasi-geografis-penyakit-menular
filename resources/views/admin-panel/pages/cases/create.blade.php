@extends('admin-panel.layout.app')

@section('title', 'Tambah Kasus')

@push('addon-style')
	<link rel="stylesheet" href="{{ asset('panel-assets/node_modules/select2/dist/css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('panel-assets/node_modules/selectric/public/selectric.css') }}">
@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Kasus</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Data Kasus</div>
                    <div class="breadcrumb-item active">Tambah Kasus</div>
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
                    <form action="{{ route('admin-panel.cases.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4>Masukkan Data Jurusan</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="healthcare_facilities_id">FASKES <span class="text-danger">*</span></label>
                                    <select name="healthcare_facilities_id" id="healthcare_facilities_id" class="form-control select2">
										<option value="" selected hidden>--- Pilih FASKES ---</option>
										@forelse (\App\Models\HealthcareFacilities::all() as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                        @empty
                                        <option value="" disabled>Data FASKES kosong</option>
                                        @endforelse
									</select>
                                </div>
                                <div class="form-group">
                                    <label for="disease_id">Penyakit <span class="text-danger">*</span></label>
                                    <select name="disease_id" id="disease_id" class="form-control select2">
										<option value="" selected hidden>--- Pilih Penyakit ---</option>
										@forelse (\App\Models\Disease::all() as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                        @empty
                                        <option value="" disabled>Data Penyakit kosong</option>
                                        @endforelse
									</select>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="age">Usia <span class="text-danger">*</span></label>
                                            <select name="age" id="age" class="form-control select2">
                                                <option value="" selected hidden>--- Pilih Kelompok Usia ---</option>
                                                <option value="0 - 18">0 - 18 Tahun</option>
                                                <option value="18 - 30">18 - 30 Tahun</option>
                                                <option value="30 Tahun Keatas">30 Tahun Keatas</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="total">Total Pasien <span class="text-danger">*</span></label>
                                            <input type="number" name="total" id="total" class="form-control" value="{{ old('total') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="status">Status <span class="text-danger">*</span></label>
                                            <select name="status" id="status" class="form-control select2">
                                                <option value="" selected hidden>--- Pilih Status ---</option>
                                                <option value="suspected">Terduga</option>
                                                <option value="confirmed">Positif</option>
                                                <option value="recovered">Sembuh</option>
                                                <option value="deceased">Meninggal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="gender">Jenis Kelamin <span class="text-danger">*</span></label>
                                            <select name="gender" id="gender" class="form-control select2">
                                                <option value="" selected hidden>--- Pilih Jenis Kelamin ---</option>
                                                <option value="male">Laki-laki</option>
                                                <option value="female">Perempuan</option>
                                                <option value="m+f">Laki-laki + Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="severity">Tingkat Kekerasan <span class="text-danger">*</span></label>
                                            <select name="severity" id="severity" class="form-control select2">
                                                <option value="" selected hidden>--- Pilih Tingkat Kekerasan ---</option>
                                                <option value="mild">Ringan</option>
                                                <option value="moderate">Sedang</option>
                                                <option value="severe">Berat</option>
                                                <option value="critical">Kritis</option>
                                                <option value="asymptomatic">Tanpa gejala</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin-panel.cases.index') }}" class="btn btn-lg btn-warning d-inline">Kembali</a>
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
	<script>
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				
				reader.onload = function (e) {
					$('#cover_image_preview').attr('src', e.target.result);
				}
				
				reader.readAsDataURL(input.files[0]);
			}
		}
		$("#cover_image").change(function(){
			readURL(this);
		});
	</script>
@endpush
