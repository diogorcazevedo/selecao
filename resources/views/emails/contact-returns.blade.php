@component('mail::message')
# {{$user->name}}

Segue retorno do contato:


@component('mail::panel')
{{$orderNotes->description}}
@endcomponent


@component('mail::button', ['url' => 'http://institutodeselecao.org.br/', 'color' => 'cavaleiros'])
www.institutodeselecao.org.br
@endcomponent


{{ config('app.name') }}
@endcomponent
