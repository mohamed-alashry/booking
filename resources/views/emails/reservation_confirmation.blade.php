@component('mail::message')
    {{-- Greeting --}}
    @if (!empty($greeting))
        # {{ $greeting }}
    @else
        @if ($level === 'error')
            # @lang('Whoops!')
        @else
            # @lang('Hello!')
        @endif
    @endif

    {{-- Intro Lines --}}

    {{ $title }}

    {{ $body }}

    {{-- Action Button --}}
    @isset($actionText)
        @component('mail::button', ['url' => $url, 'color' => 'primary'])
            {{ $actionText }}
        @endcomponent
    @endisset

    {{-- Outro Lines --}}
    {{ $thanks }}


    {{-- Salutation --}}
    @if (!empty($salutation))
        {{ $salutation }}
    @else
        @lang('Regards'),
        {{ config('app.name') }}
    @endif

    {{-- Subcopy --}}
    @isset($actionText)
        @slot('subcopy')
            @lang("If you're having trouble clicking the \":actionText\" button, copy and paste the URL below\n" . 'into your web browser:', [
                'actionText' => $actionText,
            ]) <span class="break-all">[{{ $actionText }}]({{ $url }})</span>
        @endslot
    @endisset
@endcomponent
