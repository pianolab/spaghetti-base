<?php
class Attachment extends ActiveRecordModel 
{
  public function size()
  {
    return number_format($this->size / 1024, 1);
  }
}