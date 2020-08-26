<?php

namespace Modules\Members\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;

class MembersImport implements ToCollection, WithHeadingRow
{
    use Importable;

    private $updated = 0;
    private $created = 0;

    public function collection(Collection $rows)
    {
        $repository = app(\Modules\Members\Repositories\MemberInterface::class);
        foreach ($rows as $row)
        {
            ++$this->created;
        }
    }

    public function getRowCreatedCount(): int
    {
        return $this->created;
    }

    public function getRowUpdatedCount(): int
    {
        return $this->rows;
    }
}