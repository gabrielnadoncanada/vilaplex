
@isset($href)
  <a href="{{ $href }}" {{ $attributes->merge(['class' => $theme()]) }}
  @if($newTab) target="_blank" rel="noopener noreferrer" @endif>{{ $slot }}</a>
@else
  <button {{ $attributes->merge(['type' => 'submit', 'class' => $theme()]) }}>
    {{ $slot }}
  </button>
@endif
