<?php

require_once("Team.php");

class Match
{

    private $match_id;
    private Team $host_team;
    private Team $guest_team;

    public function __construct($host_team_id, $guest_team_id)
    {
        if($host_team_id != $guest_team_id)
        {
            $this->host_team = new Team($host_team_id);
            $this->guest_team = new Team($guest_team_id);
    
            // populate other properties
        }
    }

    public function play()
    {

        // match logic

        if($host_team->stats->pts == $guest_team->stats->pts)
        {
            $this->host_team->stats->draws_count++;
            $this->guest_team->stats->draws_count++;
            return "DRAW";
        }
        else
        {
            if($host_team->stats->pts > $guest_team->stats->pts)
            {
                // If host team wins

                $this->host_team->stats->wins_count++;
                $this->guest_team->stats->loses_count++;

                return $this->host_team;
            }
            else
            {
                // if guest team wins

                $this->guest_team->stats->wins_count++;
                $this->host_team->stats->loses_count++;

                return $this->guest_team;
            }
        }
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }
}

?>