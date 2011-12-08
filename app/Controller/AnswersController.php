<?php
	
	class AnswersController extends AppController {
		public $scaffold ;
		
		public function submit() {
			foreach( $this->request->data[ 'Answer' ] as $questionId => $data ) {
				$this->Answer->create() ;
				$this->Answer->id = $this->Answer->find( 'first' , array( 'fields' => array( 'Answer.id' ) , 'conditions' => array( 'Participant.id' => $this->Session->read( 'Participant.id' ) , 'Question.id' => $questionId ) ) ) ;
				if( !$this->Answer->id ) $this->Answer->id = null ;
				var_dump( $this->Answer->id ) ;
				$this->Answer->set( array( 'participant_id' => $this->Session->read( 'Participant.id' ) , 'question_id' => $questionId , 'answer' => $data[ 'answer' ] ) ) ;
				$this->Answer->save() ;
				$this->render( 'submit' , 'ajax' ) ;
			}
		}
	}
	
?>