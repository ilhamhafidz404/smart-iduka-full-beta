<h1>UPLOAD skd</h1>

<form method="POST" action="{{route('skd.up',auth()->user()->id)}}" enctype="multipart/form-data">
	@csrf
	<input type="file" name="skd" value="{{$skd->skd}}">
	<button type="submit">Upload</button>
</form>

<hr>

@php $path = Storage::url('skd/'.$skd->skd); @endphp
                    <tr>
                      <td><img src="{{ url($path) }}" width="200px" height="100px"></td>
                      <td><a href="{{ url($path) }}">Download</a></td>
                    </tr>

                    {{$skd->skd}}
