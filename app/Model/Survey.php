<?php
	
	class Survey extends AppModel {
		public $name = 'Survey' ;
		public $belongsTo = array( 'Term' ) ;
		public $hasMany = array( 'Participant' , 'Question' ) ;
	}
	
?>