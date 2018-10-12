<?php

class Player
{
	protected $name = "";
	protected $x = 0;
	protected $y = 0;
	protected $movement = 15;
	protected $health = 5;
	protected $roll = 0;
	function __construct($n, $num, $board_x, $board_y)
	{
		$this->name = $n;
		if (!$num)
		{
			$this->x = rand(0, $board_x / 8);
			$this->y = rand(0, $board_y / 8);
		} else {
			$this->x = rand($board_x / 2 + $board_x / 2 / 4 * 3, $board_x - 1);
			$this->y = rand($board_y / 2 + $board_y / 2 / 4 * 3, $board_y - 1);
		}
	}
	function reset($i)
	{
		$this->movement = 15;
		if ($i === 1)
			$this->roll = 0;
	}
	function getName()
	{
			return $this->name;
	}
	function updateX($i)
	{
		$dif = $i - $this->x;
		$this->movement -= abs($dif);
		$this->x += $dif;
	}
	function getX()
	{
		return $this->x;
	}
	function updateY($i)
	{
		$dif = $i - $this->y;
		$this->movement -= abs($dif);
		$this->y += $dif;
	}
	function getY()
	{
		return $this->y;
	}
	function getMove()
	{
		return $this->movement;
	}
	function getHealth()
	{
		return $this->health;
	}
	function setRoll($roll)
	{
		$this->roll = $roll;
	}
	function getRoll()
	{
		return $this->roll;
	}
	public static function doc() {
   $read = fopen("Player.doc.txt", 'r');
   echo "\n";
   while ($read && !feof($read))
     echo fgets($read);
   echo "\n";
  }
}
?>
