<?php

namespace Modules\Ledgers\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToArray;
use Modules\Ledgers\Repositories\LedgerInterface;
use Modules\Members\Repositories\MemberInterface;

class LedgersImport implements WithHeadingRow, ToArray
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
        $repository = app(LedgerInterface::class);
        $member_repository = app(MemberInterface::class);
        foreach ($rows as $row)
        {
            if(!empty($row['name']) && !empty($row['email'])){
                $member_model = $member_repository->getFirstBy('email',$row['email']);
                if(empty($member_model)) {
                    $row['company_id'] = current_user_company()->id;
                    $member_model = $member_repository->create($row);
                }
                $row['member_id'] = $member_model->id;
                $row['start_date'] = $this->data['start_date'];
                $row['end_date'] = $this->data['end_date'];
                $repository->create($row);
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