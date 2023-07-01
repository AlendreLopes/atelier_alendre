@component('mail::message')

<h1>The user: {{ $name }} send this e-mail:</h1>

<p>
    User name:
    <br />
    {{ $name }}
    <br />
    <br />
    User Phone:
    <br />
    {{ $phone }}
    <br />
    <br />
    User Email:
    <br />
    {{ $email }}
</p>

<p>
    User Message:
    <br />
    {{ $message }}
</p>

@component('mail::button', ['url' => route('home')])
If you need back to site click here
@endcomponent

Thanks,
{{ config('app.name') }}
@endcomponent
