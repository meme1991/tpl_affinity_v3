<?php

/**
  * Ordinare un array multidimensionale per un campo stabilito
  * @param $array multidimensionale da ordinale
  * @param $key chiave del campo da prendere in considerazione per l'ordinamento
  * @return array multidimensionale ordinato
  */

function extHelper($filename){
  // pdfile
  if ($filename != '') {
    // ricerca del''estensione
    $ext = substr($filename, strrpos($filename, '.')+1, strlen($filename));
    switch ($ext) {
      case 'zip': $icon = 'fas fa-file-archive'; break;
      case 'pdf': $icon = 'fas fa-file-pdf'; break;
      // word
      case 'docm':
      case 'odt' :
      case 'docx':
      case 'doc' : $icon = 'fas fa-file-word'; break;
      // excel
      case 'xls' :
      case 'xlt' :
      case 'xlsx': $icon = 'fas fa-file-excel'; break;
      // power point
      case 'ppt' :
      case 'pptx': $icon = 'fas fa-file-powerpoint'; break;
      // immagine
      case 'png':
      case 'gif':
      case 'jpg':
      case 'jpeg': $icon = 'fas fa-file-image'; break;
      default    : $icon = 'fas fa-file'; break;
    }
    return $icon;
  }
}
?>
