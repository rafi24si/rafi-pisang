<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('multiuploads', function (Blueprint $table) {
            $table->increments('id'); // INT(11) AUTO_INCREMENT
            $table->string('filename', 250); // VARCHAR(250)

            // Created & Updated timestamps
            // CURRENT_TIMESTAMP default + on update CURRENT_TIMESTAMP
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('multiuploads');
    }
};
