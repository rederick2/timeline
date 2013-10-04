
<?php $this->widget('ext.Timeline.Timeline', array(
       'id'=>'demo',
       'language'=>'es',
       'options' => array(
			'width'=>'100%',
			'height'=>'100%',
			'source'=> Yii::app()->baseUrl.'/timeline/JsonTimeline',
			'embed_id'=>           'timeline-embed',               //OPTIONAL USE A DIFFERENT DIV ID FOR EMBED
			'start_at_end'=>       false,                          //OPTIONAL START AT LATEST DATE
			'start_at_slide'=>     'js:function(){ alert("");}',                            //OPTIONAL START AT SPECIFIC SLIDE
			'start_zoom_adjust'=>  '3',                            //OPTIONAL TWEAK THE DEFAULT ZOOM LEVEL
			'hash_bookmark'=>      true,                           //OPTIONAL LOCATION BAR HASHES
			'font'=>               'Bevan-PotanoSans',             //OPTIONAL FONT
			'debug'=>              false,                           //OPTIONAL DEBUG TO CONSOLE
          )
        ));
 
      ?>