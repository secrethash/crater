<?php

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => 'reports'], function () {

    // sales report by customer
    //----------------------------------
    Route::get('/sales/customers/{hash}', [
        'as' => 'get.sales.customers',
        'uses' => 'ReportController@customersSalesReport'
    ]);


    // sales report by items
    //----------------------------------
    Route::get('/sales/items/{hash}', [
        'as' => 'get.sales.items',
        'uses' => 'ReportController@itemsSalesReport'
    ]);


    // report for expenses
    //----------------------------------
    Route::get('/expenses/{hash}', [
        'as' => 'get.expenses.reports',
        'uses' => 'ReportController@expensesReport'
    ]);


    // report for tax summary
    //----------------------------------
    Route::get('/tax-summary/{hash}', [
        'as' => 'get.tax.summary',
        'uses' => 'ReportController@taxSummery'
    ]);


    // report for profit and loss
    //----------------------------------
    Route::get('/profit-loss/{hash}', [
        'as' => 'get.profit.loss',
        'uses' => 'ReportController@profitLossReport'
    ]);



});


Route::get('/invoices/pdf/{id}', [
    'as' => 'get.invoice.pdf',
    'uses' => 'FrontendController@getInvoicePdf'
]);

Route::get('/estimates/pdf/{id}', [
    'as' => 'get.estimate.pdf',
    'uses' => 'FrontendController@getEstimatePdf'
]);

Route::get('/customer/invoices/pdf/{id}', [
    'as' => 'get.invoice.pdf',
    'uses' => 'FrontendController@getCustomerInvoicePdf'
]);

Route::get('/customer/estimates/pdf/{id}', [
    'as' => 'get.estimate.pdf',
    'uses' => 'FrontendController@getCustomerEstimatePdf'
]);

Route::get('/expenses/{id}/receipt/{hash}', [
    'as' => 'download.expense.receipt',
    'uses' => 'ExpensesController@downloadReceipt'
]);


Route::get('/on-boarding', function () {
    return view('app');
})->name('install')->middleware('redirect-if-installed');


Route::get('/{vue?}', function () {
    return view('app');
})->where('vue', '[\/\w\.-]*')->name('home')->middleware('install');
