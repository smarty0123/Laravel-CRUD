@extends('master')
@section('title', 'เพิ่มผู้ใช้')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12"><br />
            <h3>เพิ่มข้อมูลผู้ใช้เข้าสู่ระบบ</h3><br />
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
            <form method="post" action="{{url('user')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" name="fname" class="form-control" placeholder="ป้อนชื่อจริง" />
                </div>
                <div class="form-group">
                    <input type="text" name="lname" class="form-control" placeholder="ป้อนนามสกุล" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="บันทึก">
                    <a href="{{route('user.index')}}" class="btn btn-primary">กลับสู่หน้าหลัก</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection