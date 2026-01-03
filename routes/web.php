<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddItemController;
use App\Http\Controllers\Display_items;
use App\Http\Controllers\CreateQuotationController;
use App\Http\Controllers\CostumerDetails;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[UserController::class,'Dashboard']) 
   ->middleware(['auth', 'verified'])->name('dashboard');
// Route::middleware(['auth','admin'])->group(function(){
//     Route::get('/addcategory',[AdminController::class,addCategory])
//     ->name(admin.addcategory);
// });

Route::get('/additempage', function () {
    return view('additempage');
});

Route::get('/comman', function () {
    return view('comman');
});

Route::get('/display_items', function () {
    return view('display_items');
});


Route::get('/edit_items', function () {
    return view('edit_items');
});

Route::get('/createquotation', function () {
    return view('createquotation');
});

Route::get('/costumerdetails', function () {
    return view('costumerdetails');
});

Route::get('/hasasdesign', function () {
    return view('hasasdesign');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//require __DIR__.'/auth.php';
// show 
////////////////////////////////////////////////////////////////////
Route::post('additempage', [AddItemController::class, 'store'])->name('items.store');
//display
Route::get('/display_items', [AddItemController::class, 'display_items'])->name('display.items');

//delete
Route::delete('/items/{id}', [AddItemController::class, 'destroy'])->name('items.delete');


//edit
//////////////////////////////////////////////////////////////////////// 

Route::get('/display-items', [AddItemController::class, 'display_items'])->name('display.items');

// Edit item
Route::get('/items/{id}/edit', [AddItemController::class, 'edit'])->name('items.edit');

// Update item
Route::put('/items/{id}', [AddItemController::class, 'update'])->name('items.update');

/////////////////////////////////////////////////////////////////
// CreateQuotation




// Step 1:
Route::post('/createquotation', [CreateQuotationController::class, 'store'])
    ->name('createquotation.store');

// Step 
Route::get('/quotation/next', [CreateQuotationController::class, 'nextForm'])
    ->name('quotation.next');




////////////////////////////////////////////////////////
                    //customer details
Route::get('/costumerdetails', [CostumerDetails::class, 'display_item'])
     ->name('customer.details');

Route::post('/costumerdetails/select', [CostumerDetails::class, 'selectItems'])
     ->name('customer.select');

Route::get('/costumerdetails/search', [CostumerDetails::class, 'searchItems'])
     ->name('customer.search');
/////////////////////////////////////////////////////////////////////////////


Route::post('/create-quotation', [CreateQuotationController::class, 'store'])->name('createquotation.store');
Route::get('/select-items/{quotation_id?}', [CostumerDetails::class, 'selectItems'])->name('costumerdetails.selectItems');


/////////////////////////////////////////////////////
              //deshbord
