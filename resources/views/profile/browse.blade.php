@extends('layouts.master')

@section('content')
    <h1 class="title">Browse profiles</h1>

    <div class="jumbotron">{{trans('profile.browse.page_strap', ['count'=>$profiles->total()])}} in {{$profiles->lastPage()}} pages</div>

	@if ($profiles->count())

    @foreach ($profiles as $profile)
	<div class="profile_card">
		<div class="panel-heading">
            <img src="http://placekitten.com/50/50" >
            <a href="{{route('profile.view', ['username'=>$profile->user->username])}}">{{$profile->user->username}}</a>
        </div>
        <div class="body">
            @foreach($profile->tags as $tag)
                <div class="skill-row">
                    <div class="skill-name">{{$tag->name}}</div>
                    <div class="skill-stars">
                        @for($i = 0; $i < $tag->pivot->rating; $i++)
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        @endfor
                        @for($i = 0; $i < (5 - $tag->pivot->rating); $i++)
                            <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                        @endfor
                    </div>
                </div>
            @endforeach
        </div>
	</div>
    @endforeach

    {!! with(new \App\Pagination($profiles))->render() !!}

    @else

    {{trans('profile.browse.no_users')}}

    @endif
@endsection
