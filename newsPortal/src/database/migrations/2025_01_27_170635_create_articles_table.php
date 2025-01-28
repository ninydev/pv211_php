<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('article_count')->default(0);
        });

        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');

            $table->text('thumbnail')->nullable();

            // /articles/{slug}/{article_id}
            $table->string('slug')->unique();

            $table->foreignId('author_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });

        DB::unprepared('
        CREATE TRIGGER increment_article_count AFTER INSERT ON articles
        FOR EACH ROW
        BEGIN
            UPDATE users SET article_count = article_count + 1 WHERE id = NEW.author_id;
        END
    ');

        DB::unprepared('
        CREATE TRIGGER decrement_article_count AFTER DELETE ON articles
        FOR EACH ROW
        BEGIN
            UPDATE users SET article_count = article_count - 1 WHERE id = OLD.author_id;
        END
    ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS increment_article_count');
        DB::unprepared('DROP TRIGGER IF EXISTS decrement_article_count');


        Schema::dropIfExists('articles');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('article_count');
        });
    }
};
