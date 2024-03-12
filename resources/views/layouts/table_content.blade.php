@foreach($table_data as $td)
            <tr>
              @foreach($table_header as $th)
              @php
              $value=$th->Field
              @endphp
              @if(Str::contains($value, '_id'))
              @php
              $value=str_replace('_id','',$value);
              $field=strtolower($value);
              @endphp
              @if($td->$value!=null)
              @if($td->$value->$field!=null)
              <td>{{$td->$value->$field}}</td>
              @else
              <td>{{$td->$value->nama}}</td>
              @endif
              @else
              @php
              $value=str_replace('_','',$value);
              $field=strtolower($value);
              @endphp
              @if($td->$value->$field!=null)
              <td>{{$td->$value->$field}}</td>
              @else
              @php
              $value=str_replace('_','',$value);
              $field=strtolower($value);
              @endphp
              @if($td->$value->skala_usaha!=null)
              <td>{{$td->$value->skala_usaha}}</td>
              @elseif($td->$value->jenis_perusahaan!=null)
              <td>{{$td->$value->jenis_perusahaan}}</td>
              @endif
              @endif
              @endif
              @elseif(Str::contains($value, 'created') || Str::contains($value, 'updated') || Str::contains($value, 'verified') || Str::contains($value, 'password') || Str::contains($value, 'token'))
              @else
              <td>{{$td->$value}}</td>
              @endif
              @endforeach
              <td style="text-align: center;">
                @php
                $rute=strtolower(str_replace(' ','',$header));
                @endphp
                @if($rute=='user')
                <a class="btn btn-app bg-danger" onclick="konfirmasiPindahHalaman('{{route( $rute.'.delete', ['id'=>$td->id])}}')"><i class=" fa fa-trash "></i>Delete</a>
                @else
                <a href="{{route( $rute.'.edit', ['id'=>$td->id])}}" class="btn btn-app bg-primary"><i class="fa fa-edit"></i>Edit</a>
                <a class="btn btn-app bg-danger" onclick="konfirmasiPindahHalaman('{{route( $rute.'.delete', ['id'=>$td->id])}}')"><i class=" fa fa-trash "></i>Delete</a>
                @endif
              </td>
            </tr>
            @endforeach