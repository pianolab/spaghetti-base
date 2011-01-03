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
 * public $helpers = array('Flash');
 * 
 * Controller:
 * 	Session::writeFlash('adm.alert', array('warning', 'your message'));
 * 
 * Views:
 * 
 * <?php echo $flash->flash(); ?> Will get the session alert or Auth
 * 
 * or:
 * 
 * <?php echo $flash->flash(array('warning', 'Some another message')); ?>
 * 
 * or:
 * 
 * <?php echo $flash->warning('Some another message'); ?>
 * <?php echo $flash->success('Some another message'); ?>
 * <?php echo $flash->error('Some another message'); ?>
 * <?php echo $flash->information('Some another message'); ?>
 * 
 */

App::import("Helper", "html_helper");
class FlashHelper extends HtmlHelper
{
	public function flash($message = null)
	{
		$flash = ($message) ? $message : Session::flash('adm.alert');
		
		if ($message):
			$flash = $message;
		elseif ($login = Session::flash('Auth.error')):
			$flash = $login;
		elseif ($alert = Session::flash('adm.alert')):
			$flash = $alert;
		endif;
		
		if ($flash):
			return $this->output($this->show($flash));
		endif;
	}
	
	private function show($message)
	{
		if (is_array($message[1])):
			$html_message = '';
			foreach ($message[1] as $msg):
		        $html_message .= "<br /> \n";
		    endforeach;
		else:
			if (!is_array($message)):
				$temp = $message;
				$message = array();
				$message[0] = 'warning';
				$message[1] = $temp;
			endif;
			$html_message = $message[1];
		endif;
		
		$base_html .= $this->openTag('div', array('class' => 'message ' . $message[0])) . "\n";
		$base_html .= $this->tag('h2', 'Atenção') . "\n";
		$base_html .= $this->openTag('p') . "\n";
		$base_html .= $html_message;
		$base_html .= $this->closeTag('p') . "\n";
		$base_html .= $this->closeTag('div');
		return $base_html;
	}
	
	/**
	 * Shortcuts
	 */
	public function information($message = null) { return $this->flash(array('information', $message));	}
	public function success($message = null) { return $this->flash(array('success', $message)); }
	public function error($message = null) { return $this->flash(array('error', $message));	}
	public function warning($message = null) { return $this->flash(array('warning', $message)); }
	
}