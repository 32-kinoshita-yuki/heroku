@extends('layouts.profile')
@section('title', 'プロフィール')
@section('content')
    <div class="container">
        <div class="row">
            <h2>Profile</h2>
        </div>
        <div class="row">
        </div>
        <div class="row">
            <div class="list-profile col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="10%">名前</th>
                                <th width="10%">性別</th>
                                <th width="30%">趣味</th>
                                <th width="30%">自己紹介</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $profile)
                                <tr>
                                    <th>{{ $profile->id }}</th>
                                    <td>{{ \Str::limit($profile->name, 10) }}</td>
                                    <td>{{ \Str::limit($profile->gender, 10) }}</td>
                                    <td>{{ \Str::limit($profile->hobby, 50) }}</td>
                                    <td>{{ \Str::limit($profile->introduction, 50) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection



