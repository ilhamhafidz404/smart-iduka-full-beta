<h1>UPLOAD CV</h1>

<form method="POST" action="{{route('cv.up',auth()->user()->id)}}" enctype="multipart/form-data">
	@csrf
	<input type="file" name="cv" value="{{$cv->cv}}">
	<button type="submit">Upload</button>
</form>

<hr>

@php $path = Storage::url('cv/'.$cv->cv); @endphp
                    <tr>
                      <td><img src="{{ url($path) }}" width="200px" height="100px"></td>
                      <td><a href="{{ url($path) }}">Download</a></td>
                    </tr>