<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateQueryParam
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    final public function handle(Request $request, Closure $next): Response
    {
        if ($request->isMethod('GET') && $request->query->has('source')) {
            $sources = config('constants.sources');
            $source = $request->query->get('source');
            return in_array($source, $sources, true)
                ? $next($request)
                : response()->json(['message' => 'Invalid source'], Response::HTTP_UNPROCESSABLE_ENTITY);

        }
        return $next($request);
    }
}
