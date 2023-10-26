<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('datadisiplins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nip');
            $table->string('pangkat_gol');
            $table->string('no_keputusan');
            $table->date('tgl_penjatuhan');
            $table->string('penandatangan');
            $table->string('file');
            $table->unsignedBigInteger('tambahinstansi_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('jenishukumen_id');
            $table->timestamps();
        });

        Schema::table('datadisiplins', function (Blueprint $table) {
            $table->foreign('tambahinstansi_id')->references('id')->on('tambahinstansis')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('jenishukumen_id')->references('id')->on('jenishukumens')
                ->onUpdate('cascade')
                ->onDelete('cascade');
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('datadisiplins', function (Blueprint $table) {
            $table->dropForeign('datadisiplins_tambahinstansi_id_foreign');
        });

        Schema::table('data_disiplins', function (Blueprint $table) {
            $table->dropIndex('datadisiplins_tambahinstansi_id_foreign');
        }); 
        
        
        Schema::table('datadisiplins', function (Blueprint $table) {
            $table->dropForeign('datadisiplins_user_id_foreign');
        });

        Schema::table('datadisiplins', function (Blueprint $table) {
            $table->dropIndex('datadisiplins_user_id_foreign');
        });

        
        Schema::table('data_disiplins', function (Blueprint $table) {
            $table->dropForeign('data_disiplins_jenishukumen_id_foreign');
        });

        Schema::table('data_disiplins', function (Blueprint $table) {
            $table->dropIndex('data_disiplins_jenishukumen_id_foreign');
        });

        Schema::dropIfExists('datadisiplins');
    }
};
