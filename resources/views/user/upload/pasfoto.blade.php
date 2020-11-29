<h1>UPLOAD pasfoto</h1>

<form method="POST" action="{{route('pasfoto.up',auth()->user()->id)}}" enctype="multipart/form-data">
	@csrf
	<input type="file" name="pasfoto" value="{{$pasfoto->pasfoto}}">
	<button type="submit">Upload</button>
</form>

<hr>

@php $path = Storage::url('pasfoto/'.$pasfoto->pasfoto); @endphp
                    <tr>
                      <td><img src="{{ url($path) }}" width="200px" height="100px"></td>
                      <td><a href="{{ url($path) }}">Download</a></td>
                    </tr>

                    {{$pasfoto->pasfoto}}
