<?php

namespace App\Modules\User\Domain\IRepository;


//CRUD
interface IUserRepository
{

    public function create($data);
    public function get($id);
    public function update($data);
    public function delete($id);

}
