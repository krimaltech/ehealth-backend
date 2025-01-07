<?php

namespace App\Imports;

use App\Models\Family;
use App\Models\ImportFile;
use App\Models\Member;
use App\Models\RoleUser;
use App\Models\SchooStudentEmail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportUsers implements ToModel, WithHeadingRow
{
    protected $id;
    protected $username;
    // protected $count;
    protected $familyname;
    protected $payment_status;
    protected $i = 1;

    public function __construct($id, $familyname,$username,$payment_status)
    {
        $this->id = $id;
        $this->familyname = $familyname;
        $this->username = $username;
        $this->payment_status = $payment_status;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {    
        $user = new User([
            'first_name' => $row['first_name'],
            'middle_name' => $row['middle_name'],
            'last_name' => $row['last_name'],
            'name' => $row['first_name'] .' '. $row['middle_name'] .' '.  $row['last_name'],
            'is_verified' => 0,
            'is_school' => 0,
            'user_name' => $this->username.'-',
            'password' => Hash::make('12345'),
            'created_at' => Carbon::now()->addSeconds($this->i),
            'updated_at' => Carbon::now()->addSeconds($this->i),
        ]);
        $user->save();

        $role = new RoleUser([
            'user_id' => $user->id,
            'role_id' => 6
        ]);
        $role->save();

        $member = new Member([
            'member_id' => $user->id,
            'gd_id' => NULL,
            'slug' => 'member-' . str_replace(' ', '-', $user->name) . '-' . substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3),
            'gender' => $row['gender'],
            'dob' => Carbon::createFromFormat('d/m/Y', $row['dob'])->format('Y/m/d'),
            'address' => $row['address'],
            'member_type' => 'Dependent Member'
        ]);
        $member->save();

        $member->gd_id = 'GD-'.$user->id;
        $member->update();

        $family = new Family([
            'family_id' => $this->familyname,
            'member_id' => $member->id,
            'approved' => 1,
            'primary_request' => 1,
            'payment_status' => $this->payment_status,
        ]);
        $family->save();

        $contact_details = new SchooStudentEmail([
            'member_id' => $member->id,
            'parent_email' => $row['parent_email'],
            'parent_phone' => $row['parent_phone'],
            'year' => csv_year(),
            'class' => $row['class'],
            'section' => $row['section'],
            'roll' => $row['roll'],
            'primary_member_id' => $this->id,
        ]);
        $contact_details->save();


        $user->user_name = $this->username.'-'.csv_year().'-'.$row['class'].'-'.$row['section'].'-'.$row['roll'];
        $user->update();


        // $this->count++;
        $this->i++;

        return $user;       
    }

}
