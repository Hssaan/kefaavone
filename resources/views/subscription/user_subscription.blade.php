@extends('layouts.dashboard')

@section('content')
 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">قائمة الاشتراكات</div>

                <div class="card-body">
                    <div class="card-deck mb-3 text-center">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>اسم المستخدم</th>
                                    <th>عنوان العضوية </th>
                                    <th> سعر العضوية </th>
                                    <th> بداية الاشتراك </th>
                                    <th> نهاية الاشتراك </th>
                                    <th> حالة الاشتراك </th>
                                    <th> طريقة السداد </th>
                                    <th> حالة السداد </th>
                                    <th> # </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subscriptions as $subscription)
                                <tr>
                                    <td>{{$subscription->user->name}}</td>
                                    <td>{{$subscription->member->name}}</td>
                                    <td>{{$subscription->amount}}</td>
                                    <td>{{$subscription->start_date}}</td>
                                    <td>{{$subscription->end_date}}</td>
                                    <td>{{trans('layout.'.$subscription->status)}}</td>
                                    <td>{{trans('layout.'.$subscription->payment_method)}}</td>
                                    <td>{{trans('layout.'.$subscription->payment_status)}}</td>
                                    <td>
                                        <form action="{{ route('subscription.active',$subscription->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-success">تفعيل</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
