<?php

namespace App\Pgmodules\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

trait DBtransactionHandler {

    public static function execute($query)
    {
        //Log::info('dbt');
        DB::beginTransaction();
        try {
            $query;
            DB::commit();
            //Log::info($query);
            return $query;
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }
}