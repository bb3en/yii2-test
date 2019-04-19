<?php

namespace app\widgets\layouts;

use yii\base\Widget;
use yii\helpers\Html;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

class LeftNavBarItem extends Widget
{

    public $items = [];

    private $dropdownId;

    public function init()
    {
        parent::init();
        $dropdownId = 1;
    }

    public function run()
    {

        // var_dump($this->items);
        // exit();
        return $this->renderItems();
    }

    public function renderItems()
    {
        $items = [];
        foreach ($this->items as $i => $item) {

            $dividerClass = ArrayHelper::getValue($item, 'divider', '');
            $headingText = ArrayHelper::getValue($item, 'heading', '');
            if (!empty($dividerClass)) {
                $items[] = '<hr class="sidebar-divider my-0">';
            } else if (!empty($headingText)) {
                $items[] = '<div class="sidebar-heading">' . $headingText . '</div>';
            } else {
                $items[] = $this->renderItem($item);
            }
        }

        return Html::tag('li', implode("\n", $items), ['class' => 'nav-item']);
    }
    /**
     * Renders a widget's item.
     * @param string|array $item the item to render.
     * @return string the rendering result.
     *
     */
    public function renderItem($item)
    {
        $labelText = ArrayHelper::getValue($item, 'label');
        $url = ArrayHelper::getValue($item, 'url', '/');
        $iconClass = ArrayHelper::getValue($item, 'iconClass', '');
        $items = ArrayHelper::getValue($item, 'items');

        //if not dropdown
        if (empty($items)) {
            if (empty($item['iconClass'])) {
                return Html::a('<span>' . $labelText . '</span>', $url);
            } else {

                $result = '<i class ="' . $iconClass . '"></i><span>' . $labelText . '</span>';

                return Html::a($result, $url, ['class' => 'nav-link']);
            }
        } else {
            //item label
            $result = ' <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse' . (string)$this->dropdownId . '" aria-expanded="true" aria-controls="collapseTwo">';
            if (!empty($item['iconClass'])) {
                $result .= '<i class="' . $iconClass . '"></i>';
            }
            $result .= '<span>' . $labelText . '</span></a>';
            //dropdown item
            $result .= '<div id="collapse' . (string)$this->dropdownId . '" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">';
            $result .= '<div class="bg-white py-2 collapse-inner rounded">';
            foreach ($items as $item) {
                $headerText = ArrayHelper::getValue($item, 'header', '');
                $labelText = ArrayHelper::getValue($item, 'label', '');
                $url = ArrayHelper::getValue($item, 'url', '');
                if (!empty($headerText)) {
                    $result .= '<h6 class="collapse-header">' . $headerText . '</h6>';
                }
                if (!empty($labelText)) {

                    $result .= '<a class="collapse-item" href="' . $url . '">' . $labelText . '</a>';
                }
            }

            $result .= '</div></div>';
        }
        $this->dropdownId++;
        return $result;
    }
}
