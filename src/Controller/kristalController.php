<?php 
namespace Drupal\kristal\Controller;

use Drupal\Core\Access\AccessResult; 
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\node\NodeInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Drupal\Core\Controller\ControllerBase;
/**
 * An controller.
 */
class kristalController   extends ControllerBase {

  /**
   * This function is called when an page_json/{apikey}/{node}
   * 
   * Return json page data.
   */
  public function content($apikey , $node) {
    
      // varify node type and siteapikey value
      if($apikey == \Drupal::config('system.site')->get('siteapikey') && 'page' == $node->bundle()){
      
			$data = $node->toArray();
			return new JsonResponse($data);
	   }else{   
			throw new AccessDeniedHttpException();
      }
  }

}
