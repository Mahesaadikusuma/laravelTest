<?php

use App\Models\User;
use App\Models\Product;
use App\Models\LogActivy;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\Multi\FurniluxeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/default', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('Home',[
        'name' => 'mahesa',
        'role' => 'admin'
    ]);
})->name('home');


Route::get('/student', [StudentController::class, 'index'])->name('student');
Route::get('/student-add', [StudentController::class, 'create'])->name('student-add');
Route::post('/student-add', [StudentController::class, 'store'])->name('student.store');


Route::get('/student/edit/{slug}', [StudentController::class, 'edit'])->name('student-edit');
Route::post('/student/update/{slug}', [StudentController::class, 'update'])->name('student.update');


Route::get('/student-detail/{slug}', [StudentController::class, 'detail'])->name('detail');
Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');

Route::delete('/student/deleted', [StudentController::class, 'deletedStudent'])->name('deleted-student');

Route::get('/class', [ClassController::class, 'index'])->name('class');
Route::get('/class/{id}', [ClassController::class, 'detail'])->name('class-detail');

Route::get('/extracurricular', [ExtracurricularController::class, 'index'])->name('eskul');
Route::get('/extracurricular/{id}', [ExtracurricularController::class, 'show'])->name('eskul-detail');

Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher');
Route::get('/teacher/{id}', [TeacherController::class, 'show'])->name('teacher-detail');



Route::get('/product', [FurniluxeController::class, 'index'])->name('product');
Route::get('/uuid', [FurniluxeController::class, 'uuid'])->name('uuid');
Route::get('/uuid/{id}', [FurniluxeController::class, 'uuidDetail'])->name('uuidDetail');


// Permission spatie
route::get('/give-permission-to-role', function() {
    // $role = Role::findOrFail(1);  // author
    // $permission = Permission::findOrFail(1); // create article

    // $role = Role::findOrFail(2);  // editor
    // $permission = Permission::findOrFail(2); //edit article

    $role = Role::findOrFail(2);  // morderator
    $permission1 = Permission::findOrFail(1); // create article
    $permission2= Permission::findOrFail(2); // edit article
    $permission3 = Permission::findOrFail(3); // delete article


    $role->givePermissionTo([$permission1,$permission2,$permission3]);
    
    // $permission->assignRole($role);

});



// INI YANG PENTING BANGET
route::get('/assign-rol-to-user', function() {
    $user = User::findOrFail(3); //mahesa

    // $user = User::create([
    //     'name' => 'User Multiple Role',
    //     'email' => 'user@gmail.com', 
    //     'password' => '$2y$10$i70TWn.4ZJFN50RsEHt/yOMIW4Mmpjdy5pniFYodt1CQhhxbIg6Pa',
    // ]);

    $role1 = Role::findOrFail(1); // AUTHOR
    $role2 = Role::findOrFail(2); // EDITOR
    // $role3  = Role::findOrFail(3); // MODERATOR


    $user->assignRole([$role1,$role2]);
});


route::get('/spatie-method', function() {
    $user = User::findOrFail(1);
    // $user->assignRole('author');
    // dd($user->getPermissionsViaRoles()); 
    dd($user->getAllPermissions()); 
});

$user = User::findOrFail(1);

// Auth::login($user);
Auth::logout();
Route::get('create-artilce', function () {
   dd('ini adalah fitur create article, hanya bisa dikases oleh author atau moderator'); 
})->middleware('role:author|moderator');
// permission:create article

Route::get('edit-artilce', function () {
   dd('ini adalah fitur edit article, hanya bisa dikases oleh editor atau moderator'); 
})->middleware('role:editor|moderator');

Route::get('delete-artilce', function () {
   dd('ini adalah fitur delete article, hanya bisa dikases oleh  moderator'); 
})->middleware('role:editor');



// DATABASE TRANSACTION

Route::get('add-products', function () {
//    $product = Product::all();
//    $log = LogActivy::all();
    // staff lagi login dan dia create data product baru lalu harus ke isi ke table log activity
   

    
    try {
        DB::beginTransaction(); // mulai transaction
        $product = Product::create([
            'name' => 'Product 4',
            'jenis_barang' => 'Bahan',
            'harga' => 100000,
            'stok' => 100
        ]);

        LogActivy::create([
            'description' => 'Create dari Product 4',
        ]);
        DB::commit(); // Commit transaksi jika berhasil
    } catch (\Exception  $e) {
        DB::rollBack();
        return response()->json(['message' => 'Terjadi kesalahan. Transaksi dibatalkan.']);
    }
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
