<?php
App::uses('AppShell', 'Console/Command');
App::uses('ClassRegistry', 'Utility');
App::uses('CakeTime', 'Utility');

class AggregateShell extends AppShell {

	public $tasks = array('AggregateBase', 'AggregateServer', 'AggregateCountry');

	public function DAU(){
		$this->out('Start run aggregate DAU');
		$date = date('d-m-Y');
		if (isset($this->args[0])) {
			$date = $this->args[0];
		}

		$this->AggregateBase->_aggreateByDay("LogLogin", "LogLoginsByDay", "COUNT_DISTINCT", "user_id", array("game_id"), array('day' => $date));
	}
}
