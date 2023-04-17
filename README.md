# laravel-link-shortner
vendor/ashallendesign/short-url/src/Classes/Builder.php
'default_short_url'              => config('app.url').'/short/'.$this->urlKey,

To

'default_short_url'              => config('app.url').'/'.$this->urlKey,

