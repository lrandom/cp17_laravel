@component('mail::message')
# Đơn hàng 005

Bạn đã huỷ đơn hàng 005

@component('mail::button', ['url' => 'https://google.com'])
Vào trang google
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
