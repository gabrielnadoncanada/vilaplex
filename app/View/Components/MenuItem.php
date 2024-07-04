<?php

namespace App\View\Components;

use App\Traits\Themeable;
use Illuminate\View\Component;
use Illuminate\Support\Facades\App;

class MenuItem extends Component
{
    use Themeable;

    public array $item;
    public string $url;

    public function __construct(array $item, $theme = 'default')
    {
        $this->theme = $theme;
        $this->item = $item;
        $this->url = $this->resolveUrl($item);
    }

    private function resolveUrl(array $item): string
    {
        if ($item['type'] !== 'External') {
            $post = App::make($item['type'])->find($item['data']['url']);
            if ($post && $post['is_visible'] && $post['published_at'] <= now()) {
                return $post->getPublicUrl();
            }
        }

        return $item['data']['url'];
    }

    public function render()
    {
        return view('components.menu-item');
    }
}
