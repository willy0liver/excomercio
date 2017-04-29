<?php
class AutorizacionMiddleware
{
    /**
     * Example middleware invokable class
     *
     * @param  \Psr\Http\Message\ServerRequestInterface $request  PSR7 request
     * @param  \Psr\Http\Message\ResponseInterface      $response PSR7 response
     * @param  callable                                 $next     Next middleware
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke($request, $response, $next)
    {
    	// Si no existe el token retornamos error 401
        /*
        $token = $request->getHeader('APP-TOKEN');
        if(empty($token)){
        	return $response->withStatus(401);
        }
        */

        $response = $next($request, $response);
        //$response->getBody()->write('AFTER');

        return $response;
    }
}