<?php
class CRUD
{
  public $pathFile;
  function __construct($pathFile)
  {
    $this->pathFile = $pathFile;
  }

  function createRecord($array)
  {

    $json = json_encode($array, JSON_UNESCAPED_UNICODE);

    $fd = fopen($this->pathFile, 'c+') or die("не удалось создать файл");
    fseek($fd, -1, SEEK_END);
    $str = fread($fd, 1);
    if (!$str) {
      fwrite($fd, '{"' . '1":' . $json . '}');
      fclose($fd);
      exit();
    }

    $string = (file_get_contents($this->pathFile)); //строка
    $data = json_decode($string, true);             //массив

    $countRecotd = count($data) + 1;               
    fseek($fd, -1, SEEK_END);
    fwrite($fd, ',"' . $countRecotd . '":' . $json . '}');
    fclose($fd);
  }

  function readRecords($field, $value)
  {
    $string = (file_get_contents($this->pathFile));
    $data = json_decode($string, true);
    if (!$data) {
      return;
    }
    foreach ($data as $key) {
      if ($key[$field] === $value) {
        return $key;
      }
    }
  }
}
