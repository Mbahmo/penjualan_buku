@extends('layouts.appbaru')

@section('content')
  <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Transaksi </h4>
                                <hr>
                                <div class="table-responsive m-t-40">
                                    <table class="table stylish-table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Buku</th>
                                                <th>Jumlah</th>
                                                <th>Total</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody> @if ($cek==0)
                                          <tr>
                                            <td colspan="5">Belum Ada Transaksi</td>
                                          </tr>
                                          @else
                                       
                                         <?php $total=0; ?>     
                                              @foreach ($transaksi as $no =>$transaksi)
                                            <tr>
                                                <td>{{++$no}}</td>
                                                <td>{{$transaksi->JudulBuku}}</td>
                                                <td>{{$transaksi->Jumlah}}</td>
                                                <td>{{"Rp.".number_format($transaksi->TotalBayar, 2, ",", ".")}}</td>
                                              <td>
<a href="/transaksi/delete/{{$transaksi->IdTransaksi}}" onclick="return confirm('Apakah anda yakin ?')"><button type="button" class="btn btn-danger">Delete</button></td>
                                            </tr>
                                            <?php $total=$total+$transaksi->TotalBayar?>    
                                            @endforeach
                                          <tr>
                                            <td colspan="4">Total Bayar :</td>
                                            <td>{{"Rp.".number_format($total, 2, ",", ".")}}</td>
                                          </tr>
                                          @endif
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                        <button type="button" class="btn btn-primary" 
                         data-toggle="modal" data-target="#simpan">Tambah Penjualan</button>
                        
                          @if ($cek>0)      
                          <a href="transaksi/checkout">      
                         <button type="button" class="btn btn-primary">Checkout</button></a>
                          @endif
                        </div>
                        
                    </div>
                </div>

                
<div class="modal fade" id="simpan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <form action="/transaksi/simpan" method="post">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Tambah Data Penjualan</h3>
      </div>

      <div class="modal-body">

            {{ csrf_field() }} 
         <div class="form-group">
            <label for="recipient-name" class="form-control-label">Buku</label>  
             <select class="form-control" id="buku" name="buku">
              @foreach ($buku as $buku)
                <option value="{{$buku->NoISBN}}">{{$buku->JudulBuku}} - {{"Rp.".number_format($buku->Harga, 2, ",", ".")}}</option>                 
               @endforeach
             </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="form-control-label">Jumlah :</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
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
 
</div>
@endsection

@section('ajax')
    <script>
     $('#simpan').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var modal = $(this)
    })
</script>    
@endsection