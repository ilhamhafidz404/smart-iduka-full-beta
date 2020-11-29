<h1>UPLOAD ktp</h1>

<form method="POST" action="{{route('ktp.up',auth()->user()->id)}}" enctype="multipart/form-data">
	@csrf
	<input type="file" name="ktp" value="{{$ktp->ktp}}">
	<button type="submit">Upload</button>
</form>

<hr>

@php $path = Storage::url('ktp/'.$ktp->ktp); @endphp
                    <tr>
                      <td><img src="{{ url($path) }}" width="200px" height="100px"></td>
                      <td><a href="{{ url($path) }}">Download</a></td>
                    </tr>

                    {{$ktp->ktp}}
