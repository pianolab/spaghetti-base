<?php

class FlashComponent extends Component
{

  public function setFlash($type = null, $message = null)
  {
    Session::writeFlash("site.alert", array($type, $message));
  }

  /**
   * Shortcuts
   */
  public function info($message = null) { return $this->setFlash("info", $message); }
  public function danger($message = null) { return $this->setFlash("danger", $message);  }
  public function success($message = null) { return $this->setFlash("success", $message); }
  public function warning($message = null) { return $this->setFlash("warning", $message); }
}