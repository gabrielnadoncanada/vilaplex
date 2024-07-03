<div {{$attributes->
  class(['slider-nav-panel'])}}>
  <div class="container">
    <div class="slider-progress-bar-frame">
      <div class="slider-progress-bar">
        <div class="progress"></div>
      </div>
    </div>
  </div>

  <div class="slider-arrows">
      <x-text as="div" theme="label" class="hidden sm:block !mb-0 pt-[3px] mr-[15px]">
          Navigation
      </x-text>

    <div class="button-prev magnetic-link h-[100px]">
      <span class="magnetic-object">
        <i class="fas fa-arrow-left"></i>
      </span>
    </div>
    <div class="button-next magnetic-link h-[100px]">
      <span class="magnetic-object"><i class="fas fa-arrow-right"></i> </span>
    </div>
  </div>
</div>
