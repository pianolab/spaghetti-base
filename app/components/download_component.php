<?php

class DownloadComponent extends Component{

  public function force_download($filename = '', $data = '')
  {
    if ($filename == '' OR $data == '')
    {
      return FALSE;
    }

    // Set the default MIME type to send
    $mime = 'application/octet-stream';

    $x = explode('.', $filename);
    $extension = end($x);

    /* It was reported that browsers on Android 2.1 (and possibly older as well)
     * need to have the filename extension upper-cased in order to be able to
     * download it.
     *
     * Reference: http://digiblog.de/2011/04/19/android-and-the-download-file-headers/
     */
    if (count($x) !== 1 && isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/Android\s(1|2\.[01])/', $_SERVER['HTTP_USER_AGENT']))
    {
      $x[count($x) - 1] = strtoupper($extension);
      $filename = implode('.', $x);
    }

    // Generate the server headers
    header('Content-Type: '.$mime);
    header('Content-Disposition: attachment; filename="'.$filename.'"');
    header('Expires: 0');
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: '.strlen($data));

    // Internet Explorer-specific headers
    if (isset($_SERVER['HTTP_USER_AGENT']) && strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE)
    {
      header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
      header('Pragma: public');
    }
    else
    {
      header('Pragma: no-cache');
    }

    exit($data);
  }
}