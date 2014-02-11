<?php
/**
 ************************
 ***** Flash Helper *****
 ************************
 * Allows you to show alert messages to user setting a flashSession or passing aroung the html easily
 *
 * developed by pianolab.com.br
 *
 * HOW TO;
 *
 * With session:
 *
 * App Controller:
 * public $helpers = array("Flash");
 *
 * Controller:
 *   Session::writeFlash("adm.alert", array("warning", "your message"));
 *
 * Views:
 *
 * <?php echo $flash->flash(); ?> Will get the session alert or Auth
 *
 * or:
 *
 * <?php echo $flash->flash(array("warning", "Some another message")); ?>
 *
 * or:
 *
 * <?php echo $flash->warning("Some another message"); ?>
 * <?php echo $flash->success("Some another message"); ?>
 * <?php echo $flash->error("Some another message"); ?>
 * <?php echo $flash->information("Some another message"); ?>
 *
 */

App::import("Helper", "html_helper");

class FlashHelper extends HtmlHelper
{
  public function flash($message = null)
  {
    $flash = ($message) ? $message : Session::flash("site.alert");

    if ($message):
      $flash = $message;
    elseif ($login = Session::flash("Auth.error")):
      $flash = $login;
    elseif ($alert = Session::flash("site.alert")):
      $flash = $alert;
    endif;

    if ($flash) return $this->output($this->show($flash));
  }

  private function show($message)
  {
    if (is_array($message[1])) {
      $html_message = implode("- <br />", $message[1]);
      $html_message = " - " . implode("<br /> - ", $message[1]);
    }
    else {
      if (!is_array($message)){
        $message = array("warning", $message);
      } # endif;
      $html_message = $message[1];
    } # endif;

    $message[0] = empty($message[0]) ? "warning" : $message[0];
    if (empty($message[2])) {
      $title = str_replace(array(
        "warning", "success", "error",
        "info","danger"
      ), array(
        "Atenção", "Sucesso", "Erro",
        "Informação", "Erro"
      ), $message[0]);
    }
    else {
      $title = $message[2];
    }

    return "<div id=\"flash-message\"  class=\"alert fade in alert-" . $message[0] . "\">
      <span class=\"close\" data-dismiss=\"alert\">×</span>
      <strong>" . $title . "!</strong> " . $html_message . "</div>";
  }

  /**
   * Shortcuts
   */
  public function info($message, $title = null) { return $this->flash(array("info", $message, $title));  }
  public function danger($message, $title = null) { return $this->flash(array("danger", $message, $title));  }
  public function warning($message, $title = null) { return $this->flash(array("warning", $message, $title)); }
  public function success($message, $title = null) { return $this->flash(array("success", $message, $title)); }
}