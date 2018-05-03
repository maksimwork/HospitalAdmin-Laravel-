@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# Whoops!
@else
# Greetings.
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
            $color = 'green';
            break;
        case 'error':
            $color = 'red';
            break;
        default:
            $color = 'blue';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else

@endif

{{-- Subcopy --}}
@isset($actionText)
@component('mail::subcopy')
<strong>Support Team</strong><br/>
Adam Vital Physiotherapy & rehabilitation center
T: +971 4 2515000 | F: +971 4 2515522  
Address: Index Holding Building, Nad Al Hamar Road, Dubai, UAE
P.O. Box 76800
@endcomponent
@endisset
@endcomponent
