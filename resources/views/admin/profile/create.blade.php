    @extends('layouts.profile')

@section('title', 'My プロフィール')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>My プロフィール</h2>
                <!--課題4 formの送信先をAdmin\ProfileController@createに指定-->
                <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <!--課題4 氏名、性別、趣味、自己紹介欄の作成、課題6 バリデーションの設定-->
                    <div class="form-group row">
                        <label class="col-md-2" for="name">氏名</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="name">{{ old('name') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="gender">性別</label>
                        <div class="col-md-10">
                            @if  (old('gender')  == 'male') 
                              <input type="radio" class="radio" name="gender" value="male" checked="checked">男性
                              <input type="radio" class="radio" name="gender" value="female">女性
                            @elseif (old('gender')  == 'female')
                              <input type="radio" class="radio" name="gender" value="male">男性
                              <input type="radio" class="radio" name="gender" value="female" checked="checked">女性
                            @else
                              <input type="radio" class="radio" name="gender" value="male">男性
                              <input type="radio" class="radio" name="gender" value="female">女性
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="hobby">趣味</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="hobby">{{ old('hobby') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="introduction">自己紹介欄</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="20">{{ old('introduction') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection