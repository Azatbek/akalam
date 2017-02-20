<?php

Route::get('', ['as' => 'admin.dashboard', function () {
	$content = 'Система управления сайтом для Akalam.kz';
	return AdminSection::view($content, 'Dashboard');
}]);
