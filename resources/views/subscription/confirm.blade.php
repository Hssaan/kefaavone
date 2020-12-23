@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">الاشتراك في العضوية</div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li> {{$error}} </li>
                                @endforeach
                            </ul> 
                        </div>
                    @endif
                    <h4>نوع العضوية : {{ $member->name }}</h4>
                    <h4>رسوم الاشتراك السنوية : {{ $member->price }} ر.س</h4>

                    <form method="post" action="{{ route('subscription.store',$member->id) }}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="paymentMethod">طريقة الدفع</label>
                            <select type="text" class="form-control" id="paymentMethod" name="payment_method" placeholder="">
                                <option value="paypal">Paypal</option>
                                <option value="bank_transfer">حوالة بنكية</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">اشتراك</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
