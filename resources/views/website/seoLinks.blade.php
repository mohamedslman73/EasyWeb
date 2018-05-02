@extends("website.layout")
@section('content')
<div class="container">
  <div class="row">
    @foreach($schools as $school)
      <div class="col-sm-4">
        <a href="{{ route('schoolProfile', ['lang'=>App::getLocale(), 'slug'=>$school->slug_en]) }}" target="_blank">{{$school->name_en}}</a>
      </div>
    @endforeach
    @foreach($links as $link)
      <div class="col-sm-4">
        <a href="/classification/{{$link->url}}" target="_blank">{{$link->title}}</a>
      </div>
    @endforeach
  </div>
</div>
@endsection
