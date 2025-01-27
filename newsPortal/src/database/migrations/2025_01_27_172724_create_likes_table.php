<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::table('articles', function (Blueprint $table) {
            $table->unsignedInteger('like_count')->default(0);
        });

        Schema::create('likes', function (Blueprint $table) {

            $table->foreignId('article_id')->constrained('articles')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamp('liked_at')->useCurrent();
            $table->unique(['article_id', 'user_id']);

        });

        DB::unprepared('
CREATE TRIGGER increment_like_count AFTER INSERT ON likes
FOR EACH ROW
BEGIN
    UPDATE articles SET like_count = like_count + 1 WHERE id = NEW.article_id;
END
');

        DB::unprepared('
CREATE TRIGGER decrement_like_count AFTER DELETE ON likes
FOR EACH ROW
BEGIN
    UPDATE articles SET like_count = like_count - 1 WHERE id = OLD.article_id;
END
');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS increment_like_count');
        DB::unprepared('DROP TRIGGER IF EXISTS decrement_like_count');

        Schema::dropIfExists('likes');
    }
};
