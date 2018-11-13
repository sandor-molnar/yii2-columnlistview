# yii2-columnlistview
This package let you to display a `ListView` like widget, but with Bootstrap's Grid System.  
Need Yii2 2.* version and PHP 5.* or higher to work.  

Install:
```
composer require sanyisasha/yii2-columnlistview:dev-master
```

How to use:   
``` php
use sanyisasha\yii2\columnlistview\widgets\ColumnListView;

...

<?= ColumnListView::widget([
    'dataProvider' => $dataProvider, // ActiveDataProvider
    'columns' => 4, // Number of columns, eg 4
    'itemView' => '_item', // The itemView, same as in ListView
    'options' => [ // Parent from ListView widget
        'class' => 'items-container', // The main container what contains the whole *layout* (eg. pagination)
    ],
    'itemOptions' => [ // Parent from ListView widget
        // The <div class="col-..."> item
    ],
    'rowOptions' => [ // Only with this package
        // The <div class="row..."> item
    ],

]); ?>
```

Feel free to open an issue if you find something.  
## Author
Molnár Sándor <molnar.sandor@wwdh.hu>

## Links
Packagist: https://packagist.org/packages/sanyisasha/yii2-columnlistview
