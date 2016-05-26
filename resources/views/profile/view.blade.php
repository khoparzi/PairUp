@extends('layouts.master')

@section('content')
    @if($user)
    <h1 class="title">{{$user->username}}'s profile</h1>
    <div class="field">
        <div class="field-label">{{trans('forms.name')}}:</div>
        <div class="field-value">{{$user->profile->full_name()}}</div>
    </div>
    <div class="field">
        <div class="field-label">{{trans('forms.town')}}:</div>
        <div class="field-value">{{$user->profile->town}}</div>
    </div>
    <div class="field">
        <div class="field-label">{{trans('forms.country')}}:</div>
        <div class="field-value country">
            {{DB::table('countries')->where('id', $user->profile->country_id)->first()->full_name}}
        </div>
    </div>
    <div class="field">
        <div class="field-label">{{trans('forms.description')}}:</div>
        <div class="field-value">
            {{$user->profile->bio}}
        </div>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>{{trans('profile.show.skill_label')}}</th>
            <th>{{trans('profile.show.rating_label')}}</th>
            <th>{{trans('profile.show.offering_label')}}</th>
            <th>{{trans('profile.show.seeking_label')}}</th>
        </tr>
        </thead>

        @foreach($user->profile->tags as $tag)
            <tr>
                <td class="skill-name">{{$tag->name}}</td>
                <td class="rating">
                    @for($i = 0; $i < $tag->pivot->rating; $i++)
                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    @endfor
                    @for($i = 0; $i < (5 - $tag->pivot->rating); $i++)
                        <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                    @endfor
                </td>
                <td><input type="checkbox" {{$tag->pivot->is_offering ? 'checked':''}}></td>
                <td><input type="checkbox" {{$tag->pivot->is_seeking ? 'checked':''}}></td>
            </tr>
        @endforeach

    </table>

    <form method="POST" action="/profile/send-message" class="field">
        {!! csrf_field() !!}
        <div class="field-label">{{trans('forms.send_message_label')}}:</div>
        <div class="field-value">
            <textarea name="message" id="message" cols="30" rows="3" class="form-control"></textarea>
            <button class="btn btn-default" type="submit">{{trans('forms.send')}}</button>
        </div>
    </form>
    @else
        {{trans('profile.show.does_not_exist')}}
    @endif
@endsection