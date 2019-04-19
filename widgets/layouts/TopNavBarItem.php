<?php

namespace app\widgets\layouts;

use yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

class TopNavBarItem extends Widget
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
            $divider = ArrayHelper::getValue($item, 'divider', '');
            if (!empty($divider)) {
                $items[] = '<div class="topbar-divider d-none d-sm-block"></div>';
            } else {
                $items[] = $this->renderItem($item);
            }
        }

        return Html::tag('ul', implode("\n", $items), ['class' => 'navbar-nav ml-auto']);
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
        $items = ArrayHelper::getValue($item, 'items', '');
        $isShowText = !isset($item['showText']) ? false : $item['showText'] == 'true' ? true : false;

        //     <a class="nav-link dropdown-toggle" href="/site/login" id="userDropdown" role="button">
        //     <span class="mr-2 d-none d-lg-inline text-gray-600 small">Login</span>
        // </a>

        //if not dropdown
        if (empty($items)) {
            //if not icon
            if (empty($item['iconClass'])) {
                //if show text
                if ($isShowText) {
                    $result = '<span class="mr-2 d-none d-lg-inline text-gray-600 small">';
                    $result .= $labelText . '</span>';
                    return Html::tag('li', Html::a($result, $url, ['class' => 'nav-link dropdown-toggle', 'role' => 'button']), ['class' => 'nav-item dropdown no-arrow mx-1']);
                } else {
                    return '';

                    //return Html::tag('li', Html::a($result, $url, ['class' => 'nav-link dropdown-toggle', 'role' => 'button']), ['class' => 'nav-item dropdown no-arrow mx-1']);
                }
            } else {

                $result = '<i class ="' . $iconClass . '"></i>';
                $result .= '<span class="mr-2 d-none d-lg-inline text-gray-600 small">' . $labelText . '</span>';
                return Html::tag('li', Html::a($result, $url, ['class' => 'nav-link dropdown-toggle', 'role' => 'button']), ['class' => 'nav-item dropdown no-arrow mx-1']);
            }
        } else {
            if ($labelText == 'identity-user') {
                $result = '<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                $result.= '<span class="mr-2 d-none d-lg-inline text-gray-600 small">Hi !   ' . Yii::$app->user->identity->username .'</span></a>';
                $result.= '<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">';
                foreach ($items as $dropitem) {
                    //一般按鈕
                    if (isset($dropitem['label'])) {
                        $url = ArrayHelper::getValue($dropitem, 'url', '#');
                        $result .= '<a class="dropdown-item" href="' . $url . '">';
                        if (isset($dropitem['iconClass'])) {
                            $result .= '<i class="' . $dropitem['iconClass'] . '"></i>';
                        }
                        $result .= $dropitem['label'] . '</a>';
                    }
                    //分隔線
                    if (isset($dropitem['divider'])) {
                        $result .= '<div class="dropdown-divider"></div>';
                    }
                    //已登入專用
                    if (isset($dropitem['identity'])) {
                        //登出s
                        if ($dropitem['identity'] == 'logout') {
                            $result .= '<form id="logout" action="/site/logout" method="post">';
                            $result .= '<input type="hidden" name="_csrf" value="' . Yii::$app->request->getCsrfToken() . '">';
                            $result .= '<a class="dropdown-item" href="javascript:;" onclick="document.getElementById('. "'logout'" . ').submit();">';
                            $result .= '<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>';
                            $result .= 'Logout</a></form>';
                        }
                    }
                }
                
                $result.= '</div>';
            } else {

            }
        }
        $this->dropdownId++;
        return Html::tag('li', $result, ['class' => 'nav-item dropdown no-arrow mx-1']);
    }
}
