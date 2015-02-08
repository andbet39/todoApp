@extends('app')
@section('content')

<h1>Pictures list</h1>
 
 <div class="row">
        <ul class="thumbnails">
 @foreach($pictures as $picture)
            <div class="col-md-2">
                <div class="thumbnail">
                    <img src="{{route('picture', $picture->filename)}}" alt="ALT NAME" class="img-responsive" />
                    <div class="caption">
                        <p>{{$picture->original_filename}}</p>
                    </div>
                </div>
            </div>
 @endforeach
 </ul>
 </div>

@endsection