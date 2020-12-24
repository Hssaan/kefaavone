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
                                    @php 
                                    if(!$user->uuid){
                                        $user->uuid = \DB::raw('UUID()');
                                        $user->save();

                                        $user->refresh();
                                    }
                                    @endphp

                                    @if(auth()->user()->id != $user->id)
                                    <form class="actionButton" action="{{ route('user.delete',$user->uuid) }}" method="POST" style="display: inline-block ">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger">حذف</button>
                                    </form>

                                    <a href="{{ route('user.edit',$user->uuid) }}" class="btn btn-warning" style="display: inline-block ">تعديل</a>
                                    @endif
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