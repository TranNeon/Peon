<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("welcome");
});

Route::get("/new-reply", function () {
    // dd(requestController()->all());
    DB::table("replies")->insert([
        "content" => request(
            "content",
            "default content supply some with search params ",
        ),
        "parent" => request("parent"),
        "user_id" => request("user_id"),
        "created_at" => now(),
    ]);
    return redirect("/replies");
});

Route::get("/replies", function () {
    return view("allreply", [
        "replies" => DB::select("select * from  replies"),
    ]);
});

Route::get("/register", [\App\Http\Controllers\authController::class, "registerView"])->name("register");
Route::get("/login", [\App\Http\Controllers\authController::class, "loginView"])->name("login");


Route::post("/users", [\App\Http\Controllers\authController::class, "registerFn"])->name("register-fn");
Route::get("/sessions", [\App\Http\Controllers\authController::class, "loginFn"])->name("login-fn");


Route::get("/authenticated", function () {
    dd(auth()->user());
});


Route::get("/logout", function () {
    Auth::logout();
});

Route::get("/drafts", [\App\Http\Controllers\draftController::class, "index"])->name("drafts.index");
Route::post("/drafts", [\App\Http\Controllers\draftController::class, "store"])->name("drafts.store");
Route::get("/drafts/create", [\App\Http\Controllers\draftController::class, "create"])->name("drafts.create");
Route::delete("/drafts/{draft}", [\App\Http\Controllers\draftController::class, "destroy"])->name("drafts.destroy");
Route::get("/drafts/{draft}", [\App\Http\Controllers\draftController::class, "show"])->name("drafts.show");
Route::get("/drafts/{draft}/edit", [\App\Http\Controllers\draftController::class, "edit"])->name("drafts.edit");
Route::patch("/drafts/{draft}", [\App\Http\Controllers\draftController::class, "update"])->name("drafts.update");

//Route::resource

