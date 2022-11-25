{{--<x-mail::message>--}}
{{--# Introduction--}}

{{--The body of your message.--}}

{{--<x-mail::button :url="''">--}}
{{--Button Text--}}
{{--</x-mail::button>--}}

{{--Thanks,<br>--}}
{{--{{ config('app.name') }}--}}
{{--</x-mail::message>--}}

@component('mail::message')
    {{$object->title}} added
    Thanks for creating a new post
@endcomponent
