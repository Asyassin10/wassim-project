<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
           // $table->foreignId('category_id')->constrained();
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
           // $table->dropForeign(['category_id']);
            //$table->dropColumn('category_id');
        });
    }
}