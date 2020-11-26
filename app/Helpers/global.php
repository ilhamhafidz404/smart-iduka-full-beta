<?php

use App\Models\User;
use App\Models\PostLoker;
use App\Models\Pelamar;

function countPostPending()
{
	return PostLoker::where('status','pending')->count();
}

function countPelamarPendingInCompany()
{
	return Pelamar::where('company_id',auth()->user()->ProfileCompany->id)->where('status','pending')->count();
}



