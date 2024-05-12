<?php

declare(strict_types=1);

namespace App\MoonShine\Controllers;

use App\Models\Setting;

use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Admin\SettingSaveRequest;
use MoonShine\Http\Controllers\MoonShineController;

final class SettingController extends MoonShineController
{
    public function __invoke(SettingSaveRequest $request): Response
    {
        Setting::truncate();
        $data=[];
        foreach($request->validated() as $k => $v){
            if(empty($v)){
                continue;
            }
            $data[]=[
                'key' => $k,
                'value'=>$v
            ];
        }

        Cache::forget('setting_information');

        Setting::insert($data);

        $this->toast('Настройки успешно сохранены', 'success');

        return back();
    }
}
