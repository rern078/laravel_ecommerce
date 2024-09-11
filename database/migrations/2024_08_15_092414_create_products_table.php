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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null');
            $table->string('product_type', 50);
            $table->string('product_name', 200);
            $table->string('product_code', 20)->unique();
            $table->string('brand', 50)->nullable();
            $table->string('category', 200);
            $table->string('sub_category', 200)->nullable();
            $table->string('product_unit', 200);
            $table->decimal('prodcut_sale_unit', 10, 2);
            $table->decimal('product_purchase_unit', 10, 2)->nullable();
            $table->decimal('product_weight', 10, 2)->nullable();
            $table->decimal('product_price', 10, 2);
            $table->decimal('discount', 5, 2)->default(0);
            $table->integer('stock');
            $table->integer('alert_stock')->nullable();
            $table->string('product_image', 255)->nullable();
            $table->string('product_gallery_image', 255)->nullable();
            $table->text('product_details')->nullable();
            $table->text('product_details_invoice')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('products');
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};
