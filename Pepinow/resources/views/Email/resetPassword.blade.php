<x-mail::message>
# Introduction

The body of your message.

<x-mail::button :url='http://localhost:8000/resetPassword?token='.$token>
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
