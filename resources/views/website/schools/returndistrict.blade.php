
@if(Route::current()->getName() != 'userprofile')
<option value="-1">All Districts</option>
@endif
@foreach($districts as $district)
<option value="{{$district['slug_'.app()->getLocale()]}}">{{$district['name_'.app()->getLocale()]}}</option>
@endforeach