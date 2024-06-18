@props([
    'image' => null,
    'subtitle' => null,
    'title' => null,
    'description' => null,
    'actions' => null,
])

<section class="banner pt-140 mb-100">
    <div class="head-bg">
        <img src="{{ Storage::url($image) }}" alt="background">
        <div class="bg-overlay"></div>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-center">
                <div class="main-title title-center">
                    @if($subtitle)
                        <div class="subtitle mb-20 fo">{{ $subtitle }}</div>
                    @endif
                    @if($title)
                        @php
                            $title = trim($title);

                              $newlinePos = strrpos($title, "\n");

                              if ($newlinePos !== false) {
                                  $part1 = substr($title, 0, $newlinePos);
                                  $part2 = substr($title, $newlinePos + 1);
                              } else {
                                  $part1 = $title;
                                  $part2 = '';
                              }

                              $part1 = str_replace("\n", '', $part1);
                              $part2 = str_replace("\n", '', $part2);
                        @endphp

                        <h1 class="h1 mb-20 fo">
                            {{ trim($part1) }}
                            @if($part2)
                                <br>
                                <span class="border-text">{{ trim($part2) }}</span><span class="animation-el"></span>
                            @endif
                        </h1>
                    @endif
                    @if($description)
                        <div class="text fo max-w-450px mx-auto mb-30">{!! $description !!}</div>
                    @endif
                    {{$actions}}

                </div>
            </div>
        </div>
    </div>
</section>
