<!-- general form elements -->
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{ucwords($rute)}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action={{route($rute.'.store')}} method="POST">
              @method('POST')
              @csrf
                <div class="card-body">
                    @foreach($kolom as $kol)
                        @if(Str::contains($kol->Field, 'id') || Str::contains($kol->Field, 'created') || Str::contains($kol->Field, 'updated') || Str::contains($kol->Field, 'password')) <!-- untuk membatasi tampilan header kolom -->
                            @if(Str::contains($kol->Field, '_id'))
                                @php
                                  $for=str_replace('_id','',$kol->Field);
                                  $label=ucwords(str_replace('_',' ',$for))
                                @endphp
                                @if(isset($select))
                                  <div class="form-group">
                                    <label for="{{$kol->Field}}" class="required">{{$label}}</label>
                                    <select name="{{$kol->Field}}" class="form-control" aria-label="Default select example" required>
                                    @foreach($select[$for] as $p)
                                        <option value={{ $p['id'] }}>
                                          @if($p[$for]!=null)
                                          {{$p[$for]}}
                                          @elseif($p[$for]==null)
                                          {{ $p['nama'] }}
                                          @endif
                                        </option>
                                    @endforeach
                                    </select>
                                  </div>
                                @endif
                            @endif
                        @elseif(Str::contains($kol->Field, 'latitude') || Str::contains($kol->Field, 'longitude'))
                          @php
                              $label=ucwords(str_replace('_',' ',$kol->Field))
                          @endphp
                            <div class="form-group">
                              <label for="{{$kol->Field}}">{{$label}}</label>
                              <input class="form-control" id="{{$kol->Field}}" name="{{$kol->Field}}">
                            </div>
                        @else
                          @php
                              $label=ucwords(str_replace('_',' ',$kol->Field))
                          @endphp
                            <div class="form-group">
                              <label for="{{$kol->Field}}" class="required">{{$label}}</label>
                              <input class="form-control" id="{{$kol->Field}}" name="{{$kol->Field}}" required>
                            </div>
                        @endif
                    @endforeach
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
<style>
.required::after {
  content: " *";
  color: red;
  font-size: 15px;
  }
</style>
<!-- /.card -->