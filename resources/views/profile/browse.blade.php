@extends('layouts.master')

@section('content')
    <h1 class="title">Browse profiles</h1>

    <div class="jumbotron">{{trans('profile.browse.page_strap', ['count'=>$profiles->total()])}} in {{$profiles->lastPage()}} pages</div>

	@if ($profiles->count())

    @foreach ($profiles as $profile)
	<div class="profile_card">
		<div class="panel-heading">
            <a href="{{route('profile.view', ['id'=>$profile->user_id])}}">{{$profile->full_name()}}</a>
        </div>
        <div class="body">
            <img src="http://placekitten.com/160/160" >
        </div>
	</div>
    @endforeach

    {!! with(new \App\Pagination($profiles))->render() !!}

    @else

    {{trans('profile.browse.no_users')}}

    @endif
@endsection
