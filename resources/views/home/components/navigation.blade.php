@if (\Route::current()->getName() == '')
    Home
@elseif (\Route::current()->getName() == 'category')
    Home > Category
@else
    I don't have any records!
@endif
