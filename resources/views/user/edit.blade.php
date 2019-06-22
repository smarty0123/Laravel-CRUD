@extends('master')
@section('title', 'แก้ไขข้อมูล')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12"><br />
            <h3>แก้ไขข้อมูล</h3><br />
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(\Session::has('success'))
            <div class="alert alert-success">
                <p>{{\Session::get('success')}}</p>
            </div>
            @endif
            <form method="post" action="{{action('UserController@update', $id)}}">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" name="fname" class="form-control" placeholder="ป้อนชื่อจริง" value="{{$user->fname}}"/>
                </div>
                <div class="form-group">
                    <input type="text" name="lname" class="form-control" placeholder="ป้อนนามสกุล" value="{{$user->lname}}"/>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="อัพเดท">
                    <a href="{{route('user.index')}}" class="btn btn-primary">กลับสู่หน้าหลัก</a>
                </div>
                <input type="hidden" name="_method" value="PATCH" />
            </form>
        </div>
    </div>
</div>

@endsection