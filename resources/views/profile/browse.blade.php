@extends('layouts.master')

@section('content')
    <div class="title">Browse profiles</div>

    <div class="page_strap">{{trans('profile.browse.page_strap', ['count'=>$profiles->total()])}} in {{$profiles->lastPage()}} pages</div>

	@if ($profiles->count())

    @foreach ($profiles as $profile)
	<div class="profile_card">
		<b>{{$profile->full_name()}}</b>
	</div>
    @endforeach

    {!! with(new \App\Pagination($profiles))->render() !!}

    @else

    {{trans('profile.browse.no_users')}}

    @endif
@endsection
