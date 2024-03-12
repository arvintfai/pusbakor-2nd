<!-- /.row -->
<div class="row">
  <div class="col" style="width: auto;">
    <div class="card">
      <div class="card-header">
        <h1 class="card-title">Tabel Data {{$header}}</h1>
        <div class="card-tools">
          <div class="col">
            <div class="row mb-2"><a href="{{route( $rute.'.create')}}" class="btn btn-xs bg-success" style="width: 150px;"><i class="fa fa-plus mr-1"></i>Create New</a></div>
            <div class="row mb-2">
              <div class="input-group input-group-sm" style="width: 150px;">
                <!-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: auto;">
        <table class="table table-head-fixed grid-table text-wrap" id="data-table">
          <thead>
            <tr>
              <th scope="col" style="text-align: center;">Nomor</th>
              @foreach($table_header as $th) <!-- untuk memecah variabel $table_header -->
              @if(Str::contains($th->Field, 'id') || Str::contains($th->Field, 'created') || Str::contains($th->Field, 'updated') || Str::contains($th->Field, 'password') || Str::contains($th->Field, 'verified') || Str::contains($th->Field, 'token')) <!-- untuk membatasi tampilan header kolom -->
              @if($th->Field!='id'&&Str::contains($th->Field, '_id')) <!-- ambil header kolom tidak ada kata 'id' dan terdapat kata '_id' -->
              @php
              $filt = str_replace('_id', '',$th->Field);
              $value = str_replace('_', ' ',$filt)
              @endphp
              <th scope="col" style="text-align: center;">{{ucwords($value)}}</th>
              @endif
              @else
              <th scope="col" style="text-align: center;">{{ucwords($th->Field)}}</th>
              @endif
              @endforeach
              <th scope="col" style="text-align: center;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @yield('table-content')
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
<div id="pagination">
    {{$table_data->links('pagination::bootstrap-5')}}
</div>
<!-- /.row -->

<!-- modal -->
<div class="modal fade" id="modal-danger">
  <div class="modal-dialog">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title text-dark">Danger Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-dark">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-outline-light">Confirm</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
  function konfirmasiPindahHalaman(route) {
    var konfirmasi = confirm("Apakah Anda yakin ingin menghapus data tertunjuk?");

    if (konfirmasi) {
      window.location.href = route;
    } else {
      // Pengguna menekan "Batal", tidak ada tindakan khusus yang diambil
    }
  }
</script>
<!-- <script>
  function submitForm() {
            document.getElementById('perPageForm').submit();
  }

  $(document).ready(function () {
            $(document).on('click', '#pagination a', function (e) {
                e.preventDefault();
                var url = $(this).attr('href');
                getData(url);
            });

            function getData(url) {
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'html',
                    success: function (data) {
                        var table = $('#data-table');
                        table.find('tbody').html($(data).find('tbody').html());
                        $('#pagination').html($(data).find('#pagination').html());
                    }
                });
            }
        });
</script> -->