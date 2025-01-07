<?php

namespace App\Jobs;

use App\Mail\SendSchoolStudentEmail;
use App\Models\Member;
use App\Models\SchooStudentEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendQueueEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details;
    public $timeout = 7200; // 2 hours

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $member = Member::where('member_id',auth()->user()->id)->first();
        $data = SchooStudentEmail::where('primary_member_id',$member->member_id)->get();
        $input['subject'] = $this->details['subject'];

        foreach ($data as $key => $value) {
            $input['email'] = $value->email;
            $input['password'] = '12345';
            Mail::to($value->email)->send(new SendSchoolStudentEmail());
        }
    }
}
