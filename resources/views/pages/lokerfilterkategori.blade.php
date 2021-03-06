

@extends('layouts.userlayout')

@section('title','Dashboard')

@section('content')

<!-- Main content -->
<section class="content">
<div class="container-fluid">
                @if($post->count() == 0)
                    <h1>LOWONGAN DENGAN KATEGORI {{$kategori->name}} KOSONG</h1>
                @endif

                <div class="row lowongan">
		<div class="col-xs-12 col-md-7">
                <form method="post" action="{{route('lokerfilterkategori')}}" class="row">
                    @csrf
                    <div class="col-md">
                        <div class="form-group input-group">
                            <select name="kategori" class="form-control bg-light custom-select" id="exampleFormControlSelect1" id="inputGroupSelect04" aria-label="Example select with button addon">
                                <option value="" holder>Semua kategori</option>
                                @foreach(kategori() as $ktgr)
                                <option value="{{$ktgr->id}}">{{$ktgr->name}}</option>
                                <option value="{{$ktgr->slug}}" class="d-none"></option>
                                @endforeach
                            </select>
                            
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit">Button</button>
                        </div>
                        </div>
                    </div>

                </form>
			@foreach($post as $post)
			<div class="panel bg-light p-3">
                <div class="panel-body">
                    <div class='position-title header-text'>
                        <a class="position-title-link" href="{{route('detail.lowongan-kerja',$post->slug)}}">
                        <h2>{{ $post->title }}</h2></a>
                        <h3 class="company-name">
                            <a class="company-name text-info" href="#"><span>{{$post->user->profileCompany->name}}</span></a>
                        </h3>
                    </div>
                    <div class="panel-feet">

                        <ul class="list-unstyled hidden-xs ">
                            <li class="text-dark deskripsi">{!! substr($post->deskripsi,0,300) !!}</li>
                        </ul>
                        
                        <ul class="list-unstyled">
                            <li class="badge badge-primary">
                                <i class="fa fa-map-marker-alt" aria-hidden="true">
                                </i><span >{{ $post->lokasi }}</span>
                            </li>
                            <li class="badge badge-warning"><i class="fa fa-graduation-cap" aria-hidden="true">
                                </i><span>{{ $post->kualifikasi }}</span>
                            </li>
                            <li class="badge badge-success">
                            <i class="fas fa-dollar-sign"></i>
                                </i><span>IDR {{ $post->min_gaji }} - {{ $post->max_gaji }}</span>
                            </li>
                        </ul>
                        <div>
                            <span class="job-date-text text-muted badge badge-danger text-white">{{ $post->created_at }}</span>
                        </div>

                        @if(simpanloker($post->id)->count() == 0)
                        <form method="POST" action="{{route('simpan.loker')}}">
                            @csrf
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                            <button class="tandai" type="submit" data-toggle="tooltip" data-placement="top" title="simpan lowongan" id="tooltip"><i class="far fa-bookmark text-info"></i></button>
                        </form>
                        @endif
                        @if(simpanloker($post->id)->count() > 0)
                        <a href="{{route('nonsimpan.loker',$post->id)}}"><i class="fas fa-bookmark tandai text-info"></i></a>
                        @endif
                    </div>
                </div>
            </div>
			@endforeach
		</div>
		<div class="col-xs-12 col-md-5 aside">
			<!-- <aside class="fixed bg-primary">
                <div class="aside-header">
                    <img src="{{asset('frontend/img/KKSI/logo-pertiwi.png')}}" alt="">
                    <h2>SMK PERTIWI KUNINGAN</h2>
                </div>
                <div class="kksi-logo">
                    <img src="{{asset('frontend/img/KKSI/Bendera Smart School remake.png')}}" alt="">
                    <img src="{{asset('frontend/img/KKSI/LOGO KKSI 5 BENDERA KECIL Remake.png')}}" alt="">
                </div>
            </aside> -->
            <aside class="fixed fixed-1 bg-primary">
                <h4>SMK PERTIWI KUNINGAN</h4>
                <p>Membangun aplikasi berbasis web yang bernama "Smart IDUKA" dalam Event Smart School KKSI</p>
                <img src="{{asset('frontend/img/KKSI/logo-pertiwi-removebg.png')}}" alt="">
            </aside>
            <aside class="fixed fixed-2 bg-warning">
                <h4>KAMP KREATIF SMK INDONESIA</h4>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. S?</p>
                <img src="{{asset('frontend/img/KKSI/Bendera Smart School remake.png')}}" alt="">
            </aside>
            <aside class="fixed fixed-3 bg-success">
                <h4>TIM KREATIF SMART IDUKA</h4>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. S?</p>
                <img src="{{asset('frontend/img/KKSI/LOGO KKSI 5 BENDERA KECIL Remake.png')}}" alt="">
            </aside>
		</div> 
	</div>

</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection



