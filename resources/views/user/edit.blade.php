@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">تعديل  مستخدم </div>


                <div class="card-body">
                    

                    <form method="post" action="{{ route('user.update',$user->uuid) }}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="userName">الاسم</label>
                            <input type="text" class="form-control" id="userName" name="username" value="{{ $user->name }}" placeholder="الاسم">
                        </div>
                        <div class="form-group">
                            <label for="email"></label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="البريد الالكتروني">
                        </div>

                        <div class="form-group">
                            <label for="password"></label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="كلمة المرور">
                        </div>

                        <div class="form-group">
                            <label for="confirm_password"></label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="تأكيد كلمة المرور">
                        </div>

                        <div class="form-group">
                            <label for="isadmin"></label>
                            <select type="isadmin" class="form-control" id="isadmin" name="isadmin">
                                <option value="1" @if($user->isadmin == 1) selected @endif >مدير</option>
                                <option value="0" @if($user->isadmin == 0) selected @endif>منظمة</option>
                            </select>
                        </div>                        
                        
                        <button type="submit" class="btn btn-primary">تعديل</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
