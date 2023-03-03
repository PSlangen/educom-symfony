<?php 

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseController extends AbstractController
{
    private $logger;
    
    protected function log($msg, $msgtype = "info") {
        if ($msgtype == "info"){
            $this->logger->info($msg);
        }
        if ($msgtype == "warning"){
            $this->logger->warning($msg);
        }
        if ($msgtype == "error"){
            $this->logger->error($msg);
        }  
    }
    
    public function __construct(LoggerInterface $logger) {
        $this->logger = $logger;
    } 

}

