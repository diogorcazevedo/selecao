@component('mail::message')
# {{$user->name}}

Seu cadastro junto ao Instituto de seleção foi realizado com sucesso!


@component('mail::panel', ['url' => 'http://institutodeselecao.org.br/'])
Guarde sua senha cadastrada: {{$password}}
@endcomponent



@component('mail::button', ['url' => 'http://institutodeselecao.org.br/', 'color' => 'cavaleiros'])
www.institutodeselecao.org.br
@endcomponent


Obrigado,<br>
{{ config('app.name') }}

@endcomponent
