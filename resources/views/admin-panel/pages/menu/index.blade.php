@extends('admin-panel.layout.app')

@section('title', 'Manajemen Menu')

@push('addon-style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('panel-assets/node_modules/select2/dist/css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('panel-assets/node_modules/selectric/public/selectric.css') }}">
@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Manajemen Menu</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item active">Manajemen Menu</div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="{{ route('admin-panel.menu.create') }}" class="btn btn-icon icon-left btn-primary mb-4"><i
                            class="fas fa-plus"></i>Tambah Menu</a>
                </div>
            </div>
            <div class="row sortable-card" id="parent-sort">
              @foreach($menus as $menu)
              <div class="col-12 col-md-6 col-lg-4" id="menu_{{ $menu->id }}">
                <div class="card card-primary">                  
                    <div class="card-header">
                      <h4>{{ $menu->name }}</h4>
                      <div class="card-header-action">
                        <form action="{{ route('admin-panel.menu.destroy', $menu->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('admin-panel.menu.destroy', $menu->id) }}" data-id="{{ $menu->id }}"><i class="fas fa-times text-danger swal-confirm"></i></a>
                        </form> 
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                          <label for="">Nama Menu</label>
                          <input type="name" class="form-control" name="name" id="name-{{$menu->id}}" value="{{ $menu->name }}">
                      </div>
                      <div class="form-group">
                        <label>Tipe Menu</label>
                        <select name="type" id="type-{{$menu->id}}" class="form-control selectric">
                              <option value="route" {{ $menu->type == 'route' ? 'selected' : '' }}>Route</option>
                              <option value="page" {{ $menu->type == 'page' ? 'selected' : '' }}>Halaman</option>
                              <option value="link" {{ $menu->type == 'link' ? 'selected' : '' }}>Tautan</option>
                              <option value="dropdown" {{ $menu->type == 'dropdown' ? 'selected' : '' }}>Sub-Menu</option>
                        </select>
                      </div>
                      @if($menu->type == 'route')
                      <div class="form-group">
                        <label>Target Route</label>
                        <select name="target" id="target-{{$menu->id}}" class="form-control selectric">
                          @foreach($allRoutes as $route)
                            @if(!empty($route->getName()))
                              <option value="{{ $route->getName() }}" {{ $menu->target == $route->getName() ? 'selected' : '' }}>{{ $route->getName() }}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                      @endif
                      @if($menu->type == 'page')
                      <div class="form-group">
                        <label>Target Halaman</label>
                        <select name="target" id="target-{{$menu->id}}" class="form-control selectric">
                          @foreach($allPages as $page)
                            <option value="{{ $page->id }}" {{ $menu->target == $page->id ? 'selected' : '' }}>{{ $page->title }}</option>
                          @endforeach
                        </select>
                      </div>
                      @endif
                      @if($menu->type == 'link')
                      <div class="form-group">
                          <label for="">Tautan</label>
                          <input type="text" class="form-control" placeholder="Masukkan link tautan" name="target-{{$menu->id}}" id="target-{{$menu->id}}" value="{{ $menu->target }}">
                      </div>
                      @endif
                      @if($menu->type == 'dropdown')
                      <input type="hidden" id="target-{{$menu->id}}" value="#" />
                      <a href="{{ route('admin-panel.menu.create', ['submenu' => 1, 'parent_id' => $menu->id]) }}" class="btn btn-icon icon-left btn-primary mb-4"><i class="fas fa-plus"></i>Tambah Sub-menu</a>
                      <ul class="list-group sortable-ul" id="dropdown-sort-{{$menu->id}}" >
                          @foreach($menu->child_menu()->orderBy('menu_order', 'asc')->get() as $child)
                              <li class="list-group-item d-flex justify-content-between align-items-center" id="child_{{ $child->id }}">
                                  {{ $child->name }}
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                      <a href="{{ route('admin-panel.menu.edit', $child->id) }}"><i class="fas fa-edit mr-2"></i></a>
                                      <form action="{{ route('admin-panel.menu.destroy', $child->id) }}" method="POST" class="d-inline">
                                          @csrf
                                          @method('DELETE')
                                          <a href="{{ route('admin-panel.menu.destroy', $child->id) }}" data-id="{{ $child->id }}"><i class="fas fa-times text-danger swal-confirm"></i></a>
                                      </form> 
                                  </div>
                              </li>
                          @endforeach
                      </ul>
                      @endif
                    </div>
                    <div class="card-footer text-right">
                      <a href="#!" onclick="saveMenu('{{$menu->id}}', '{{ route('admin-panel.menu.update', $menu->id) }}')" class="btn btn-primary">Simpan</a>
                    </div>
                </div>
              </div>
              @endforeach
            </div>
        </section>
    </div>
@endsection

@push('addon-script')
    <script src="{{ asset('panel-assets/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
	<script src="{{ asset('panel-assets/node_modules/selectric/public/jquery.selectric.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Sortable card
            if($('.sortable-card').length && jQuery().sortable) {
                $('.sortable-card').sortable({
                    handle: '.card-header',
                    opacity: .8,
                    tolerance: 'pointer',
                    update: function( event, ui ) {
                      var menu_order = $("#parent-sort").sortable( "serialize", { key: "menus[]" } );
                      $.ajax({
                        type:'POST',
                        url: '{{ route('admin-panel.menu.updateParentMenuOrder') }}',
                        data:{
                          "_token": "{{ csrf_token() }}",
                          "menu_order": menu_order
                        },
                        success:function(data){
                          if(data.status !== 'success'){
                            new swal("Gagal!", "Urutan menu gagal disimpan!", "error");
                          }
                        },
                        error: function(data){
                          new swal("Gagal!", "Urutan menu gagal disimpan!", "error");
                        }
                      });
                    }
                });
            }
            if($('.sortable-ul').length && jQuery().sortable) {
                $('.sortable-ul').sortable({
                    opacity: .8,
                    tolerance: 'pointer',
                });
            }
            $('.swal-confirm').click(function(event) {
                var form = $(this).closest("form");
                var id = $(this).data("id");
                event.preventDefault();
                Swal.fire({
                        title: `Yakin Hapus Menu?`,
                        text: "Menu yang terhapus tidak dapat dikembalikan",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus',
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
            });
            window.saveMenu = function (menu_id, _url){
              var name = $("#name-" + menu_id).val();
              var type = $("#type-" + menu_id).val();
              var target = $("#target-" + menu_id).val();

              var sub_menu_order = "";
              if(type == "dropdown" && $("#dropdown-sort-" + menu_id).length > 0){
                sub_menu_order = $("#dropdown-sort-" + menu_id).sortable( "serialize", { key: "childs[]" } );
              }

              $.ajax({
                type:'POST',
                url:_url,
                data:{
                  "_token": "{{ csrf_token() }}",
                  "_method": "PUT",
                  "name": name,
                  "type": type,
                  "target": target,
                  "sub_menu_order": sub_menu_order
                },
                success:function(data){
                  if(data.status == 'success'){
                    new swal("Sukses!", "Menu berhasil disimpan!", "success").then(function(){
                      window.location.reload();
                    })
                  }
                  else {
                    new swal("Gagal!", "Menu gagal disimpan!", "error");
                  }
                },
                error: function(data){
                  var errorMsg = "";                  
                  const keys = Object.keys(data.responseJSON);
                  for (let i = 0; i < keys.length; i++) {
                    const key = keys[i];
                    errorMsg += data.responseJSON[key][0] + "<br>";
                  }
                  new swal("Gagal!", "Menu gagal disimpan!<br>" + errorMsg, "error");
                }
              });


            }
        });
    </script>
@endpush
