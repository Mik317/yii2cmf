<?php
/**
 * Created by PhpStorm.
 * Author: yidashi
 * DateTime: 2020/4/8 12:04
 * Description:
 */

namespace common\modules\education;

class ModuleInfo extends \common\modules\ModuleInfo
{
    public $isCore = 0;

    public $info = [
        'author' => '易大师',
        'bootstrap' => '',
        'version' => 'v1.0',
        'id' => 'education',
        'name' => '在线教育',
        'description' => '在线教育'
    ];

    public function install()
    {
        $migrate = new Migrate();
        $migrate->up();
        $parentMenu = $this->addMenu('在线教育');
        return true;
    }

    public function uninstall()
    {
        $migrate = new Migrate();
        $migrate->down();
        $this->deleteMenu('在线教育');
        return true;
    }
}