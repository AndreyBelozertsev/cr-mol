<?php

namespace App\View\Composers;

use App\Models\Setting;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;

class SettingComposer
{
    public function compose(View $view): void
    {
        $setting = Cache::rememberForever('setting_information', function () {
            return Setting::whereIn('key', config('const.contact_fields'))
                ->select(['key', 'value'])
                ->get()
                ->pluck('value', 'key');
        });

        $view->with('setting',$setting);
    }
}
