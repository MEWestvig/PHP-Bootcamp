<?php

class Player
{
	protected $name = "";
	protected $x = 0;
	protected $y = 0;
	function __construct($n, $num)
	{
		$this->name = $n;
		if ($num)
		{
			$this->x = rand(0, 75);
			$this->y = rand(0, 50);
		} else {
			$this->x = rand(75, 150);
			$this->y = rand(50, 100);
		}
	}
	function play()
	{
		$this->rollDice();
	}
	function getName()
	{
			return $this->name;
	}
	function getX()
	{
		return $this->x;
	}
	function getY()
	{
		return $this->y;
	}
}
?>
