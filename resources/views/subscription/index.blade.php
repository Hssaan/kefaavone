@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-deck mb-3 text-center">
                @foreach($members as $member)
                <div class="card mb-4 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">{{ $member->name }}</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">{{ $member->price }} <small class="text-muted">ر.س </small><small class="text-muted">/ سنويا</small></h1>
                        <br>
                        <h5>{!! nl2br($member->description) !!}</h5>
                        <br>
                        <a href="{{ route('subscription.confirm',$member->uuid) }}" type="button" class="btn btn-lg btn-block btn-primary">اشتراك</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection