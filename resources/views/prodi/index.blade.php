@extends('layouts.app')
@section('title','Prodi Page')
@section('bread1','Prodi')
@section('bread2','Data')
@section('content')
  <h3>Master Data Prodi</h3>
  <p><a href="/mhs/create" class="btn btn-success btn-sm">Tambah</a></p>
    @include('layouts.alert')
  <table class="table table-striped" id="mhs-table">
    <thead>
      <tr>
        <th>No</th>
        <th>Kode Prodi</th>
        <th>Nama Prodi</th>
        <th>Kaprodi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($prodi as $item)
      <tr>
        <td>{{ $loop->index +1 }}</td>
        <td>{{ $item->kode_prodi }}</td>
        <td>{{ $item->nama_prodi }}</td>
        <td>{{ $item->kaprodi }}</td>
      </tr>
      @empty
          <tr>
            <td colspan="6" class="text-center">Data masih kosong</td>
          </tr>
      @endforelse
    </tbody>
  </table>
@endsection