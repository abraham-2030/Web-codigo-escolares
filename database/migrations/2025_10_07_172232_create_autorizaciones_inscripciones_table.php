<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void 
    {
        Schema::create('autorizaciones_inscripciones', function (Blueprint $table) {
            $table->id();
            $table->char("periodo",100);
            $table->string("no_de_control",100);
            $table->string("tipo_autorizacion",100);
            $table->string("motivo_autorizacion",100);
            $table->char("quien_autoriza",35);
            $table->datetime("fecha_hora_autoriza");
            $table->string("materia_afectada",100);
            $table->integer('cantidad');

            $table->timestamps();

            
        });
    }

    /** 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autorizaciones_inscripciones');
    }
};



