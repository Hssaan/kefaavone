@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">تعديل العضوية</div>


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

                    <form method="post" action="{{ route('member.update',$member->id) }}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="memberName">عنوان العضوية</label>
                            <input type="text" class="form-control" id="memberName" name="name"  placeholder="ادخل عنوان العضوية" value="{{ $member->name }}">
                        </div>
                        <div class="form-group">
                            <label for="memberPrice">سعر الاشتراك في العضوية</label>
                            <input type="number" class="form-control" id="memberPrice" name="price" placeholder="ادخل السعر" value="{{ $member->price }}">
                        </div>
                        <div class="form-group">
                            <label for="memberDescription">وصف العضوية</label>
                            <textarea type="text" class="form-control" id="memberDescription" rows="4" name="description" placeholder="ادخل الوصف">
                                {{ trim($member->description) }}
                            </textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">تعديل</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
