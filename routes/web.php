<?php

use App\Http\Controllers\PostController;
use App\Models\PostRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;




Route::get("/debug-user", function () {
   return view("debug");
});

Route::get("/", function () {
    return redirect("/posts");
});

Route::get("/tag/{tag_name}", [PostController::class, "show_by_tag"])->name("posts.show_by_tag");

Route::get("/posts/{slug}", [PostController::class, "show_by_slug"])->name("posts.show_by_slug");
Route::resource("posts", \App\Http\Controllers\PostController::class);
Route::resource("comments", \App\Http\Controllers\CommentController::class);

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



Route::get("/register", [\App\Http\Controllers\authController::class, "registerView"])->name("register");
Route::get("/login", [\App\Http\Controllers\authController::class, "loginView"])->name("login");
Route::resource("users", \App\Http\Controllers\UserController::class);
Route::post("/users", [\App\Http\Controllers\authController::class, "registerFn"])->name("register-fn");
Route::get("/sessions", [\App\Http\Controllers\authController::class, "loginFn"])->name("login-fn");



Route::middleware('auth')->group(function () {
    Route::get("/logout", function () {
        Auth::logout();
        return redirect('/');
    })->name("logoutFn");
    Route::get("/drafts", [\App\Http\Controllers\draftController::class, "index"])->name("drafts.index");
    Route::post("/drafts", [\App\Http\Controllers\draftController::class, "store"])->name("drafts.store");
    Route::get("/drafts/create", [\App\Http\Controllers\draftController::class, "create"])->name("drafts.create");
    Route::delete("/drafts/{draft}", [\App\Http\Controllers\draftController::class, "destroy"])->name("drafts.destroy")->can('crud', 'draft');
    Route::get("/drafts/{draft}", [\App\Http\Controllers\draftController::class, "show"])->name("drafts.show")->can('crud', 'draft');;
    Route::get("/drafts/{draft}/edit", [\App\Http\Controllers\draftController::class, "edit"])->name("drafts.edit")->can('crud', 'draft');;
    Route::patch("/drafts/{draft}", [\App\Http\Controllers\draftController::class, "update"])->name("drafts.update")->can('crud', 'draft');;


    Route::resource("/post-requests", \App\Http\Controllers\PostRequestController::class );

});

Route::middleware(['auth', \App\Http\Middleware\geReviewerPrivilege::class])->group(function () {
    Route::get("/debug-admin", function () {
    dd('very important secret');
    });

    Route::get("manage-all-post-request", function () {
        return view('reviewer-dashboard' , ['requests' => PostRequest::with('draft','draft.user')->get()]);
    } )->name("reviewer-dashboard");

    Route::patch("manage-post-request/{post_request}/approve", [\App\Http\Controllers\PostRequestController::class, 'approve'] )
        ->name("reviewer-dashboard.approve");
    Route::patch("manage-post-request/{post_request}/deny",[\App\Http\Controllers\PostRequestController::class, 'deny'] )
        ->name("reviewer-dashboard.deny");
});



