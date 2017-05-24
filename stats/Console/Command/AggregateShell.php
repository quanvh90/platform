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

		$this->AggregateBase->_aggreateByDay(
		    "LogLogin", "LogLoginsByDay", "COUNT_DISTINCT", "user_id",
            array("game_id"), array('day' => $date)
        );
	}

	public function cDAU(){
        $this->out('Start run aggregate DAU by country');
        $date = date('d-m-Y');
        if (isset($this->args[0])) {
            $date = $this->args[0];
        }

        $this->AggregateCountry->Dau($date);
    }

    public function MAU(){
        $this->out('Start run aggregate MAU');
        $month = date('d-m-Y');
        if (isset($this->args[0])) {
            $month = $this->args[0];
        }

        $model = array(
            'name' => 'LogLogin',
            'timeField' => 'created'
        );
        $model2 = 'LogLoginsByMonth';

        $this->AggregateBase->_aggreateByMonth(
            $model, $model2, 'COUNT_DISTINCT', 'user_id',
            array('game_id'), array('time' => $month)
        );
    }

    public function Niu()
    {
        $this->out('Start run aggregate NIU');
        $date = date('d-m-Y');
        if (isset($this->args[0])) {
            $date = $this->args[0];
        }
        $this->AggregateBase->_aggreateByDay("Account", "LogAccountsByDay", "COUNT", "user_id", array("game_id"), array('day' => $date));
    }
}