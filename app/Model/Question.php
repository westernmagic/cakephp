<?php
	
	class Question extends AppModel {
		public $name = 'Question' ;
		public $belongsTo = array( 'Survey' ) ;
		public $hasMany = array( 'Answer' ) ;
	}
?>