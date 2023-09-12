@extends('layouts.app')

@section('title')
LAPORAN
@endsection


@section('content')

<div class="row">
  <div class="col-lg-12 d-flex align-items-strech">
    <div class="card w-100">
      <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
        @endif
        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
          <div class="mb-3 mb-sm-0">
            <h5 class="card-title fw-semibold">DATA LAPORAN</h5>
          </div>

          <div>
           
          </div>
        </div>
        <br>
        <div class="col-12">
          <form action="{{route('laporan_index')}}" method="GET">
            <div class="row">
              <div class="col-lg-2">
                <div class="form-row">
                  <label>Dari Tanggal</label>
                  <input type="date" class="form-control" name="from" placeholder="Cari tanggal .." value="{{ old('from') }}">
                </div>
              </div>

              <div class="col-lg-2">
               <div class="form-row">
                <label>Sampai Tanggal</label>
                <input type="date" class="form-control" name="to" placeholder="Cari tanggal .." value="{{ old('to') }}">
              </div>
            </div><br><br>

            <div class="col-lg-2">
              <div class="form-row">

                <input type="submit" class="btn btn-primary" value="Filter  Tanggal">
              </div>
            </div>
          </div> 
        </form><br>

      </div><br><br><br>
      <div id="printPDF">
        @if($from == null && $to == null)
        <div class="row">
          <div class="col-lg-12"><p style="color: red" class="text-center">Tanggal Tidak Difilter</p></div>
        </div><br>
        @endif
        @if($from != null && $to != null)
        <div class="row">
          <div class="col-lg-2"></div>
          <div class="col-lg-4">Mulai tanggal : {{date("j F Y", strtotime($from))}}</div>
          <div class="col-lg-4">Sampai tanggal : {{date("j F Y", strtotime($to))}}</div>
          <div class="col-lg-2"></div>
        </div><br><br>
        @endif
        <div class="table-responsive">
          <table id="dataTable" class="table table-striped" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal panen</th>
                <th>Tanggal Penjualan</th>
                <th>Berat panen</th>
                <th>Nominal</th>



              </tr>
            </thead>
            <tbody>
              @php $no=1 @endphp
              @foreach($laporan as $data)
              <tr>
                <td>{{$no++}}</td>
                <td>{{date("j F Y", strtotime($data->tanggal_panen))}}</td>
                <td>{{date("j F Y", strtotime($data->tanggal))}}</td>
                <td>{{$data->berat_panen}} Ons</td>
                <td>Rp. <?=number_format($data->nominal, 0, ".", ".")?>,00</td>

              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <br><br>
        <div class="table-responsive">
          <table class="table table-hover">
            <tr>
              <th>Total Hasil Penjualan</th>
              <th>:</th>
              <td>Rp. <?=number_format($total_nominal, 0, ".", ".")?>,00</td>
            </tr> 

            <tr>
              <th>Total Berat Panen</th>
              <th>:</th>
              <td>{{$total_berat}} Ons</td>
            </tr> 

            
          </table>
        </div>
      </div>
    </div>
  </div>

</div>






<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">TAMBAH HASIL PANEN</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post" action="{{route('panen_add')}}" enctype="multipart/form-data">

          {{csrf_field()}}


          <!-- <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama"  required=""></input>
          </div> -->

          <!-- <div class="mb-3">
            <label for="hari_panen" class="col-form-label">Hari Panen</label>
            <input type="text" class="form-control" id="hari_panen" name="hari_panen"  required="">
          </div> -->

          <div class="form-group form-success">
            <label class="col-form-label">Hari Panen</label>
            <select  name="hari_panen" class="form-control"  required="">
             <option selected disabled> -- Pilih Hari Panen -- </option>
             <option value="Senin">Senin</option>
             <option value="Selasa">Selasa</option>
             <option value="Rabu">Rabu</option>
             <option value="Kamis">Kamis</option>
             <option value="Jumat">Jumat</option>
             <option value="Sabtu">Sabtu</option>
             <option value="Minggu">Minggu</option>
           </select>
           <span class="form-bar"></span>
         </div>

         <div class="mb-3">
          <label for="tanggal_panen" class="col-form-label">Tanggal Panen</label>
          <input type="date" class="form-control" id="tanggal_panen" name="tanggal_panen"  required="">
        </div>

        <div class="mb-3">
          <label for="jam_panen" class="col-form-label">Jam Panen</label>
          <input type="time" class="form-control" id="jam_panen" name="jam_panen"  required="">
        </div>

        <div class="mb-3">
          <label for="berat_panen" class="col-form-label">Berat Panen (Ons)</label>
          <input type="number" class="form-control" id="berat_panen" name="berat_panen"  required="">
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button class="btn btn-primary" type="Submit">Tambahkan</button>

      </div>
    </form>


  </div>

</div>
</div>
</div>




<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="DeleteModalss" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Panen ?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" id="deleteForm" method="post">
          <div class="modal-content">

            <div class="modal-body">
              {{ csrf_field() }}
              {{ method_field('POST') }}
              <p>Apakah anda yakin ingin menghapus data Panen ini ?</p> <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Batal</button>
              <button type="submit" name="" class="btn btn-danger float-right mr-2" data-dismiss="modal" onclick="formSubmit()">Hapus</button>
            </div>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>





@endsection



@section('scripts')
<script type="text/javascript">
  function deleteData(id) {
    var id = id;
    var url = '{{route("panen_delete", ":id") }}';
    url = url.replace(':id', id);
    $("#deleteForm").attr('action', url);
  }
  function formSubmit() {
    $("#deleteForm").submit();
  }
</script>





@endsection


