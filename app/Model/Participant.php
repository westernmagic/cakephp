<?php
	
	class Participant extends AppModel {
		public $name = 'Participant' ;
		public $belongsTo = array( 'Survey' ) ;
		public $hasMany = array( 'Answer' , 'Comment' ) ;
	}
	
?>