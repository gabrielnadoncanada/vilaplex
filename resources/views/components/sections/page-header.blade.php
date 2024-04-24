@props(['subtitle','title','description','image'])
@if(!isset($image))
    @php
        $image = 'img/light/projects/prjct-6/1.jpg';
    @endphp
@endif
@php
    $specialChars = ['!', '.', '?'];
   $asSpecialChar = false;
   $titleLength = strlen($title);

   for ($i = 0; $i < $titleLength; $i++) {
       if (in_array($title[$i], $specialChars)) {
           $part1 = substr($title, 0, $i + 1);
           $part2 = substr($title, $i + 1);
           $asSpecialChar = true;
           break;
       }
   }


   if(!$asSpecialChar){
       $length = strlen($title);
       $part1Length = (int)($length * 0.75);
       $lastSpaceBefore75Percent = strrpos(substr($title, 0, $part1Length), ' ');
       $part1 = substr($title, 0, $lastSpaceBefore75Percent);
       $part2 = substr($title, $lastSpaceBefore75Percent);
   }
@endphp

<canvas class="mry-dots" style="display: none"></canvas>

<div class="mry-head-bg">
    <img src="{{$image}}" alt="background">
    <div class="mry-bg-overlay"></div>
</div>
<div class="mry-banner mry-p-140-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="mry-main-title mry-title-center">
                <div class="mry-subtitle mry-mb-20 mry-fo">{{$subtitle}}</div>
                <h1 class="mry-mb-20 mry-fo">{{ trim($part1) }}<br><span
                            class="mry-border-text">{{ trim($part2) }}</span><span class="mry-animation-el"></span></h1>
                <div class="mry-text mry-fo max-w-450px mry-mx-auto">{{$description}}</div>
                <div class="mry-scroll-hint-frame">
                    <a class="mry-scroll-hint mry-smooth-scroll mry-magnetic-link mry-fo" href="#mry-anchor">
                        <span class="mry-magnetic-object"></span>
                    </a>
                    <div class="mry-label mry-fo">{{__('app.service.scroll_down')}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
