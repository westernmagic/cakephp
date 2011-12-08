<?php echo $this->Form->create( 'Answer' , array( 'default' => false , 'url' => array( 'controller' => 'Participants' , 'action' => 'close' ) , 'inputDefaults' => array( 'div' => false , 'label' => false ) ) ) ; ?>
<table>
	<tbody>
		<tr>
			<th>
				Frage
			</th>
			<td>
				keine Äusserung
			</td>
			<td>
				stimmt gar nicht zu
			</td>
			<td>
				stimmt teilweise nicht zu
			</td>
			<td>
			</td>
			<td>
				stimmt teilwiese zu
			</td>
			<td>
				stimmt ganz zu
			</td>
		</tr>
		<?php foreach( $questions as $question ) : ?>
			<tr>
				<th>
					<?php echo $question[ 'question' ] ; ?>
				</th>
				<?php foreach( array( 0 , 1 , 2 , 3 , 4 , 5 ) as $answer ) : ?>
					<td>
						<?php echo $this->Form->radio( 'Answer.' . $question[ 'id' ] . '.answer' , array( $answer => '' ) , array( 'hiddenField' => false ) ) ; ?>
					</td>
				<?php endforeach ; ?>
			</tr>
		<?php endforeach ; ?>
	</tbody>
</table>
<?php
	echo $this->Form->end( array( 'value' => 'Umfrage abschicken' , 'class' => 'button icon mail' ) ) ;
	$this->Js->get( 'form' ) ;
	$data = $this->Js->serializeForm( array( 'inline' => true ) ) ;
	$this->Js->get( 'input:radio' ) ;
	$this->Js->event( 'change' , $this->Js->request( array( 'controller' => 'Answers' , 'action' => 'submit' ) , array( 'method' => 'POST' , 'data' => $data , 'dataExpression' => true , 'update' => 'footer' ) ) ) ;
?>
