@extends('layouts.appbaru')

@section('content')
  <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Daftar Supplier </h4>
                                <hr>
                                <div class="table-responsive m-t-40">
                                    <table class="table stylish-table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Supplier</th>
                                                <th>Alamat</th>
                                                <th>No Telp</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>  <button type="button" class="btn btn-primary" 
                                            data-toggle="modal" data-target="#simpan">Tambah supplier</button>     
                                              @foreach ($supplier as $no =>$supplier)
                                            <tr>
                                                <td>{{++$no}}</td>
                                                <td>{{$supplier->NamaSupplier}}</td>
                                                <td>{{$supplier->AlamatSupplier}}</td>
                                                <td>{{$supplier->TelpSupplier}}</td>
                                                <td>
                                                <button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#edit"
data-id="{{$supplier->IdSupplier}}"data-nama="{{$supplier->NamaSupplier}}"
data-alamat="{{$supplier->AlamatSupplier}}"data-telp="{{$supplier->TelpSupplier}}">Edit</button>
<a href="/supplier/delete/{{$supplier->IdSupplier}}" onclick="return confirm('Apakah anda yakin ?')"><button type="button" class="btn btn-danger">Delete</button></td>
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
 <form action="/supplier/simpan" method="post">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Tambah Data supplier</h3>
      </div>

      <div class="modal-body">

            {{ csrf_field() }} 
         <div class="form-group">
            <label for="recipient-name" class="form-control-label">Nama Supplier:</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="form-control-label">Alamat Supplier :</label>
            <textarea class="form-control" id="alamat" name="alamat" required></textarea>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">No Telp Supplier :</label>
            <input type="number" class="form-control" id="telp" name="telp" required>
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
 <form action="supplier/edit/" method="post">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Edit Data supplier </h3>
      </div>

     <div class="modal-body">

            {{ csrf_field() }} 
            <input type="hidden" name="id" id="id">
             <div class="form-group">
            <label for="recipient-name" class="form-control-label">Nama Supplier:</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="form-control-label">Alamat Supplier :</label>
            <textarea class="form-control" id="alamat" name="alamat" required></textarea>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">No Telp Supplier :</label>
            <input type="number" class="form-control" id="telp" name="telp" required>
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

    var nama = button.data('nama')
    var alamat= button.data('alamat')
    var telp = button.data('telp')
    var id = button.data('id');
    var modal = $(this)

    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #nama').val(nama)
    modal.find('.modal-body #alamat').val(alamat)
    modal.find('.modal-body #telp').val(telp)
    })
     $('#simpan').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var modal = $(this)
    })
</script>    
@endsection