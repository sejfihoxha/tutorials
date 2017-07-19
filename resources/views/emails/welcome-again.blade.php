@component('mail::message')
# Introduction

Teksti i emailit te cilin ke me shkru... 

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Start Browsing
@endcomponent

@component('mail::panel', ['url' => ''])
Diqka motivuese- Diqka per Mitrovice!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
