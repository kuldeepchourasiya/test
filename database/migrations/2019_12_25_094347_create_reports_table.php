<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->bigIncrements('rpt_aid');
            $table->string('rpt_id');
            $table->string('rpt_date');
            $table->string('rpt_pnt_id');
            $table->string('rpt_pnt_uhid');
            $table->string('rpt_smpl_collect_at');
            $table->string('rpt_amt');
            $table->string('rpt_amt_receive');
            $table->string('rpt_payment_status');
            $table->string('rpt_tot_dis');
            $table->string('rpt_doc_id');
            $table->string('rpt_remark');
            $table->string('rpt_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reports');
    }
}
