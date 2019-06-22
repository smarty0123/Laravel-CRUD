@extends('master')
@section('title', 'เพิ่มผู้ใช้')
@section('content')
<div class="container"><br />
    <h3>ระบบบันทึกรายชื่อ ❤Powered by Laravel</h3>
    <div class="row">
        <div class="col-md-12"><br /><br />
            <div align="right">
                <a href="{{route('user.create')}}" class="btn btn-success">เพิ่มข้อมูล</a>
            </div><br />
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
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                @foreach($users as $row) <tr>
                    <td>{{$row['id']}}</td>
                    <td>{{$row['fname']}}</td>
                    <td> {{$row['lname']}}</td>
                    <td><a href="{{action('UserController@edit', $row['id'])}}" class="btn btn-warning">Edit</a></td>
                    <td>
                        <form method="post" class="delete_form" action="{{action('UserController@destroy', $row['id'])}}">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE" />
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.delete_form').on('submit', function() {
            if (confirm("คุณต้องการลบข้อมูลหรือไม่ ?")) {
                return true;
            } else {
                return false;
            }
        });
    });
</script>
@endsection