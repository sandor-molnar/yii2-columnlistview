<?php

namespace sanyisasha\yii2\columnlistview\widgets;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/**
 * @author SaSha <molnar.sandor.benjamin@gmail.com>
 */
class ColumnListView extends \yii\widgets\ListView
{
    /**
     * @var array Customize the ROW tag.
     * 'class' always gives 'row' string.
     */
    public $rowOptions;

    public $columns = 1;

    /**
     * @var array cols list.
     */
    private $cols = [
        'col-',
        'col-sm-',
        'col-md-',
        'col-lg-',
        'col-xl-',
    ];


    public function renderItems()
    {
        if ($this->cols === null || $this->columns === null) {
            return parent::renderItems();
        }

        $models = $this->dataProvider->getModels();
        $content = "";
        $count = 0;

        $tag = "div";
        $options = ["class" => "row"];
        if (isset($this->rowOptions)) {
            if (isset($this->rowOptions["tag"])) {
                $tag = $this->rowOptions["tag"];
                ArrayHelper::remove($this->rowOptions, 'tag');
            }
            $options = $this->rowOptions;
            $options["class"] = isset($this->rowOptions["class"]) ? $this->rowOptions["class"] . " row" : "row";
        }

        $classList = [];
        foreach ($this->cols as $col) {
            $classList[] = sprintf("%s%s", $col, floor(12 / $this->columns));
        }

        $this->itemOptions["class"] = isset($this->itemOptions["class"])
            ? $this->itemOptions["class"] . " " . implode(" ", $classList)
            : implode(" ", $classList);

        foreach ($models as $key => $model) {
            if ($count % $this->columns == 0) {
                if ($count !== 0) {
                    $content .= Html::endTag($tag);
                }

                $content .= Html::beginTag($tag, $options);
            }

            $content .= parent::renderItem($model, $key, $count);
            $count++;
        }

        $content .= Html::endTag($tag);

        return $content;
    }


}