@extends('layouts.appbaru')

@section('content')
  <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Daftar Buku </h4>
                                <hr>
                                <div class="table-responsive m-t-40">
                                    <table class="table stylish-table">
                                        <thead>
                                            <tr>
                                                <th>No ISBN</th>
                                                <th>Judul</th>
                                                <th>Penulis</th>
                                                <th>Penerbit</th>
                                                <th>Harga</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>  <button type="button" class="btn btn-primary" 
                                            data-toggle="modal" data-target="#simpan">Tambah Buku</button>     
                                              @foreach ($buku as $buku)
                                            <tr>
                                                <td>{{$buku->NoISBN}}</td>
                                                <td>{{$buku->JudulBuku}}</td>
                                                <td>{{$buku->Penulis}}</td>
                                                <td>{{$buku->Penerbit}}</td>
                                                <td>{{"Rp.".number_format($buku->Harga, 2, ",", ".")}}</td>
                                                <td>
                                                <button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#edit"
data-isbn="{{$buku->NoISBN}}"data-judul="{{$buku->JudulBuku}}"
data-penulis="{{$buku->Penulis}}"data-penerbit="{{$buku->Penerbit}}"data-harga="{{$buku->Harga}}">Edit</button>
<a href="/buku/delete/{{$buku->NoISBN}}" onclick="return confirm('Apakah anda yakin ?')"><button type="button" class="btn btn-danger">Delete</button></td>
                                            </tr>    
                                            @endforeach
                                          
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
<div class="modal fade" id="simpan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <form action="/buku/simpan" method="post">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Tambah Data Buku</h3>
      </div>

      <div class="modal-body">

            {{ csrf_field() }} 
             <div class="form-group">
            <label for="recipient-name" class="form-control-label">No ISBN :</label>
            <input type="text" class="form-control" id="noisbn" name="noisbn" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Judul buku:</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="form-control-label">Penulis :</label>
            <input type="text" class="form-control" id="penulis" name="penulis" required>
          </div>
           <div class="form-group">
            <label for="recipient-name" class="form-control-label">Penerbit :</label>
            <input type="text" class="form-control" id="penerbit" name="penerbit" required>
          </div><div class="form-group">
            <label for="recipient-name" class="form-control-label">Harga :</label>
            <input type="number" class="form-control" id="harga" name="harga" required>
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
 <form action="buku/edit/" method="post">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Edit Data Buku </h3>
      </div>

     <div class="modal-body">

            {{ csrf_field() }} 
             <div class="form-group">
            <label for="recipient-name" class="form-control-label">No ISBN :</label>
            <input type="text" class="form-control" id="noisbn" name="noisbn" readonly>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Judul buku:</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="form-control-label">Penulis :</label>
            <input type="text" class="form-control" id="penulis" name="penulis" required>
          </div>
           <div class="form-group">
            <label for="recipient-name" class="form-control-label">Penerbit :</label>
            <input type="text" class="form-control" id="penerbit" name="penerbit" required>
          </div><div class="form-group">
            <label for="recipient-name" class="form-control-label">Harga :</label>
            <input type="number" class="form-control" id="harga" name="harga" required>
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <input type="submit" class="btn btn-primary" value="Edit Data">
      </div>
    </div>
  </div>
</form>
</div>
 
</div>
@endsection
@section('ajax')

    <script>
     $('#edit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 

    var judul = button.data('judul')
    var penulis= button.data('penulis')
    var penerbit = button.data('penerbit')
    var harga = button.data('harga')
    var isbn = button.data('isbn');
    var modal = $(this)

    modal.find('.modal-body #noisbn').val(isbn)
    modal.find('.modal-body #judul').val(judul)
    modal.find('.modal-body #penulis').val(penulis)
    modal.find('.modal-body #penerbit').val(penerbit)
    modal.find('.modal-body #harga').val(harga)
    })
     $('#simpan').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var modal = $(this)
    })
</script>    
@endsection