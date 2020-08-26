<?php

namespace Modules\Members\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToArray;

class MembersImport implements WithHeadingRow, ToArray
{
    use Importable;

    private $updated = 0;
    private $created = 0;

    public function array(array $rows)
    {
        $repository = app(\Modules\Members\Repositories\MemberInterface::class);
        foreach ($rows as $row)
        {
            $model = $repository->getFirstBy('email',$row['email']);
            if(!empty($model)) {
                $row['id'] = $model->id;
                ++$this->updated;
                $repository->update($row);
            }else{
                ++$this->created;
                $row['company_id'] = current_user_company()->id;
                $repository->create($row);
            }
        }
    }

    public function getRowCreatedCount(): int
    {
        return $this->created;
    }

    public function getRowUpdatedCount(): int
    {
        return $this->updated;
    }
}