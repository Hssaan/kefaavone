@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">قائمة المستخدمين <a href="{{ route('user.create') }}" class="btn btn-primary" >اضافة مستخدم جديد</a></div>


                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>اسم المستخدم  </th>
                                <th> البريد الالكتروني </th>
                                <th> نوع المستخدم </th>
                                <th> # </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>@if($user->isadmin) مدير @else عميل @endif</td>
                                <td>
                                    @if(auth()->user()->id != $user->id)
                                    <form action="{{ route('user.delete',$user->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger">حذف</button>
                                    </form>
                                    @endif
                                    <a href="{{ route('user.edit',$user->id) }}" type="button" class="btn btn-warning">تعديل</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        <div>
    <div>
</div>

@endsection