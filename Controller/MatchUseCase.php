<?php 

require_once("..\Model\Match.php");

class MatchUseCase
{

    private $teams;
    private $matches = [];

    public function __construct()
    {
        $this->teams = array(new Team(1),new Team(2),new Team(3), new Team(4), new Team(5), new Team(6));
        // $this->teams = array();
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }

public function create_match($host_team_id,&$other_teams)
{
    echo "\nOther teams count\t".count($other_teams);
    $guest_team_index = array_rand($other_teams,1);
    $guest_team = $other_teams[$guest_team_index];
    unset($other_teams[$guest_team_index]);
    return new Match($host_team_id,$guest_team->team_id);
}

    public function create_tournament_grid()
    {
        // creates tournament table with commands

        $temp_teams = $this->teams;

        for($index = 0;$index<=count($temp_teams);$index++)
        {
            // array_push($this->matches,$this->create_match($team->team_id,$temp_teams));
            echo "\nTemp teams before count\t".count($temp_teams);
            $current_team = array_shift($temp_teams);
            array_push($this->matches,$this->create_match($current_team->team_id,$temp_teams));
            echo "\nTemp teams after count\t".count($temp_teams);
        }
    }

    public function get_winners()
    {
        $winners = array();
        
        foreach($this->matches as $match_index => $match)
        {
            // write result of each match to result array
            array_push($winners, $match->play());
        }

        return $winners;
    }

}

$test = new MatchUseCase();
$test->create_tournament_grid();

// echo count($test->matches)."\n";
echo "\nMatches table";
foreach($test->matches as $match_id => $match)
{
    echo "\nHost ID:\t".$match->host_team->team_id ,"\tGuest ID:\t".$match->guest_team->team_id;
}
// echo "Host ID:\n".$test->matches[0]->host_team->team_id ,"\nGuest ID:\n".$test->matches[0]->guest_team->team_id;
echo "\n";

?>