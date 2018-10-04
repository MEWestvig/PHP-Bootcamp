#!/usr/bin/php
<?php
function is_href($content, $i)
{
  if ($content[$i] == '<' && $content[$i + 1] == 'a' && $content[$i + 2] == ' ')
  {
    return (1);
  }
  else {
    return (0);
  }
}
function is_title($content, $i)
{
  if ($content[$i] == '"' &&
        $content[$i - 1] == '=' &&
        $content[$i - 2] == 'e' &&
        $content[$i - 3] == 'l' &&
        $content[$i - 4] == 't' &&
        $content[$i - 5] == 'i' &&
        $content[$i - 6] == 't')
        {
          return (1);
        }
        else {
          return (0);
        }
}
function is_end_href($content, $i)
{
  if ($content[$i] == '>' && $content[$i - 1] == 'a' && $content[$i - 2] == '/')
	{
		return (1);
	}
	else
		return (0);
}
if ($argc < 2)
  exit();
$content = file_get_contents($argv[1]);
$i = 0;
$title = 0;
while ($content[$i])
{
  if (is_href($content, $i))
    $title = 1;
  if ($title == 1 && is_title($content, $i))
  {
    $i++;
    while ($content[$i] != '"')
    {
      $content[$i] = strtoupper($content[$i]);
      $i++;
    }
  }
  if ($title == 1 && $content[$i] == '>')
  {
    $i++;
    while ($content[$i] != '<' && $content[$i] != '')
    {
      $content[$i] = strtoupper($content[$i]);
      $i++;
    }
  }
  if ($title == 1 && is_end_href($content, $i))
    $title = 0;
  $i++;
}
echo $content;

?>
