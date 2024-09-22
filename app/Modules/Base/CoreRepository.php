<?php

namespace App\Modules\Base;


use Illuminate\Database\Eloquent\Model;

/**
 * Class CoreRepositories
 * Ядро для других репозиториев
 *
 * @package App/Modules/Base/Repositories
 *
 * Репозиторий для работы с сущностью.
 * Может выдавать наборы данных.
 * Не может создавать/изменять сущность -> only выборка данных. (P.S Это обычно сделано в laravel, по логике Repository может и создавать и обновлять и удалять и возвращать + тут можно завязать работу с кешем)
 *
 */
abstract class CoreRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * CoreRepositories constructor.
     */
    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * @return mixed
     */
    abstract protected function getModelClass();

    /**
     * @return Model|mixed
     */
    protected function startConditions() : Model
    {
        //репозиторий не должен хранить состояние
        return clone $this->model;
    }

    protected function query() : \Illuminate\Database\Eloquent\Builder
    {
        return $this->startConditions()->query();
    }

}
