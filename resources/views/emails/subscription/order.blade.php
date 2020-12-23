@component('mail::message')
<div dir="rtl">
# فاتورة

@component('mail::table')
| نوع العضوية        |
| ------------- |
| {{$subscription->member->name }}   |
@endcomponent


@component('mail::table')
| طريقة السداد       | حالة السداد         | رسوم الاشتراك  |
| ------------- |:-------------:| --------:|
|  {{ trans('layout.'.$subscription->payment_method) }}           | {{ trans('layout.'.$subscription->payment_status) }}    | {{$subscription->amount }} ر.س   |
@endcomponent

@component('mail::button', ['url' => route('profile.index')])
عرض الاشتراك
@endcomponent

شكرا,<br>
{{ config('app.name') }}
</div>
@endcomponent
