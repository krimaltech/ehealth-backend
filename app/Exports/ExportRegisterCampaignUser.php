<?php

namespace App\Exports;

use App\Models\CampaignUser;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportRegisterCampaignUser implements FromCollection
{
    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Phone',
            'Gender',
            'Address',
            'Occupation',
            'Date of Birth',
            'Age',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $campaignUsers = CampaignUser::select('name', 'email', 'phone', 'gender', 'address', 'occupation', 'dob', DB::raw("TIMESTAMPDIFF(YEAR, dob, CURDATE()) AS age"))->get();
        $campaignUsers->prepend($this->headings());
        return $campaignUsers;    
    }
}
