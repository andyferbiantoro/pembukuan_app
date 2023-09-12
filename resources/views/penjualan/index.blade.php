@extends('layouts.app')

@section('title')
PENJUALAN JAMUR
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
            <h5 class="card-title fw-semibold">DATA PENJUALAN JAMUR</h5>
          </div>
          <div>
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Tambah Hasil Penjualan
            </button>
          </div>
        </div>
        <div class="table-responsive">
          <table id="dataTable" class="table table-striped" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal panen</th>
                <th>Tanggal Penjualan</th>
                <th>Berat panen</th>
                <th>Nominal</th>
                <th>Aksi</th>
              
                
              </tr>
            </thead>
            <tbody>
              @php $no=1 @endphp
              @foreach($penjualan as $data)
              <tr>
                <td>{{$no++}}</td>
                <td>{{date("j F Y", strtotime($data->tanggal_panen))}}</td>
                <td>{{date("j F Y", strtotime($data->tanggal))}}</td>
                <td>{{$data->berat_panen}} Ons</td>
                <td>Rp. <?=number_format($data->nominal, 0, ".", ".")?>,00</td>
                <td>
                 <a href="#" data-toggle="modal" onclick="deleteData({{$data->id}})" >
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteModalss">
                    Hapus
                  </button>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
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

        <form method="post" action="{{route('penjualan_add')}}" enctype="multipart/form-data">

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
            <label class="col-form-label">Pilih Panen</label>
            <select  name="id_panen" class="form-control"  required="">
             <option selected disabled> -- Pilih Panen -- </option>
             @foreach($data_panen as $data)
             <option value="{{$data->id}}">Panen tanggal - {{date("j F Y", strtotime($data->tanggal_panen))}} - berat {{$data->berat_panen}} Ons</option>
             @endforeach
           </select>
           <span class="form-bar"></span>
         </div>

         <div class="mb-3">
          <label for="nominal" class="col-form-label">Nominal Penjualan</label>
          <input type="number" class="form-control" id="nominal" name="nominal"  required="">
        </div>

        <div class="mb-3">
          <label for="tanggal" class="col-form-label">Tanggal Penjualan</label>
          <input type="date" class="form-control" id="tanggal" name="tanggal"  required="">
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





<!-- Modal -->
<div class="modal fade" id="DeleteModalss" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Penjualan ?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" id="deleteForm" method="post">
          <div class="modal-content">

            <div class="modal-body">
              {{ csrf_field() }}
              {{ method_field('POST') }}
              <p>Apakah anda yakin ingin menghapus data penjualan ini ?</p> <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Batal</button>
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
    var url = '{{route("penjualan_delete", ":id") }}';
    url = url.replace(':id', id);
    $("#deleteForm").attr('action', url);
  }
  function formSubmit() {
    $("#deleteForm").submit();
  }
</script>





@endsection


