@extends('layouts.admin')

@section('title', 'Myプロフィール')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <h2>Myプロフィール</h2>
                <form action="{{ route('admin.profile.create') }}" method="post" enctype="multipar/form-data">
                    
                    @if (count($errors) > 0 )
                         <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                     @endif
                     <div class="form-group row">
                         <label class="col-md-2">氏名</label>
                         <div class="clo-md-10">
                             <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                         </div>
                     </div>
                     <div class="form-group row">
                         <label>性別</label>
                         <br>
                        <div class="col-md-10">
                            <input type="radio" name="gender" value="男性">男性
                        </div>
                        
                            <div class="coi-md-10">
                            <input type="radio" name="gender" value="女性">女性
                            </div>
                            
                        <div class="form-group row">
                            <label class="col-md-2">趣味</label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="hobby" row="10" cols="10">{{ old('hobby') }}</textarea>
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label class="col-md-2">自己紹介</label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="introduction" row="20" cols="20">{{ old('introduction') }}</textarea>
                            </div>
                        </div>
                     </div>
                     @csrf
                     <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection