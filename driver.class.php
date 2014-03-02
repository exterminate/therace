<?php

class Driver
{
    public function __construct($name,$age)
    {
        $this->name = $name;
        $this->age = $age;
        $this->driverfile = unserialize(file_get_contents("./driver.php"));
        $this->overtake = $this->driverfile[0];
        $this->corners  = $this->driverfile[1];
        $this->start    = $this->driverfile[2];
        $this->tyrewear = $this->driverfile[3];
        $this->racepace = $this->driverfile[4];
        $this->qualpace = $this->driverfile[5];
        $this->league   = $this->driverfile[6];
        $this->number   = $this->driverfile[7];
    }

    function generate_driver()
    {
        $this->overtake = rand(1,10);
        $this->corners  = rand(1,10);
        $this->start    = rand(1,10);
        $this->tyrewear = rand(1,10);
        $this->racepace = rand(1,10);
        $this->qualpace = rand(1,10);
        file_put_contents("driver.php",
            serialize(
                array(
                    $this->overtake,
                    $this->corners,
                    $this->start,
                    $this->tyrewear,
                    $this->racepace,
                    $this->qualpace,
                    3,
                    30,
                    $this->name
                )
            )
        );
    }
    
    function upgrade($attribute,$val)
    {
        switch($attribute){
            case $this->overtake:
                $this->overtake++;
                break;
            case $this->corners:
                $this->corners++;
                break;
            case $this->start:
                $this->start++;
                break;
            case $this->tyrewear:
                $this->tyrewear++;   
                break;
            case $this->racepace:
                $this->racepace++; 
                break;
            case $this->qualpace:
                $this->qualpace++; 
                break;    
        }
        file_put_contents("driver.php",serialize(array($this->overtake,$this->corners,$this->start,$this->tyrewear,$this->racepace,$this->qualpace,$this->league,$this->number,$this->name)));
    }
    
    function show_stats()
    {
        echo "<ul>\n<li>Driver number: ".$this->number."</li>\n<li>Overtaking: ".$this->overtake."</li>\n<li>Corners: ".$this->corners."</li>\n<li>Starting: ".$this->start."</li>\n<li>Tyrewear: ".$this->tyrewear."</li>\n<li>Race pace: ".$this->racepace."</li>\n<li>Qualifying pace: ".$this->qualpace."</li>\n<li>League: ".$this->league."</li>\n</ul>\n";
    }
}
//$driver = unserialize(file_get_contents("./driver.php"));
//$ian = new Driver("Ian",31);
//$ian->generate_driver();

/*
for($i = 1;$i<30;$i++){
    if($i<11){$low=20;$high=30;}elseif($i<21 && $i>10){$low=10;$high=20;}else{$low=1;$high=10;}
    $drivers[$i]["overtake"]=rand($low,$high);
    $drivers[$i]["corners"]=rand($low,$high);
    $drivers[$i]["start"]=rand($low,$high);
    $drivers[$i]["tyrewear"]=rand($low,$high);
    $drivers[$i]["racepace"]=rand($low,$high);
    $drivers[$i]["qualpace"]=rand($low,$high);
    if($i<11){$drivers[$i]["league"]=1;}elseif($i<21 && $i>10){$drivers[$i]["league"]=2;}else{$drivers[$i]["league"]=3;}
}
print_r($drivers);
file_put_contents("drivers.php",serialize($drivers));
*/
?>
