<?php
/**
 * @ Author: Daday ANDRY
 * @ Create Time: 2022-11-12 19:01:57
 * @ Modified by: Your name
 * @ Modified time: 2022-11-12 22:02:47
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
                'getRouteParam' , 
                [$this , 'getRouteParam']
            ),
            new TwigFunction(
                'appendRouteParam' , 
                [$this , 'appendRouteParam']
            ),
            new TwigFunction(
                'removeRouteParam' , 
                [$this , 'removeRouteParam']
            )
        ];
    }

    public function getRouteParam($param, $default = null)
    {
        $request = $this->request->getCurrentRequest();
        $params  = $request->query->all();
        $value   = $request->get($param, false);
        return  $value ? $value : $default; 
        
    }

    public function appendRouteParam($param, $value)
    {
        $request = $this->request->getCurrentRequest();
        $params  = $request->query->all();
        $routeName = $request->get("_route");

        $params[$param] = $value;
        return $this->router->generate($routeName,$params);
        
    }
    public function removeRouteParam($param)
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
