@component('mail::message')
# Introduction

{{ config('app.name') }}.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

<p> Your reset password is : {{$code}} </p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
