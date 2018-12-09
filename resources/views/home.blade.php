@extends('layouts.appbaru')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Data Buku</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Judul</th>
      <th scope="col">Pengarang</th>
      <th scope="col">Penerbit</th>
      <th scope="col">Jenis Buku</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
@foreach($buku as  $no => $buku)
    <tr>
    <th scope="row">{{++$no}}</th>
    <td>{{$buku->JudulBuku}}</td>
      <td>{{$buku->Pengarang}}</td>
      <td>{{$buku->Penerbit}}</td>
      <td>{{$buku->JenisBuku}}</td>
      <td><button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#edit"
data-id="{{$buku->IdBuku}}"data-judul="{{$buku->JudulBuku}}"
data-pengarang="{{$buku->Pengarang}}"data-penerbit="{{$buku->Penerbit}}"data-jenis="{{$buku->JenisBuku}}">Edit</button>
<a href="/delete/{{$buku->IdBuku}}" onclick="return confirm('Apakah anda yakin ?')"><button type="button" class="btn btn-danger">Delete</button></a>
      </td>
      @endforeach
    </tr>
</tbody>
  <button type="button" class="btn btn-primary" class="btn btn-warning"  
  data-toggle="modal" data-target="#simpan">Tambah Buku</button>
</table>
                </div>
            </div>
             <div class="container">
       <div class="row">
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"></div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
          <button type="button" class="btn btn-info"
          data-toggle="modal" data-target="#peminjaman">Peminjaman</button> 
          <button type="button" class="btn btn-info"
          data-toggle="modal" data-target="#pengembalian">Pengembalian</button>
          <a href="/cetak" ><button type="button" class="btn btn-info">Cetak</button></a>
        </div>
      </div>
    </div>
        </div>
        
    </div><br>
   @if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif
</div>
<div class="modal fade" id="simpan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <form action="/simpan" method="post">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Simpan Data Buku</h3>
      </div>

      <div class="modal-body">

            {{ csrf_field() }}
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Judul buku:</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="form-control-label">Pengarang :</label>
            <input type="text" class="form-control" id="pengarang" name="pengarang" required>
          </div>
           <div class="form-group">
            <label for="recipient-name" class="form-control-label">Penerbit :</label>
            <input type="text" class="form-control" id="penerbit" name="penerbit" required>
          </div>
           <div class="form-group">
                <label for="recipient-name" class="form-control-label">Jenis Buku:</label>
             <select class="form-control" id="jenisbuku" name="jenisbuku">
      <option value="Umum">Umum</option>
     <option value="Filsafat Dan Psikologi">Filsafat Dan Psikologi</option>
     <option value="Agama">Agama</option>
     <option value="Sosial">Sosial</option>
     <option value="Bahasa">Bahasa</option>
     <option value="Sains dan Matematika">Sains dan Matematika</option>
     <option value="Teknologi">Teknologi</option>
     <option value="Seni dan Rekreasi">Seni dan Rekreasi</option>
     <option value="Literatur dan Sastra">Literatur dan Sastra</option>
     <option value="Sejarah dan Geografi">Sejarah dan Geografi</option>
    </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <input type="submit" class="btn btn-primary" value="Simpan Data">
      </div>
    </div>
  </div>
</form>
</div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <form action="/edit/" method="post">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Edit Data Buku </h3>
      </div>

      <div class="modal-body">

            {{ csrf_field() }}
          <div class="form-group">
            <input type="hidden" name="id" id="id">
            <label for="recipient-name" class="form-control-label">Judul buku:</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="form-control-label">Pengarang :</label>
            <input type="text" class="form-control" id="pengarang" name="pengarang" required>
          </div>
           <div class="form-group">
            <label for="recipient-name" class="form-control-label">Penerbit :</label>
            <input type="text" class="form-control" id="penerbit" name="penerbit" required>
          </div>
           <div class="form-group">
                <label for="recipient-name" class="form-control-label">Jenis Buku:</label>
             <select class="form-control" id="jenisbuku" name="jenisbuku">
      <option value="Umum">Umum</option>
     <option value="Filsafat Dan Psikologi">Filsafat Dan Psikologi</option>
     <option value="Agama">Agama</option>
     <option value="Sosial">Sosial</option>
     <option value="Bahasa">Bahasa</option>
     <option value="Sains dan Matematika">Sains dan Matematika</option>
     <option value="Teknologi">Teknologi</option>
     <option value="Seni dan Rekreasi">Seni dan Rekreasi</option>
     <option value="Literatur dan Sastra">Literatur dan Sastra</option>
     <option value="Sejarah dan Geografi">Sejarah dan Geografi</option>
    </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <input type="submit" class="btn btn-primary" value="Edit Data">
      </div>
    </div>
  </div>
</form>
</div>

<div class="modal fade" id="peminjaman" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <form action="/peminjaman" method="post">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Peminjaman Buku</h3>
      </div>

      <div class="modal-body">

            {{ csrf_field() }}
          <div class="form-group">
            <input type="hidden" name="id" id="id">
            <label for="recipient-name" class="form-control-label">Judul buku:</label>
             <select class="form-control" id="buku" name="buku">
               @foreach ($bukucombobox as $bukucombobox)
                <option value="{{$bukucombobox->IdBuku}}">{{$bukucombobox->JudulBuku}}</option>                 
               @endforeach

             </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="form-control-label">Tanggal Pinjam :</label>
            <input type="date" class="form-control" id="tglpinjam" name="tglpinjam" value="{{ date('Y-m-d') }}" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <input type="submit" class="btn btn-primary" value="Simpan Peminjaman">
      </div>
    </div>
  </div>
</form>
</div>

<div class="modal fade" id="pengembalian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <form action="/pengembalian" method="post">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Pengembalian Buku</h3>
      </div>

      <div class="modal-body">

            {{ csrf_field() }}
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Judul buku:</label>
             <select class="form-control" id="buku" name="buku">
              @foreach ($penyewaan as $penyewaan)
                <option value="{{$penyewaan->IdPenyewaan}}">{{$penyewaan->JudulBuku}}</option>                 
               @endforeach
             </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="form-control-label">Tanggal Pinjam :</label>
            <input type="date" class="form-control" id="tglkembali" name="tglkembali" value="{{ date('Y-m-d') }}" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <input type="submit" class="btn btn-primary" value="Simpan Pengembalian">
      </div>
    </div>
  </div>
</form>
</div>
@endsection
