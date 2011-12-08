<?php
	
	class Answer extends AppModel {
		public $name = 'Answer' ;
		public $belongsTo = array( 'Participant'  , 'Question' ) ;
	}
	
?>