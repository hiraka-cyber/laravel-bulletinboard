@extends('layout.app')

@section('title', 'BulletinBoard')
@section('keywords', 'キーワード1,キーワード2,キーワード3')
@section('description', '投稿一覧ページの説明文')

@section('content')
<div class="table-responsive">

@if (session('poststatus'))
    <div class="alert alert-success mt-4 mb-4">
        {{ session('poststatus') }}
    </div>
@endif
    <table class="table table-hover">
        <thead>
        <tr>
            <th>created_at</th>
            <th>Name</th>
            <th>Subject</th>
            <th>Message</th>
            <th></th>
        </tr>
        </thead>
        <tbody id="tbl">
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->created_at->format('Y.m.d') }}</td>
                <td>{{ $post->name }}</td>
                <td>{{ $post->subject }}</td>
                <td>{!! nl2br(e(Str::limit($post->message, 100))) !!}
                @if ($post->comments->count() >= 1)
                    <p><span class="badge badge-primary">Comment：{{ $post->comments->count() }}件</span></p>
                @endif
                </td>
                <td class="text-nowrap">

                <p><a href="{{ action('App\Http\Controllers\PostsController@show', $post->id) }}" class="btn btn-primary btn-sm">Details</a></p>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
