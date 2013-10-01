
<?php $this->widget('ext.Timeline.Timeline', array(
       'id'=>'demo',
       'language'=>'es',
       'options' => array(
           'width'=>'100%',
           'height'=>'100%',
           'source'=> Yii::app()->baseUrl.'/timeline/JsonTimeline'
          )
        ));
 
      ?>