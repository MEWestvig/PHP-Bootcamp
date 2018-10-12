<?php

class Player
{
	protected $name = "";
	protected $x = 0;
	protected $y = 0;
	protected $movement = 3;
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
	function play()
	{
		$this->rollDice();
	}
	function getName()
	{
			return $this->name;
	}
	function updateX($i)
	{
		$dif = $i - $this->x;
		$this->movement -= $dif;
		$this->x += $dif;
	}
	function getX()
	{
		return $this->x;
	}
	function updateY($i)
	{
		$dif = $i - $this->y;
		$this->movement -= $dif;
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
}
?>
