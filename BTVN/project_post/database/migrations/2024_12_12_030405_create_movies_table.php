 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id(); // Mã phim
            $table->string('title'); // Tên phim
            $table->string('director'); // Đạo diễn
            $table->date('release_date'); // Ngày phát hành
            $table->integer('duration'); // Thời lượng phim (phút)
            $table->unsignedBigInteger('cinema_id'); // Khóa ngoại tham chiếu đến cinemas

            $table->timestamps(); // created_at và updated_at

            // Định nghĩa khóa ngoại
            $table->foreign('cinema_id')->references('id')->on('cinemas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};