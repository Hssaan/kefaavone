@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">اضافة مستخدم جديد</div>


                <div class="card-body">
                    

                    <form method="post" action="{{ route('user.store') }}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="userName">الاسم</label>
                            <input type="text" class="form-control" id="userName" name="username"  placeholder="الاسم">
                        </div>
                        <div class="form-group">
                            <label for="email"></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="البريد الالكتروني">
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
                                <option value="1">مدير</option>
                                <option value="0">منظمة</option>
                            </select>
                        </div>                        
                        
                        <button type="submit" class="btn btn-primary">اضافة</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
