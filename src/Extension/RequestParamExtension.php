<?php
/**
 * @ Author: Daday ANDRY
 * @ Create Time: 2022-11-12 19:01:57
 * @ Modified by: Daday ANDRY
 * @ Modified time: 2022-11-12 19:05:46
 * @ Description:
 */
namespace DadayAndry\RpmTwigBundle\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\RouterInterface;


class RequestParamExtension extends AbstractExtension
{
    private $request;
    private $router;
    
    public function __construct(RequestStack $request, RouterInterface $router)
    {
    $this->request = $request;
    $this->router  = $router;
    }
    public function getFunctions()
    {
        
        return [
            new TwigFunction(
                'appendParam' , 
                [$this , 'appendParam']
            ),
            new TwigFunction(
                'removeParam' , 
                [$this , 'removeParam']
            )
        ];
    }

    public function appendParam($param, $value)
    {
        $request = $this->request->getCurrentRequest();
        $params  = $request->query->all();
        $routeName = $request->get("_route");

        $params[$param] = $value;
        return $this->router->generate($routeName,$params);
        
    }
    public function removeParam($param)
    {
        $request = $this->request->getCurrentRequest();
        $params  = $request->query->all();
        $routeName = $request->get("_route");

        if(isset($params[$param])){
            unset($params[$param]);
        }
        return $this->router->generate($routeName,$params);
        
    }
}
