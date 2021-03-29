<?php

namespace SmartNx\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use SmartNx\Providers\ActionButton\ActionButton;
use SmartNx\Providers\ActionButton\Button;
use SmartNx\Providers\ActionButton\GroupButton;
use SmartNx\Repositories\BaseRepository;

class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $configuration;
    protected $repository;
    protected $rules;

    protected $route = 'route';
    protected $routeView = 'route';

    public function __construct(BaseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getIndex()
    {
        $groupButtons = new GroupButton('buttons');
        $groupButtons->setButton(
            new Button('Novo',$this->route.'.create','fa fa-plus','btn btn-primary')
        );

        $actionButton = ActionButton::render($groupButtons);

        $data = $this->repository->all();
        return view($this->routeView . '.index', compact('data', 'actionButton'));
    }

    public function getCreate()
    {
        return view($this->route . '.create');
    }

    public function postCreate(Request $request)
    {
        $request->validate($this->rules);

        try {
            $this->repository->create($request->all());

            alert()->success('Registro criado com sucesso');
            return redirect()->route($this->route . '.index');

        } catch (\Exception $e) {
            $msg = 'Erro ao gravar na base, caso o problema persista entre em contato com o administrador';

            if (config('app.debug')) {
                $msg = $e->getMessage();
            }

            alert()->error($msg)->persistent('Fechar');
            return redirect()->back()->withInput($request->all());
        }
    }

    public function getEdit($id)
    {
        $data = $this->repository->find($id);

        if (!$data) {
            alert()->error(config('Registro não localizado'));
            return redirect()->back();
        }

        return view($this->routeView.'.edit', compact('data'));
    }

    public function putEdit(Request $request, $id)
    {
        $request->validate($this->rules);

        try {
            $data = $this->repository->find($id);

            if (!$data) {
                alert()->error(config('Registro não localizado'));
                return redirect()->back();
            }

            $this->repository->update($request->all(), $data->getKey(), $data->getKeyName());

            alert()->success('Registro atualizado com sucesso');
            return redirect()->route($this->route . '.index');

        } catch (\Exception $e) {
            $msg = 'Erro ao gravar na base, caso o problema persista entre em contato com o administrador';

            if (config('app.debug')) {
                $msg = $e->getMessage();
            }

            alert()->error($msg)->persistent('Fechar');
            return redirect()->back()->withInput($request->all());
        }
    }

    public function getDelete($id)
    {
        try {
            $this->repository->delete($id);

            alert()->success('Registro deletado com sucesso');
            return redirect()->back();

        } catch (\Exception $e) {
            $msg = 'Erro ao gravar delete, existe registro vinculado a esse cadastro.';

            if (config('app.debug')) {
                $msg = $e->getMessage();
            }

            alert()->error($msg)->persistent('Fechar');
            return redirect()->back();
        }
    }
}
