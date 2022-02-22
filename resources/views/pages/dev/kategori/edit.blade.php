@extends('layouts.default')

@section('title')
Kategori
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
              <a href="{{route('dev.crud')}}" type="button" class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Kembali">
                <i class="fa-solid fa-circle-arrow-left"></i>
              </a>
            </div>
            </div>
          </div>
        </div>

    <hr class="my-1" />

    <form id="setting-form" method="POST" action="{{route('dev.crud.update',$item->id)}}">
        @method('put')
        @csrf
    <div class="row py-2 px-2">

        <div class="form-group row align-items-center py-2">
            <label for="site-title" class="form-control-label col-sm-3 text-md-right">Nama </label>
            <div class="col-sm-6 col-md-9">

              <input type="text" class="form-control  @error('nama') is-invalid @enderror" name="nama" required  value="{{old('nama')?old('nama'):$item->nama}}">

              @error('nama')<div class="invalid-feedback"> {{$message}}</div>
              @enderror

            </div>
          </div>

          <div class="form-group row align-items-center py-2">
              <label for="site-title" class="form-control-label col-sm-3 text-md-right">Prefix </label>
              <div class="col-sm-6 col-md-9">

                <input type="text" class="form-control  @error('prefix') is-invalid @enderror" name="prefix" required  value="{{old('prefix')?old('prefix'):$item->prefix}}">

                @error('prefix')<div class="invalid-feedback"> {{$message}}</div>
                @enderror

              </div>
            </div>

            <div class="form-group row align-items-center py-2">
                <label for="site-title" class="form-control-label col-sm-3 text-md-right">Kode </label>
                <div class="col-sm-6 col-md-9">

                  <input type="text" class="form-control  @error('kode') is-invalid @enderror" name="kode" required  value="{{old('kode')?old('kode'):$item->kode}}">

                  @error('kode')<div class="invalid-feedback"> {{$message}}</div>
                  @enderror

                </div>
              </div>

              <div class="card-footer d-flex justify-content-between flex-row-reverse">
                <button class="btn btn-primary" id="save-btn">Simpan</button>
              </div>
    </div>
    </div>


@endsection
