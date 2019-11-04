<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
        });
        Schema::table('role_user', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('role_id')->references('id')->on('roles');
        });
        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->foreign('account2_id')->references('id')->on('receiver_accounts');
            $table->foreign('account3_id')->references('id')->on('accounts');
        });

        Schema::table('receiver_accounts', function (Blueprint $table) {
            $table->foreign('bank_id')->references('id')->on('banks');
        });
        Schema::table('checks', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropForeign('accounts_user_id_foreign');
            $table->dropForeign('accounts_category_id_foreign');
        });
        Schema::table('role_user', function (Blueprint $table) {
            $table->dropForeign('role_user_user_id_foreign');
            $table->dropForeign('role_user_role_id_foreign');
        });
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign('transactions_account_id_foreign');
            $table->dropForeign('transactions_account2_id_foreign');
            $table->dropForeign('transactions_account3_id_foreign');
        });
        Schema::table('receiver_accounts', function (Blueprint $table) {
            $table->dropForeign('receiver_accounts_bank_id_foreign');
        });
        Schema::table('checks', function (Blueprint $table) {
            $table->dropForeign('checks_user_id_foreign');
        });
    }
}
