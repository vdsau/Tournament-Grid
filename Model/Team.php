<?php

require_once("TeamStatistics.php");

class Team
{

    private TeamStatistics $stats;
    private $team_id;

    public function __construct($team_id)
    {
        $this->stats = new TeamStatistics($team_id);
        $this->team_id = $team_id;
        // populate other team properties 
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __ToString()
    {
        return (string)$this->team_id;
    }
}

?>