<?php

namespace Modules\Contributions\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToArray;
use Modules\Ledgers\Repositories\LedgerInterface;
use Modules\Members\Repositories\MemberInterface;

class ContributionsImport implements WithHeadingRow, ToArray
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
            if(!empty($row['name']) && !empty($row['email'])){
                $member_model = \Members::getFirstBy('email',$row['email']);
                if(empty($member_model)) {
                    $row['company_id'] = current_user_company()->id;
                    $member_model = \Members::create($row);
                }
                $row['member_id'] = $member_model->id;
                \Contributions::create($row);
                ++$this->created;
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