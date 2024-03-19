<?php

namespace App\Repositories\Write\Tasks;

use App\Service\Tasks\Dto\StoreTaskDTO;

interface WriteTaskRepositoryInterface
{

public function create(StoreTaskDTO $dto);
public function update();
public function delete(int $id);

}
