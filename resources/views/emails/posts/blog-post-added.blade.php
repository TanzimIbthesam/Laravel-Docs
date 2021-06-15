@component('mail::message')
Someone has posted 
Make sure to proof read

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
