<h1>UPLOAD skck</h1>

<form method="POST" action="{{route('skck.up',auth()->user()->id)}}" enctype="multipart/form-data">
	@csrf
	<input type="file" name="skck" value="{{$skck->skck}}">
	<button type="submit">Upload</button>
</form>

<hr>

@php $path = Storage::url('skck/'.$skck->skck); @endphp
                    <tr>
                      <td><img src="{{ url($path) }}" width="200px" height="100px"></td>
                      <td><a href="{{ url($path) }}">Download</a></td>
                    </tr>

                    {{$skck->skck}}
