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
            $table->unsignedInteger('subscribers_count')->default(0);
            $table->unsignedInteger('followers_count')->default(0);
        });

        Schema::create('subscribers', function (Blueprint $table) {
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->unique(['author_id', 'user_id']);
            $table->timestamp('subscribe_at')->useCurrent();
        });


        DB::unprepared('
CREATE TRIGGER prevent_self_subscription BEFORE INSERT ON subscribers
FOR EACH ROW
BEGIN
    IF NEW.author_id = NEW.user_id THEN
        SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = \'Cannot subscribe to yourself\';
    END IF;
END
');

        DB::unprepared('
CREATE TRIGGER increment_subscribers_count AFTER INSERT ON subscribers
FOR EACH ROW
BEGIN
    UPDATE users SET subscribers_count = subscribers_count + 1 WHERE id = NEW.author_id;
END
');

        DB::unprepared('
CREATE TRIGGER increment_followers_count AFTER INSERT ON subscribers
FOR EACH ROW
BEGIN
    UPDATE users SET followers_count = followers_count + 1 WHERE id = NEW.user_id;
END
');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribers');
    }
};
