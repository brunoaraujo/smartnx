<?php
namespace App\Http\Controllers;

use App\Repositories\OperadorRepository;
use Illuminate\Http\Request;
use SmartNx\Controllers\BaseController;
use SmartNx\Controllers\BaseRequest;

class OperatorController extends BaseController
{
    public function __construct(OperadorRepository $repository)
    {
        parent::__construct($repository);
        $this->route = 'register.operator';
        $this->routeView = 'operator';
        $this->rules = ['nome' => 'required', 'cpf' => 'required|cpf', 'senha' => 'required'];
    }

    public function postCreate(Request $request)
    {
        return parent::postCreate($request);
    }

    public function putEdit(Request $request, $id)
    {
        return parent::putEdit($request, $id);
    }
}
