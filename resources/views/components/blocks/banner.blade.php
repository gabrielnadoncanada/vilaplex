<section class="banner pt-140 mb-100">
    <div class="head-bg">
        <x-blocks.fields.image :image="$image"/>
        <div class="bg-overlay"></div>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-center">
                <div class="main-title d-grid row-gap-4 title-center">
                    <x-blocks.fields.subtitle
                        :subtitle_text="$subtitle_text"
                        :subtitle_level="$subtitle_level"
                    />
                    <x-blocks.fields.heading
                        :split="true"
                        :heading_text="$heading_text"
                        :heading_level="$heading_level"
                        :heading_size="$heading_size"
                    />
                    <x-blocks.fields.text
                        :text="$text"
                        class="max-w-450px mx-auto"
                    />
                    <x-blocks.fields.buttons
                        :buttons="$buttons"
                    />
                </div>
            </div>
        </div>
    </div>
</section>
