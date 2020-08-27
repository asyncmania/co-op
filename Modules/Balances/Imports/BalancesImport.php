<?php

namespace Modules\Balances\Imports;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToArray;

class BalancesImport implements WithHeadingRow, ToArray
{
    use Importable;

    private $updated = 0;
    private $created = 0;
    /**
     * @var array
     */
    private $data;

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    public function array(array $rows)
    {
        foreach ($rows as $row)
        {
            $row['company_id'] = current_user_company()->id;
            $row['balance_type'] = $this->data['balance_type'];
            $row['start_date'] = $this->data['start_date'];
            $row['end_date'] = $this->data['end_date'];
            \Balances::create($row);
            ++$this->created;
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