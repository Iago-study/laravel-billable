<?php

namespace App\Http\Controllers;

use App\Transformers\UserTransformer;
use App\User;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;

class UsersController extends Controller
{

    /**
     * @var Manager
     */
    private $fractal;

    /**
     * @var UserTransformer
     */
    private $userTransformer;

    public function __construct(Manager $fractal, UserTransformer $userTransformer)
    {
        $this->fractal = $fractal;
        $this->userTransformer = $userTransformer;
    }

    public function index(Request $request)
    {
        $usersPaginator = User::paginate(10);

        $users = new Collection($usersPaginator->items(), $this->userTransformer);
        $users->setPaginator(new IlluminatePaginatorAdapter($usersPaginator));

        $this->fractal->parseIncludes($request->get('include', '')); // parse includes
        $users = $this->fractal->createData($users); // Transform data

        return $users->toArray(); // Get transformed array of data
    }

}
