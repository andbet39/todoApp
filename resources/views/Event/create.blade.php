@extends('app')
@section('content')



        <form action="addPicture" method="post" enctype="multipart/form-data">
            <input type="text" name="title" />
            <input type="file" name="filefield">
            <input type="submit">
        </form>


@endsection