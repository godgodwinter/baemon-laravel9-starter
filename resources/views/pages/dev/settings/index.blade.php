@extends('layouts.default')

@section('title')
Pengaturan
@endsection

@push('before-script')

@if (session('status'))
<x-sweetalertsession tipe="{{session('tipe')}}" status="{{session('status')}}"/>
@endif
@endpush

@section('content')
<x-jstooltip/>

    <h4 class="fw-bold py-3 mb-4">@yield('title')</h4>

    <div class="card px-2">
        <div class="row">
          <div class="col-xl-6 mb-xl-0 mb-3">
            <div
              class="btn-toolbar demo-inline-spacing"
              role="toolbar"
              aria-label="Toolbar with button groups"
            >
            <div class="btn-group" role="group" aria-label="Third group">

            </div>
            </div>
          </div>
        </div>


    <form id="setting-form" method="POST" action="{{route('dev.settings.update',$item->id)}}">
        @method('put')
        @csrf
    <div class="row py-2 px-2">

        <div class="form-group row align-items-center py-2">
            <label for="site-title" class="form-control-label col-sm-3 text-md-right">Nama Aplikasi</label>
            <div class="col-sm-6 col-md-9">

              <input type="text" class="form-control  @error('app_nama') is-invalid @enderror" name="app_nama" required  value="{{old('app_nama')?old('app_nama'):$item->app_nama}}">

              @error('app_nama')<div class="invalid-feedback"> {{$message}}</div>
              @enderror

            </div>
          </div>

          <div class="form-group row align-items-center py-2">
              <label for="site-title" class="form-control-label col-sm-3 text-md-right">Nama Pendek Aplikasi </label>
              <div class="col-sm-6 col-md-9">

                <input type="text" class="form-control  @error('app_namapendek') is-invalid @enderror" name="app_namapendek" required  value="{{old('app_namapendek')?old('app_namapendek'):$item->app_namapendek}}">

                @error('app_namapendek')<div class="invalid-feedback"> {{$message}}</div>
                @enderror

              </div>
            </div>



              <div class="card-footer d-flex justify-content-between flex-row-reverse">
                <button class="btn btn-primary" id="save-btn">Simpan</button>
              </div>
    </div>
    </div>
</form>

    <h4 class="py-4">Seeder and Reset</h4>

    <div class="card ">
        <div class="row py-2 px-2">
            <div class="col-xl-12 mb-xl-0 mb-3">
                <form action="{{ route('dev.seeder.kategori') }}" method="post" class="d-inline">
                    @csrf
                    <button class="btn  btn-info "
                        onclick="return  confirm('Anda yakin melakukan seeder ini ? Y/N')"  data-bs-toggle="tooltip" data-bs-placement="top" title="Seeder data!"><span
                            class="pcoded-micon"> Seeder Kategori</span></button>
                </form>
            </div>
        </div>

        <div class="row py-2 px-2">
            <div class="col-xl-12 mb-xl-0 mb-3">
                <form action="{{ route('dev.seeder.hard') }}" method="post" class="d-inline">
                    @csrf
                    <button class="btn  btn-danger "
                        onclick="return  confirm('Anda yakin melakukan soft reset ? Y/N')"  data-bs-toggle="tooltip" data-bs-placement="top" title="Hard reset!"><span
                            class="pcoded-micon"> Hard Reset</span></button>
                </form>
                <form action="{{ route('dev.seeder.soft') }}" method="post" class="d-inline">
                    @csrf
                    <button class="btn  btn-danger "
                        onclick="return  confirm('Anda yakin melakukan hard reset ? Y/N')"  data-bs-toggle="tooltip" data-bs-placement="top" title="Soft reset!"><span
                            class="pcoded-micon"> Soft Reset</span></button>
                </form>
            </div>
        </div>
    </div>

@endsection
