@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">قائمة العضويات <a href="{{ route('member.create') }}" class="btn btn-primary" >اضافة عضوية جديدة</a></div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>عنوان العضوية </th>
                                <th> وصف العضوية </th>
                                <th> سعر العضوية </th>
                                <th> عدد المشتركين </th>
                                <th> # </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($members as $member)
                            <tr>
                                <td>{{$member->name}}</td>
                                <td>{{$member->description}}</td>
                                <td>{{$member->price}}</td>
                                <td>{{$member->subscriptions()->count()}}</td>
                                <td>
                                    <form action="{{ route('member.delete',$member->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger">حذف</button>
                                    </form>
                                    <a href="{{ route('member.edit',$member->id) }}" type="button" class="btn btn-warning">تعديل</a>
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