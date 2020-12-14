<?php

class TeamStatistics
{

    private $wins_count;
    private $loses_count;
    private $pts_count;
    private $draw_count;

    public function __construct($team_id)
    {
        $this->get_stats_from_db($team_id);
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        return $this->$name = $value;
    }

    public function get_stats_from_db($team_id)
    {
        // query for getting stats from db
        // for populating fields by values from db
        // if($qeury != null)
        // {
        //     $this->wins_count = $query->get_wins_count(); 
        //     $this->lose_count = $query->get_loses_count(); 
        //     $this->pts_count = $query->get_pts_count(); 
        //     $this->draws_count = $query->get_draws_count();    
        // } else { 
        $this->wins_count = 0; 
        $this->loses_count = 0; 
        $this->pts_count = 0; 
        $this->draws_count = 0;
        // } 
    }

}

?>